<?php

namespace App\Http\Controllers\instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\instructor\InstructorCourseListModel;
use DB;
class InstructorCourseListController extends Controller
{
    protected $courselistmodelobj;

    //constructor
    public function __construct()
    {
         $this->courselistmodelobj= new InstructorCourseListModel();
    }

    public function index(){
        if(session()->has('instructor_login_emailid_set')){
            $instructor_emailid = session()->get('instructor_login_emailid_set');
            
            $course_list=$this->courselistmodelobj->get_courses_by_id($instructor_emailid);
            // echo $course_list;
            // exit;
            if($course_list){
                return view('instructor.instructor_course_list')->with('course_list',$course_list);
            }else{
                return view('instructor.instructor_course_list')->with('course_list',$course_list);
            }
        } else{
            return redirect('login_instru');
        }
    }
    //id is getting from url route fetching and passing to this function
    public function destroy(Request $request){
         
        $id = $request->id;
        // echo $id;
        // exit;
        if(DB::table('instructor_courses')->where('id',$id)->delete()){
            echo "success";  
        };
        
        // echo "success";
        // exit;
        // if(DB::delete('delete from instructor_courses where id = ?',[$id])){
        //     return json([
        //         "success"=>"Course deleted successfully"
        //     ]);
        // }
         
    }
}
