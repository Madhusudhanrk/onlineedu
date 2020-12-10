<?php

namespace App\Models\instructor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class I_updatecoursemodel extends Model
{
    use HasFactory;
    public function get_courses_by_id($id){
        $instructor_courses_rows = DB::table('instructor_courses')->where('id', '=', $id)->get();
        return (!empty($instructor_courses_rows)) ? $instructor_courses_rows : "false";
    }
    public function i_update_course($data=null,$id=null)
    {
        $affected = DB::table('instructor_courses')->where('id','=', $id)->update($data);
        return $affected > 0 ? "true" : "false";
    }
}
