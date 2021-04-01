<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\feedbackmodel;
use Session;
use Redirect;

class feedback extends Controller
{
   protected $feedbackmodelobj;

    //constructor
    public function __construct()
    {
         $this->feedbackmodelobj= new feedbackmodel();
    }     

    public function ur_feedback(Request $request){
         
        if (\Request::isMethod('post')){
                         
            $data['details'] = [
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message,
            ];            
            
            if($this->feedbackmodelobj->feedback_send($data['details'])){
                Session::flash('feedback_send', 'Thanks, for your Feedback');
                session()->flash('alert-class', 'alert-success');
                return redirect('contact');
            }else{
                Session::flash('feedback_send', 'Try Again!');
                session()->flash('alert-class', 'alert-danger');
                return redirect('contact');
            }           
             
        }
    }
}
