<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class AdminInstructorListModel extends Model
{
    use HasFactory;
    public function get_all_instructors(){
        $users = DB::table('instructor_details')->get();
        return (count($users)) ? $users : 0;
    }
}
