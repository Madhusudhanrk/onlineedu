<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\BasicController;
// use App\Http\Controllers\instructor\InstructorCourseListController;
use App\Http\Controllers\ForgotPassController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/basic','BasicController@basic');
// Route::get('/basic',[BasicController::class,'basic']);

// PAGES ROOTS

Route::any('/','App\Http\Controllers\HomeController@index');
Route::any('/index','App\Http\Controllers\HomeController@index');
Route::any('/home','App\Http\Controllers\HomeController@index');
Route::any('/contact','App\Http\Controllers\ContactController@contact');
Route::any('/courses','App\Http\Controllers\CoursesController@courses');
Route::any('/instructor','App\Http\Controllers\InstructorController@instructor');
Route::any('/about','App\Http\Controllers\AboutController@about');

//COURSE CATEGORY CONTENTS
Route::any('/course_contents/{para}','App\Http\Controllers\CourseContentsController@index');

//FEEDBACK
Route::any('feedback_process', 'App\Http\Controllers\feedback@ur_feedback');

// USER ROUTES
Route::any('/login','App\Http\Controllers\LoginController@index');
Route::any('/dologin','App\Http\Controllers\LoginController@dologin');
Route::any('/u_logout','App\Http\Controllers\LoginController@u_logout');
Route::any('/signup','App\Http\Controllers\SignupController@index');
Route::any('/createuser','App\Http\Controllers\SignupController@createuser');


//USER RESET PASSWORD
Route::any('/u_email_exist','App\Http\Controllers\ForgotPassController@index');
Route::any('/forgot-password','App\Http\Controllers\ForgotPassController@forgot_password');//mail send call
Route::any('change_password_form_call/{para}','App\Http\Controllers\ForgotPassController@change_password_form_call');//pass and con pass form submit

// Route::any('change-password/{para}','App\Http\Controllers\ForgotPassController@change_password');
Route::match(['get', 'post'], 'change-password/{para}', [ForgotPassController::class, 'change_password'])->name('change-password/{para}');

//INSTRUCTOR ROUTES------------------------------------------------------------------

// INSTRUCTOR RIGISTER
Route::any('/regi_instru','App\Http\Controllers\instructor\InstruRegisController@index');
Route::any('/registerinstructor','App\Http\Controllers\instructor\InstruRegisController@registerinstructor');


//INSTRUCTOR LOGIN
Route::any('/login_instru','App\Http\Controllers\instructor\InstruLoginController@index');
Route::any('/logout_instru','App\Http\Controllers\instructor\InstruLoginController@i_logout');
Route::any('/dologin_instru','App\Http\Controllers\instructor\InstruLoginController@dologin_instru');


//INSTRUCTOR FORGOT PASSWORD
Route::any('/i_email_exist','App\Http\Controllers\instructor\I_ForgotPassController@index');//exist email check
Route::any('/i_forgot-password','App\Http\Controllers\instructor\I_ForgotPassController@i_forgot_password');//reset mail send
Route::any('i_change_password_form_call/{para}','App\Http\Controllers\instructor\I_ForgotPassController@i_change_password_form_call');//change password form submit
Route::any('i_change-password/{para}','App\Http\Controllers\instructor\I_ForgotPassController@i_change_password');//change


//INSTRUCTOR CREATE COURSE
Route::any('/create_course','App\Http\Controllers\instructor\InstructorCreateCourseController@index');
Route::any('/docreate_course','App\Http\Controllers\instructor\InstructorCreateCourseController@docreate_course');


//INSTRUCTOR COURSE LIST TABLE
Route::any('/i_course_list','App\Http\Controllers\instructor\InstructorCourseListController@index');

//INSTRUCTOR UPDATE COURSE
Route::get('update_course/{id}','App\Http\Controllers\instructor\InstructorUpdateCourseController@index');
Route::any('/doupdate_course/{id}','App\Http\Controllers\instructor\InstructorUpdateCourseController@doupdate_course');


//INSTRUCTOR DELETE COURSE
Route::post('delete_course', 'App\Http\Controllers\instructor\InstructorCourseListController@destroy')->name('delete_course.destroy');
 

// ADMIN ROUTES----------------------------------------------------------

// ADMIN REGISTER

Route::any('/admin_register','App\Http\Controllers\admin\AdminRegisController@index');
Route::any('/doadmin_register','App\Http\Controllers\admin\AdminRegisController@doadmin_register');

// ADMIN LOGIN

Route::any('/admin_login','App\Http\Controllers\admin\AdminLoginController@index');
Route::any('/doadmin_login','App\Http\Controllers\admin\AdminLoginController@doadmin_login');
Route::any('/a_logout','App\Http\Controllers\admin\AdminLoginController@a_logout');

//ADMIN FORGOT PASSWORD

Route::any('/a_email_exist','App\Http\Controllers\admin\A_ForgotPassController@index');//exist email check
Route::any('/a-forgot-password','App\Http\Controllers\admin\A_ForgotPassController@a_forgot_password');//reset mail send
Route::any('a_change_password_form_call/{para}','App\Http\Controllers\admin\A_ForgotPassController@a_change_password_form_call');//change password form submit
Route::any('a-change-password/{para}','App\Http\Controllers\admin\A_ForgotPassController@a_change_password');//change

// ADMIN PANEL
Route::any('/admin_dashboard','App\Http\Controllers\admin\AdminDashboardController@index');
Route::any('/admin_user_list','App\Http\Controllers\admin\AdminUserListController@index');
Route::any('/admin_instructor_list','App\Http\Controllers\admin\AdminInstructorListController@index');
Route::any('/admin_list','App\Http\Controllers\admin\AdminListController@index');
Route::any('/admin_feedback_list','App\Http\Controllers\admin\AdminFeedbackController@index');
 
//ADMIN DELETE COURSE
Route::post('a_u_delete', 'App\Http\Controllers\admin\AdminUserListController@destroy');

Route::post('a_i_delete', 'App\Http\Controllers\admin\AdminInstructorListController@destroy');

Route::post('a_l_delete', 'App\Http\Controllers\admin\AdminListController@destroy'); 

Route::post('a_f_delete', 'App\Http\Controllers\admin\AdminFeedbackController@destroy'); 

//View PDF Content 
Route::get('call_view_pdf/{pdf_path}', function ($pdf_path) {
    return view('pages.view_pdf')->with('pdf_path',$pdf_path);
});