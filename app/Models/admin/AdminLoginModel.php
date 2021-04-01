<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class AdminLoginModel extends Model
{
    use HasFactory;
    public function login_check($data=null)
    {
        //it bring record
        $userRow = DB::table('admin_master')->where('admin_email_id', '=', $data['admin_email_id'])->first();
        return (!empty($userRow)) ? $userRow : "false";
    }
}
