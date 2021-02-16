<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user_register_form(Request $request){

    	return view('user.user_register_form');

    }

    public function save_user_details(Request $request){
    	dd($request->all());
    } 
}
