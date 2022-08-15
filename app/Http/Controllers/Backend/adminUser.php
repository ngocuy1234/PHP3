<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class adminUser extends Controller
{
    public function index(){
        $user = \App\Models\User::select( 'id', 'name' , 'email' , 'password' ,'address' , 'phone' , 'status' , 'avatar' )
        ->where('users.role' , 2)->
        orderBy('users.id', 'desc')->paginate(request('limit') ?? 7);
        return view('admin.adminUser.adminUser' , ['user' => $user]);
    }
}
