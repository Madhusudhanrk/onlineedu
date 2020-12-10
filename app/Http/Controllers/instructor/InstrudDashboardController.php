<?php

namespace App\Http\Controllers\instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InstrudDashboardController extends Controller
{
    public function index(){
        return view('instructor.dashboard');
    }
}
