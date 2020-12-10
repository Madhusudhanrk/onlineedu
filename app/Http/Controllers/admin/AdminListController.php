<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\AdminListModel;
use DB;

class AdminListController extends Controller
{
    
    protected $adminlistmodel;

    //constructor
    public function __construct()
    {
         $this->adminlistmodel= new AdminListModel();
    }

    public function index(){
        
        if(session()->has('admin_login_id_set')){
            $all_admins = $this->adminlistmodel->get_all_admins();
            if($all_admins){
                return view('admin.admin_list')->with('all_admins',$all_admins);
            }else{
                return view('admin.admin_list')->with('all_admins',$all_admins);
            }
            // return view('admin.admin_list');         
        }else{
            return redirect('admin_login');
        }
        
    } 

     //id is getting from url route fetching and passing to this function
     public function destroy(Request $request){
         
        $id = $request->id;
        // echo $id;
        // exit;
        if(DB::table('admin_master')->where('id',$id)->delete()){
            echo "success";  
        };
        
    }
}
