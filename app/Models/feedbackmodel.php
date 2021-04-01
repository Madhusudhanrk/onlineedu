<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class feedbackmodel extends Model
{
    use HasFactory; 

    public function feedback_send($data=null)
    {
        $affected = DB::table('feedback')->insert($data);
        return $affected > 0 ? true : false;
    }
}