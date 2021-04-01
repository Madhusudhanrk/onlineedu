<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class signupmodel extends Model
{
    use HasFactory;

    public function user_email_check($i_email=null)
    {
        //it search and bring matched record
        $userRow = DB::table('users_details')->where('useremail', '=', $i_email)->first();
        return (!empty($userRow)) ? "true" : "false";
        //false belongs no duplicate id
    }

    public function signup_user($data=null)
    {
        $affected = DB::table('users_details')->insert($data);
        return $affected > 0 ? true : false;
    }
}
 