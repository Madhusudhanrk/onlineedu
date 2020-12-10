<?php

namespace App\Http\Controllers;

use App\Models\signupmodel;
use Illuminate\Http\Request;
use Session;
use Redirect;
use Hash;
use Str;

class SignupController extends Controller
{
    protected $signupmodelobj;

    //constructor
    public function __construct()
    {
         $this->signupmodelobj= new signupmodel();
    }

    public function index(){
        return view('user.signup');
    }

    public function createuser(Request $request){
         
        if (\Request::isMethod('post')){
            $request->validate([
                'userpassword' => 'required',
                'usercpassword' => 'required|same:userpassword',
            ]);
            if($request->userpassword != $request->usercpassword){
                Session::flash('register-status', 'Password mismatch!');
                session()->flash('alert-class', 'alert-danger');   
                return redirect('signup');
                // Redirect::to
            }
            $ref_no = Str::random(25);
            $data['details'] = [
                // 'mother'                => $request->input('Donor_name'),
                'username' => $request->username,
                'userpassword' => Hash::make($request->userpassword),
                'useremail' => $request->useremail,
                'ref_no' => $ref_no,
            ];
            // 'created_at' => date('Y-m-d')
            //check user i s already preset or not
            $result=$this->signupmodelobj->user_email_check($data['details']['useremail']);
            if($result == "false"){
                if($this->signupmodelobj->signup_user($data['details'])){
                    Session::flash('register-status', 'Account created successfully, Please Login');
                    session()->flash('alert-class', 'alert-success');
                    return redirect('login');
                }else{
                    Session::flash('register-status', 'Account create Failed!');
                    session()->flash('alert-class', 'alert-danger');
                }
            }else{
                session()->flash('register-status', 'Already this Email id Registered!');
                session()->flash('alert-class', 'alert-danger');
                return redirect('signup');
            }
             
        }
    }
}
