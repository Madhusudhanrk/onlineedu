<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class AdminFeedbackModel extends Model
{
    use HasFactory;
    public function get_all_feedback(){
        $users = DB::table('feedback')->get();
        return (count($users)) ? $users : 0;
    }
}
