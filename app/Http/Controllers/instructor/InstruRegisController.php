<?php

namespace App\Http\Controllers\instructor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\instructor\InstruRegisModel;
use Session;
use Redirect;
use Hash;
use Str;

class InstruRegisController extends Controller
{
    protected $signupmodelobj;

    //constructor
    public function __construct()
    {
         $this->signupmodelobj= new InstruRegisModel();
    }

    public function index(){
        return view('instructor.i_register');
    }

    public function registerinstructor(Request $request){
         
        if (\Request::isMethod('post')){
            $request->validate([
                'instructor_password' => 'required',
                'instructor_cpassword' => 'required|same:instructor_password',
            ]);
            if($request->instructor_password != $request->instructor_cpassword){
                Session::flash('register-status', 'Password mismatch!');
                session()->flash('alert-class', 'alert-danger');   
                return redirect('regi_instru');
            }
            $ref_no = Str::random(25);
            $data['details'] = [
                'instructor_name' => $request->instructor_name,
                'instructor_email' => $request->instructor_email,
                'instructor_area_code' => $request->instructor_area_code,
                'instructor_phone' => $request->instructor_phone,
                'instructor_password' => Hash::make($request->instructor_password),
                'ref_no' => $ref_no,
                'instructor_qualification' => $request->instructor_qualification,
            ];
            // 'created_at' => date('Y-m-d')
        //    echo  $data['details']['instructor_email'];
        //    exit;
            $result=$this->signupmodelobj->instructor_email_check($data['details']['instructor_email']);
         if($result == "false"){
            if($this->signupmodelobj->signup_instructor($data['details'])){
                Session::flash('register-status', 'Account created successfully, Please Login');
                session()->flash('alert-class', 'alert-success');
                return redirect('regi_instru');
            }else{
                Session::flash('register-status', 'Account create Failed!');
                session()->flash('alert-class', 'alert-danger');
                return redirect('regi_instru');
            }
         }else{
            session()->flash('register-status', 'Already this Email id Registered!');
            session()->flash('alert-class', 'alert-danger');
            return redirect('regi_instru');
         }
        }
    }
}
