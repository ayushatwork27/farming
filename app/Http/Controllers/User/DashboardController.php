<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

class DashboardController extends UserController
{
   public function dashboard_view(Request $request)
   {
   		return view('user.dashboard');
   }
}
