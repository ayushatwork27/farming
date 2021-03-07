<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Trade;

class UserTradeController extends Controller
{
    //
    public function user_trade(Request $request)
    {
    	$users =  Trade::create($request->all());;
    	return view('user.user_trade',['users'=>$users]);
    }

    public function show(Request $request)
    {
    	// print_r($request->input('accepected_rate'));
    	$request->session()->put('user',$request->input('accepected_rate'));
    	// echo $request->session()->get('user');
    	return view('user.user_tradedetail')->with('data',$request->session()->get('user'));
    }
}
