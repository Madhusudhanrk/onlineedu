<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Logincheckmodel;
use Hash;
class LoginController extends Controller
{
    protected $loginmodelobj;

    //constructor
    public function __construct()
    {
         $this->loginmodelobj= new Logincheckmodel();
    }

    public function index(){
        return view('user.login');
    }

    //User login check
    public function dologin(Request $request)
    {
        $request->validate([
            'useremail' => 'required',
            'userpassword' => 'required',            
        ]);
        $data=[
            'useremail'=> $request->useremail,
            'userpassword'=> $request->userpassword,
        ];
        $result=$this->loginmodelobj->login_check($data);
        // echo "<pre>";
        // print_r($result);

        // echo "</pre>";
        // exit;
        if($result != "false"){
            if (Hash::check( $data['userpassword'], $result->userpassword)){                 
                //set session now
                session()->put('user_login_name_set',$result->username);
                session()->put('user_login_id_set',$result->useremail);
                session()->flash('login-status', 'Login Successfull, U can Access our Content'); 
                session()->flash('alert-class', 'alert-success');
                return redirect('index');                
            }else{
                session()->flash('login-status', 'Your password is not Valid!');
                session()->flash('alert-class', 'alert-danger');
                return redirect('login');
            }
        }else{
            session()->flash('login-status', 'Your email address is not Valid!');
            session()->flash('alert-class', 'alert-danger');
            return redirect('login');
        }      
        return redirect('login');
    }
    public function u_logout(){
        session()->forget('user_login_name_set');
        session()->forget('user_login_id_set');
        return redirect('login');
    }

   
   
}
