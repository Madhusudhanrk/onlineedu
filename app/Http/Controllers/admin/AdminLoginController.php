<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\AdminLoginModel;
use Hash;

class AdminLoginController extends Controller
{
    protected $loginmodelobj;

    //constructor
    public function __construct()
    {
         $this->loginmodelobj= new AdminLoginModel();
    }
    public function index(){
        if(session()->has('admin_login_id_set')){
            return redirect('admin_dashboard'); //admin_dashboard controller calls filling datas                      
        }
        return view('admin.admin_login');
    }

    public function doadmin_login(Request $request){
        if (\Request::isMethod('post')){
            $data=[
                'admin_email_id'=> $request->admin_email,
                'admin_password'=> $request->admin_password,
            ];
            $result=$this->loginmodelobj->login_check($data);
            // echo "<pre>";
            // print_r($result);

            // echo "</pre>";
            // exit;
            if($result != "false"){
                if (Hash::check( $data['admin_password'], $result->admin_password)){                 
                    //set session now
                    session()->put('admin_login_id_set',$result->admin_email_id);                
                    return redirect('admin_dashboard');                
                }else{
                    session()->flash('login-status', 'Your password is not Valid!');
                    session()->flash('alert-class', 'alert-danger');
                    return redirect('admin_login');
                }
            }else{
                session()->flash('login-status', 'Your email address is not Valid!');
                session()->flash('alert-class', 'alert-danger');
                return redirect('admin_login');
            }   
        }   
        return redirect('admin_login'); //direct url passing

    }

    public function a_logout(){
        
        session()->forget('admin_login_id_set');
        return redirect('admin_login');
    }
}
