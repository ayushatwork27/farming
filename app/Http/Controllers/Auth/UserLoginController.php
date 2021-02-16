<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class UserLoginController extends Controller
{
	use AuthenticatesUsers;

	protected $redirectTo = RouteServiceProvider::HOME;

	public function __construct()
	{
		return $this->middleware('guest:web');
	}


    public function user_register_form(Request $request){

    	return view('user.user_register_form');

    }

    public function showLoginForm(Request $request){

    	return view('user.userlogin');
    }	 


    
    public function login(Request $request){

    	
    	$this->validate($request, [
    		'username' => 'required|string',
    		'password' => 'required|min:6',
    	]);


    	if(Auth::guard()->attempt(['email'=> $request->username, 'password'=> $request->password], $request->remember
        )){

        	return redirect()->intended(route('user.dashboard'));
    	}

    }
    	
}