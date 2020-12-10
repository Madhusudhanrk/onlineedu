<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\AdminInstructorListModel;
use DB;
class AdminInstructorListController extends Controller
{
    protected $admininstructorlistmodel;

    //constructor
    public function __construct()
    {
         $this->admininstructorlistmodel= new AdminInstructorListModel();
    }

    public function index(){
        if(session()->has('admin_login_id_set')){
            $all_instructors = $this->admininstructorlistmodel->get_all_instructors();
            if($all_instructors != "false"){
                return view('admin.admin_Instructor_list')->with('all_instructors',$all_instructors);
            }else{
                return view('admin.admin_Instructor_list')->with('all_instructors',$all_instructors);
            }
            // return view('admin.admin_instructor_list');         
        }else{
            return redirect('admin_login');
        }
        
    } 

     //id is getting from url route fetching and passing to this function
     public function destroy(Request $request){
         
        $id = $request->id;
        // echo $id;
        // exit;
        if(DB::table('instructor_details')->where('id',$id)->delete()){
            echo "success";  
        };
        
    }
}
