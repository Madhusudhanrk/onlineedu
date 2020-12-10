<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseContentModel;
use Session;
class CourseContentsController extends Controller
{
    protected $getcoursemodelobj;

    //constructor
    public function __construct()
    {
         $this->getcoursemodelobj= new CourseContentModel();
    }

    public function index($ref_course=null){
        if(session()->has('user_login_id_set')){                 
        
            $course_list=$this->getcoursemodelobj->get_courses_by_id($ref_course);
            if(count($course_list) > 0){
                return view('pages.course_contents')->with('course_list',$course_list);
            }else{
                Session::flash('course-view', 'No Courses Available In This Category!');
                session()->flash('alert-class', 'alert-danger');
                return redirect('courses');
            }
       }else{        
        return redirect('login');
       }
    }
}
