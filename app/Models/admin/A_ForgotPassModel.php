<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class A_ForgotPassModel extends Model
{
    use HasFactory;
    public function forgot_email_check($data=null)
    {
        $userRow = DB::table('admin_master')->where('admin_email_id', '=', $data['email'])->first();
        return (!empty($userRow)) ? $userRow : "false";
    }

    public function update_refno($data=null,$id=null)
    {
        $affected = DB::table('admin_master')->where('id','=', $id)->update($data);
        return $affected > 0 ? true : false;
    }

    public function expire_check($ref_no=null)
    {
        $userRow = DB::table('admin_master')->where('ref_no', '=', $ref_no)->first();
        return (!empty($userRow)) ? true : false;
    }

    public function change_password($data=null,$ref_no=null)
    {
        $affected = DB::table('admin_master')->where('ref_no','=', $ref_no)->update($data);
        return $affected > 0 ? "true" : "false";
    }
}
