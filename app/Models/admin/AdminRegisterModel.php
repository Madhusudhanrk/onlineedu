<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class AdminRegisterModel extends Model
{
    use HasFactory;
    public function admin_count()
    {
        $affected = DB::table('admin_master')->get();
        return count($affected);
    }
    public function ref_admin_email_check($reference_admin_email=null)
    {
        //it search and bring matched record
        $userRow = DB::table('admin_master')->where('admin_email_id', '=', $reference_admin_email)->first();
        return (!empty($userRow)) ? "true" : "false";
        //false belongs no duplicate id
    }

    public function admin_already_registered($admin_email=null)
    {
        //it search and bring matched record
        $userRow = DB::table('admin_master')->where('admin_email_id', '=', $admin_email)->first();
        return (!empty($userRow)) ? "true" : "false";
        //false belongs no duplicate id
    }

    public function admin_register($data=null)
    {
        $affected = DB::table('admin_master')->insert($data);
        return $affected > 0 ? true : false;
    }
}
