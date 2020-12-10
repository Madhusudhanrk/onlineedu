<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\AdminFeedbackModel;

use DB;
class AdminFeedbackController extends Controller
{
    
    protected $adminfeedbackmodel;

    //constructor
    public function __construct()
    {
         $this->adminfeedbackmodel= new AdminFeedbackModel();

    }
    public function index(){
        
        if(session()->has('admin_login_id_set')){
            $all_feedback = $this->adminfeedbackmodel->get_all_feedback();
            // echo "<pre>";
            // print_r($all_feedback);
            // exit;
            // echo "</pre>";
            if($all_feedback){
                return view('admin.admin_feedback_list')->with('all_feedback',$all_feedback);
            }else{
                return view('admin.admin_feedback_list')->with('all_feedback',$all_feedback);
            }
                     
        }else{
            return redirect('admin_login');
        }
        
    } 

     //id is getting from url route fetching and passing to this function
     public function destroy(Request $request){
         
        $id = $request->id;
        // echo $id;
        // exit;
        if(DB::table('feedback')->where('id',$id)->delete()){
            echo "success";  
        };
        
    }
}
