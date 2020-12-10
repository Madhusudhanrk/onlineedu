<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\A_ForgotPassModel;
use App\Mail\MailSend;
use Mail;
use Hash;
use Str;

class A_ForgotPassController extends Controller
{
    protected $forgotPassModel;
    //constructor
    public function __construct()
    {
        $this->forgotPassModel = new A_ForgotPassModel();
    }

    public function index()
    {
        return view('admin.a_email_exist');
    }

    //forgot password
    public function a_forgot_password(Request $request)
    {
        if ($request->isMethod('post')):
            
            $data=[
                'email'      =>$request->admin_email,
            ];
            $result=$this->forgotPassModel->forgot_email_check($data);
            if($result !="false"):
                $ref_no = Str::random(25);
                $data = [
                    'ref_no' => $ref_no
                ];
                    
                  if($this->forgotPassModel->update_refno($data,$result->id)):
                    $content=[
                        'name'          =>'Onlineedu Admin',
                        'content'       =>'<h4>Please change your password here</h4>
                                            <div class="card mb-0">
                                                <div class="form-group">
                                                   <a href="'.url('a_change_password_form_call/'.$ref_no).'"><button type="submit" name="submit" style="background-color:green;color:white" class="btn btn-success btn-block">Change Password</button></a>
                                                </div>
                                            </div>',
                        'subject'       =>'Onlineedu | Admin password reset!',
                        'view'          =>'emailSend.emailTemplate',
                        //email footer
                    ];
                    $mail_test = Mail::to($result->admin_email_id)->send(new MailSend($content));
                         
                     session()->flash('forgot-status', 'Reset link sent to your email address!');
                     session()->flash('alert-class', 'alert-success');
                     
                endif;
            else:
                session()->flash('forgot-status', 'Your email address not present in ur database!');
                session()->flash('alert-class', 'alert-danger');
            endif;
        endif;
        return view('admin.a_email_exist');
    }
//call form to reset password
    public function a_change_password_form_call($ref_no=null)
    {         
            $value['ref_no']=$ref_no;//getting from email submit url because route pointed here
            return view('admin.a_change_password',$value);//change password bladepage call         
    }

    //change password
    public function a_change_password(Request $request,$ref_no=null)
    {
         
        if($this->forgotPassModel->expire_check($ref_no))://email url ref match check
            if ($request->isMethod('post')):
                $request->validate([
                    'pass' => 'required',
                    'con_pass' => 'required|same:pass',
                ]);
                $new_ref_no = Str::random(25);
                $data=[
                    'admin_password' =>Hash::make($request->pass),
                    'ref_no' => $new_ref_no,
                ];
                if($this->forgotPassModel->change_password($data,$ref_no))://new ref will be updated
                    session()->flash('login-status', 'Reset password successfully done!');
                    session()->flash('alert-class', 'alert-success');
                    return redirect('');
                endif;
            endif;
        else:
            session()->flash('pass-status', 'Link expired!');
            session()->flash('alert-class', 'alert-danger');
        endif;
        $value['ref_no']=$ref_no;
        return view('admin.a_change_password',$value);
    }

}

