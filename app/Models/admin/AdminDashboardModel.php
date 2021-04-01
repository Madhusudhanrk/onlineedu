<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class AdminDashboardModel extends Model
{
    use HasFactory;
    public function admin_count()
    {
        $affected = DB::table('admin_master')->get();
        return count($affected);
    }
    public function last_created_admin()
    {
        $affected = DB::table('admin_master')->orderBy('created_at', 'asc')->first();
        return (!empty($affected)) ? $affected : "false";
    }

    //user
    public function user_count()
    {
        $affected = DB::table('users_details')->get();
        return count($affected);
    }
    public function last_created_user()
    {  
        $affected = DB::table('users_details')->orderBy('created_at', 'asc')->first();
        return (!empty($affected)) ? $affected : "false";
    }

    //courses
    public function courses_count()
    {
        $affected = DB::table('instructor_courses')->get();
        return count($affected);
    }
    public function last_course_uploaded()
    {
        $affected = DB::table('instructor_courses')->orderBy('created_at', 'asc')->first();
        return (!empty($affected)) ? $affected : "false";
    }

    //Instructors
    public function instructor_count()
    {
        $affected = DB::table('instructor_details')->get();
        return count($affected);
    }
    public function lates_instructors()
    {
        $affected = DB::table('instructor_details')->orderBy('created_at', 'asc')->first();
        return (!empty($affected)) ? $affected : "false";
    }

}
