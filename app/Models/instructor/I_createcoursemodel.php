<?php

namespace App\Models\instructor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class I_createcoursemodel extends Model
{
    use HasFactory;
    public function i_create_course($data=null)
    {
        $affected = DB::table('instructor_courses')->insert($data);
        return $affected > 0 ? true : false;
    }
}
