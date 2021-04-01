<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\adminRegisterModel;
use Redirect;
use Hash;
use Str;
use Session;
class AdminRegisController extends Controller
{
    
    protected $adminregistermodelobj;

    //constructor
    public function __construct()
    {
         $this->adminregistermodel = new adminRegisterModel();
    }

    public function index(){
        return view('admin.admin_register');
    }

    public function doadmin_register(Request $request){
        if (\Request::isMethod('post')){
            $request->validate([
                'password' => 'required',
                'cpassword' => 'required|same:password',
            ]);
            
            $ref_no = Str::random(25);
            $reference_admin_email = $request->reference_admin_email;
            $admin_count = $this->adminregistermodel->admin_count();
            if($admin_count){//if ur first admin it won't come here 
                $ref_admin = $this->adminregistermodel->ref_admin_email_check($reference_admin_email);
                $ur_registered = $this->adminregistermodel->admin_already_registered($request->admin_email);
            //  echo $admin_count;
            // echo $ref_admin;
            // echo $ur_registered;
            // exit;
                if($ref_admin != "true"){//if refered admin id false
                    Session::flash('admin-register-status', 'Reference admin email Invalid!');
                    session()->flash('alert-class', 'alert-danger');   
                    return redirect('admin_register');
                }

                if($ur_registered == "true"){//if ur non existing admin
                    Session::flash('admin-register-status', 'Your email id already exist!');
                    session()->flash('alert-class', 'alert-danger');   
                    return redirect('admin_register');
                }
            }
            
                $data['details'] = [
                    'admin_email_id' => $request->admin_email,
                    'admin_password' => Hash::make($request->password),
                    'ref_no' => $ref_no,
                ];
                if($this->adminregistermodel->admin_register($data['details'])){
                    Session::flash('admin-register-status', 'New Admin Created, Please Login');
                    session()->flash('alert-class', 'alert-success');
                    return redirect('admin_register');
                }else{
                    Session::flash('admin-register-status', 'Account create Failed!');
                    session()->flash('alert-class', 'alert-danger');
                    return redirect('admin_register');
                }
           
        }
    }
}
