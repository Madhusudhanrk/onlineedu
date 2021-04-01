<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\AdminDashboardModel;
use Session;

class AdminDashboardController extends Controller
{
    protected $admindashboardmodel;

    //constructor
    public function __construct()
    {
         $this->admindashboardmodel = new AdminDashboardModel();
    }
    public function index(){
        if(session()->has('admin_login_id_set')){
            $admin_count = $this->admindashboardmodel->admin_count();

            $last_created_admin = $this->admindashboardmodel->last_created_admin();
            if($last_created_admin != "false"){
                $recent_admin = $last_created_admin->admin_email_id;
                $a_created_at = $last_created_admin->created_at;
            }else{
                $recent_admin = "";
                $a_created_at = "";
            }
            // echo  "<pre>";
            // print_r($data);
            // echo $recent_admin;
            // echo $created_at;
            // echo $admin_count;
            // echo "</pre>";
            // exit;
            
            //users
            $user_count = $this->admindashboardmodel->user_count();
            $last_created_user = $this->admindashboardmodel->last_created_user();
            if($last_created_user != "false" ){
                $recent_user = $last_created_user->username;
                $u_created_at = $last_created_user->created_at;

            }else{
                $recent_user = "";
                $u_created_at = "";
            }

            //courses
            $courses_count = $this->admindashboardmodel->courses_count();
            $last_course_uploaded = $this->admindashboardmodel->last_course_uploaded();
            if($last_course_uploaded != "false"){
                $recent_course_ins = $last_course_uploaded->instructor_name;
                $c_created_at = $last_course_uploaded->created_at;
            }else{
                $recent_course_ins = "";
                $c_created_at = "";
            }

            //categories
            $categorie_count = 6;
            $last_course_uploaded = $this->admindashboardmodel->last_course_uploaded();
            if($last_course_uploaded != "false"){
                $course_name = $last_course_uploaded->course_name;
                $course_type = $last_course_uploaded->course_type;

            }else{
                $course_name = "";
                $course_type = "";
            }

            //Instructors
            $instructor_count = $this->admindashboardmodel->instructor_count();
            $lates_instructors = $this->admindashboardmodel->lates_instructors();
            if($last_course_uploaded != "false"){
                $instructor_name = $lates_instructors->instructor_name;
                $i_created_at = $lates_instructors->created_at;
            }else{
                $instructor_name = "";
                $i_created_at = "";
            }

            $data = [
                $admin_count,
                $recent_admin,
                $a_created_at,
                $user_count,
                $recent_user,
                $u_created_at,
                $courses_count,
                $recent_course_ins,
                $c_created_at,
                $categorie_count,
                $course_name,
                $course_type,
                $instructor_count,
                $instructor_name,
                $i_created_at,
                $admin_count,
                $user_count,
                $courses_count,
                $instructor_count,
                $categorie_count
            ];

            return view('admin.admin_dashboard')->with('data',$data);
        }else{
            return redirect('admin_login');
        }
    }

  
}
