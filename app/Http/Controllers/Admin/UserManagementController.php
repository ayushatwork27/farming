<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
     public function registered_user_list(Request $request)
    {
    	$users =  User::all();
    	return view('admin.registered_user_list',['users'=>$users]);
    }
}
