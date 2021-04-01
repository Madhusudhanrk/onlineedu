<?php

namespace App\Http\Controllers\instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\instructor\I_createcoursemodel;
use Session;
use Redirect;
use Hash;

class InstructorCreateCourseController extends Controller
{
    protected $createcoursemodelobj;

    //constructor
    public function __construct()
    {
         $this->createcoursemodelobj= new I_createcoursemodel();
    }

    public function index(){

        if(session()->has('instructor_login_emailid_set')){
        //    $instructor_name = session()->get('instructor_login_name_set');
        //    $instructor_emailid = session()->get('instructor_login_emailid_set');
        // ->with('instructor_name', $instructor_name)
            return view('instructor.create_course');
        }else{
            return redirect('login_instru');
        }
        // return view('instructor.create_course')
    }

    public function docreate_course(Request $request){         
         
            if (\Request::isMethod('post')){
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
                    // $request->file('file_uploaded')->storeAs('public/course_files',$file_name_store);
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

              
                // $result=$this->signupmodelobj->instructor_email_check($data['details']['instructor_email']);
            //  if($result == "false"){
                if($this->createcoursemodelobj->i_create_course($data['details'])){

                    Session::flash('new-course-status', 'Course created successfully');
                    session()->flash('alert-class', 'alert-success');
                    return redirect('create_course');
                }else{
                    Session::flash('new-course-status', 'Course create Failed!');
                    session()->flash('alert-class', 'alert-danger');
                    return redirect('create_course');
                }
            //  }else{
            //     session()->flash('register-status', 'Already this Email id Registered!');
            //     session()->flash('alert-class', 'alert-danger');
            //     return redirect('regi_instru');
            //  }
            }
        
    }
}
