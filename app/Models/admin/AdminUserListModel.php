<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class AdminUserListModel extends Model
{
    use HasFactory;
    public function get_all_users(){
        $users = DB::table('users_details')->get();
        return (count($users)) ? $users : 0;
    }
}
