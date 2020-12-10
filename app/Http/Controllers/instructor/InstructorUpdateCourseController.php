<?php

namespace App\Http\Controllers\instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\instructor\I_updatecoursemodel;
use Session;
use Redirect;
use Hash;

class InstructorUpdateCourseController extends Controller
{
    protected $updatecoursemodelobj;

    //constructor
    public function __construct()
    {
         $this->updatecoursemodelobj= new I_updatecoursemodel();
    }

    public function index($id = null){
        
        if(session()->has('instructor_login_emailid_set')){  
            // $id = $request->id;
            $course_list=$this->updatecoursemodelobj->get_courses_by_id($id);
            $course_list = $course_list[0];
            // echo "<pre>";
            // print_r($course_list);
            // echo "</pre>";
            // exit;
            if($course_list != "false"){
                return view('instructor.update_course')->with('course_list',$course_list);
            }             
        }else{
            return redirect('login_instru');
        }
    }
   
    public function doupdate_course(Request $request){         
         
        if (\Request::isMethod('post')){
            $id = $request->id;
            // echo $id;
            // exit;  
            $request->validate([
                'file_uploaded' => 'required|mimes:pdf|max:25600'
                
            ]);          
            $instructor_name = session()->get('instructor_login_name_set');
            $instructor_emailid = session()->get('instructor_login_emailid_set');
           
            if($request->hasFile('file_uploaded')){
                //get file name
                $file_name = pathinfo($request->file('file_uploaded')->getClientOriginalName(),PATHINFO_FILENAME);
                //get file name ext               
                $file_ext = $request->file('file_uploaded')->getClientOriginalExtension();
                //get file name to store
                $file_name_store = $file_name.'_'.time().'.'.$file_ext;
                //get file upload
                $request->file('file_uploaded')->move('course_pdfs',$file_name_store);
            }else{
                $file_name_store = 'noimage.jpg';
            }
            // echo "<pre>";
            // echo  $file_name_store;
            // echo "</pre>";
            // exit;
            $data['details'] = [
                'instructor_name' => $instructor_name,
                'instructor_emailid' => $instructor_emailid,
                'course_name' => $request->course_name,
                'course_type' => $request->course_type,
                'course_description' => $request->course_description,
                'course_path' => $file_name_store                  
            ];

           
            if($this->updatecoursemodelobj->i_update_course($data['details'],$id)){

                Session::flash('update-course-status', 'Course updated successfully');
                session()->flash('alert-class', 'alert-success');
                return redirect('i_course_list');
            }else{
                Session::flash('update-course-status', 'Course update Failed!');
                session()->flash('alert-class', 'alert-danger');
                return redirect('i_course_list');
            }
         
        }
    
}
}
