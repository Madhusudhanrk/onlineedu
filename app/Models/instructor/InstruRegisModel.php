<?php

namespace App\Models\instructor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class InstruRegisModel extends Model
{
    use HasFactory;
    public function instructor_email_check($i_email=null)
    {
        //it search and bring matched record
        $userRow = DB::table('instructor_details')->where('instructor_email', '=', $i_email)->first();
        return (!empty($userRow)) ? "true" : "false";
        //false belongs no duplicate id
    }
    
    public function signup_instructor($data=null)
    {
        $affected = DB::table('instructor_details')->insert($data);
        return $affected > 0 ? true : false;
    }
}
