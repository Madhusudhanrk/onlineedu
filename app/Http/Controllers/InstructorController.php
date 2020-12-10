<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstructorController extends Controller
{
    public function instructor(){
        return view('pages.instructor');
    }
}
