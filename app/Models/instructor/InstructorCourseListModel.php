<?php

namespace App\Models\instructor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class InstructorCourseListModel extends Model
{
    use HasFactory;
    public function get_courses_by_id($instructor_emailid){
        $instructor_courses_rows = DB::table('instructor_courses')->where('instructor_emailid', '=', $instructor_emailid)->get();
        return (count($instructor_courses_rows)) ? $instructor_courses_rows : 0;
    }
}
