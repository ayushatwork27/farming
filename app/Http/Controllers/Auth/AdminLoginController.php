<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminLoginController extends Controller
{


	public function __construct()
	{
		return $this->middleware('guest:admin');
	}

	
    public function admin_register_form(Request $request){

    	return view('admin.admin_register_form');

    }

    public function showLoginForm(Request $request){
       // dd('helo');
    	return view('admin.adminlogin');
    }


    public function login(Request $request){
    	
    	$this->validate($request, [
    		'username' => 'required|string',
    		'password' => 'required|min:6',
    	]);
    	


    	//dd($request->all());

    	if(Auth::guard('admin')->attempt(['email'=> $request->username, 'password'=> $request->password], $request->remember
        )){
        	//dd('hell login');
        	return redirect()->route('admin.dashboard');

    	}else{

    		    $request->session()->flash('failed','Please check Email id or Password');
            return back();
    	}

    }
}