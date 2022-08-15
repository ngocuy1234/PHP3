<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class adminStaff extends Controller
{
    public function index(){
        $staff = User::select( 'id', 'name' , 'email' , 'password' ,'address' , 'phone' , 'status' , 'avatar' )
        ->where('users.role' , 1)->orWhere('users.role' , 0)->
        orderBy('users.id', 'desc')->paginate(request('limit') ?? 7);
        return view('admin.adminStaff.adminStaff' , ['staff' => $staff]);
    }

    public function distroy($id){
        $staff = User::find($id);
        $staff->delete();
      
        return redirect()->back();
    }
    
    public function updateRole(){
        $status = $_GET['status'] ? $_GET['status'] : '';
        $id = $_GET['id'] ? $_GET['id'] : '';

        $staff = User::find($id);
        if($staff){
            $staff->role = $status;
            $staff->save();
            echo 'success';
        }else{
            echo 'error';
        }
    }
}