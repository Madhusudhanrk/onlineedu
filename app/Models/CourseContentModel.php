<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class CourseContentModel extends Model
{
    use HasFactory;
    public function get_courses_by_id($ref_course){
        $instructor_courses_rows = DB::table('instructor_courses')->where('course_type', '=', $ref_course)->get();
        return (!empty($instructor_courses_rows)) ? $instructor_courses_rows : "false";
    }
}
