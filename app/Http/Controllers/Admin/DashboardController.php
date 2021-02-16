<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends AdminController
{
   public function dashboard_view(Request $request)
   {
   		//dd('dashboard');
   		return view('admin.dashboard');
   }
}
