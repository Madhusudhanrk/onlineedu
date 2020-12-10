<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Logincheckmodel extends Model
{
    use HasFactory;
    public function login_check($data=null)
    {
        //it bring record
        $userRow = DB::table('users_details')->where('useremail', '=', $data['useremail'])->first();
        return (!empty($userRow)) ? $userRow : "false";
    }
}
