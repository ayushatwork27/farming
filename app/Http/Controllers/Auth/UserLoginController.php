<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
            $user_id= \Auth::id();
            $user = User::find($user_id);
            $request->session()->put('is_active_user',$user->is_active);
        	return redirect()->intended(route('user.dashboard'));

    	}else{


             $request->session()->flash('failed','Please check Email id or Password');
            return back();
        }

    }
    	
}