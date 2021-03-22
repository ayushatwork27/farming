<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends UserController
{
   public function dashboard_view(Request $request)
   {
   		$is_active = 0;
   		$user_id= \Auth::id();
   		$user = User::find($user_id);
   		return view('user.dashboard',['is_active'=>$user->is_active]);
   }
}
