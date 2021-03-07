<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Trade;
use App\Http\Controllers\Admin\CropManagementController;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\User;
use App\Models\User\UserDetail;


class UserTradeController extends Controller
{
    //
    public function user_trade(Request $request)
    { 
    	
    	
    	$users =  Trade::create($request->all());
    	return view('user.user_trade',['user'=>$users]);
    }

    public function show(Request $request)
    {
    	// print_r($request->input('accepected_rate'));

    	$bhavit = \DB::table("crops")->pluck("normal","id")->last();


// $users2 = \DB::table("crops")->pluck("silver","id")->last();

// $users3 = \DB::table("crops")->pluck("gold","id")->last();
    	$request->session()->put('user',$request->input('accepected_rate'));
    	
    	// echo $request->session()->get('user');
    	return view('user.user_tradedetail')->with('data',$request->session()->get('user'));





    }
   

}
