<?php

namespace App\Models\instructor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class InstruLoginModel extends Model
{
    use HasFactory;
    public function login_check($data=null)
    {
        //it search and bring matched record
        $userRow = DB::table('instructor_details')->where('instructor_email', '=', $data['instructor_email'])->first();
        return (!empty($userRow)) ? $userRow : "false";
    }
}
