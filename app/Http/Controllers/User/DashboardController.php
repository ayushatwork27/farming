<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

class DashboardController extends UserController
{
   public function dashboard_view(Request $request)
   {
   		$is_active = 0;
   		return view('user.dashboard',['is_active'=>$is_active]);
   }
}
