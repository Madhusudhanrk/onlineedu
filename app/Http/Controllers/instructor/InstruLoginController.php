<?php

namespace App\Http\Controllers\instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\instructor\InstruLoginModel;
use Hash;

class InstruLoginController extends Controller
{
    protected $loginmodelobj;

    //constructor
    public function __construct()
    {
         $this->loginmodelobj= new InstruLoginModel();
    }

    public function index(){
        if(session()->has('instructor_login_emailid_set')){
            return redirect('create_course');
        }
        return view('instructor.i_login');
    }

     //Instructor login check
     public function dologin_instru(Request $request)
     {
        
         $data=[
             'instructor_email'=> $request->instructor_email,
             'instructor_password'=> $request->instructor_password,
         ];
         $result=$this->loginmodelobj->login_check($data);

        //  echo "<pre>";
        //  print_r($result); 
        //  echo "</pre>";
        //  exit;
         if($result != "false"){
             if (Hash::check( $data['instructor_password'], $result->instructor_password)){                 
                 //set session now
                 session()->put('instructor_login_name_set',$result->instructor_name);
                 session()->put('instructor_login_emailid_set',$result->instructor_email);
                 return redirect('create_course');                
             }else{
                 //unset session now
                //  session()->forget('instructor_login_name_set');
                //  session()->forget('instructor_login_emailid_set');
                 session()->flash('login-status', 'Wrong Password!');
                 session()->flash('alert-class', 'alert-danger');
                 return redirect('login_instru');
             }
         }else{
            // session()->forget('instructor_login_name_set');
            // session()->forget('instructor_login_emailid_set');
             session()->flash('login-status', 'Your email address is not Valid!');
             session()->flash('alert-class', 'alert-danger');
             return redirect('login_instru');
         }      
         return redirect('login_instru');
     }

    public function i_logout(){
            session()->forget('instructor_login_name_set');
            session()->forget('instructor_login_emailid_set');
            return redirect('login_instru');
    }
}
