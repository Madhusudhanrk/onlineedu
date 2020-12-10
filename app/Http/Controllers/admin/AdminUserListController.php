<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\AdminUserListModel;
use DB;
class AdminUserListController extends Controller
{
    protected $adminuserlistmodel;

    //constructor
    public function __construct()
    {
         $this->adminuserlistmodel= new AdminUserListModel();
    }
    
    public function index(){
        if(session()->has('admin_login_id_set')){            
            
            $all_users = $this->adminuserlistmodel->get_all_users();
            // echo "<pre>";
            // print_r($all_users);
            // echo "</pre>";
            // exit;
            if($all_users){
                return view('admin.admin_user_list')->with('all_users',$all_users);
            }else{
                return view('admin.admin_user_list')->with('all_users',$all_users);
            }
        }else{
            return redirect('admin_login');
        }
    }

    //id is getting from url route fetching and passing to this function
    public function destroy(Request $request){
         
        $id = $request->id;
        // echo $id;
        // exit;
        if(DB::table('users_details')->where('id',$id)->delete()){
            echo "success";  
        };
        
    }
}
