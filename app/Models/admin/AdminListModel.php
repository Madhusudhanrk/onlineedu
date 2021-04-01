<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class AdminListModel extends Model
{
    use HasFactory;
    public function get_all_admins(){
        $users = DB::table('admin_master')->get();
        return (count($users)) ? $users : 0 ;
    }
}
