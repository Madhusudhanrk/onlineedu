<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class ForgotPassModel extends Model
{
    use HasFactory;
    public function forgot_email_check($data=null)
    {
        $userRow = DB::table('users_details')->where('useremail', '=', $data['email'])->first();
        return (!empty($userRow)) ? $userRow : "false";
    }

    public function update_refno($data=null,$id=null)
    {
        $affected = DB::table('users_details')->where('id','=', $id)->update($data);
        return $affected > 0 ? true : false;
    }

    public function expire_check($ref_no=null)
    {
        $userRow = DB::table('users_details')->where('ref_no', '=', $ref_no)->first();
        return (!empty($userRow)) ? true : false;
    }

    public function change_password($data=null,$ref_no=null)
    {
        $affected = DB::table('users_details')->where('ref_no','=', $ref_no)->update($data);
        return $affected > 0 ? "true" : "false";
    }
}
