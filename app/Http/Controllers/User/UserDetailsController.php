<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Models\User\UserDetail;
use Auth;
use Illuminate\Http\Request;

class UserDetailsController extends UserController
{
    public function user_register_form(Request $request){

    	$user_id = Auth::id();
    	$user  = User::find($user_id);
    	//dd($user);
    	$user_detail = UserDetail::where('user_id',$user_id)->first();
    	return view('user.user_register_form',['user'=>$user,'user_detail'=>$user_detail ]);

    }

    public function save_user_details(Request $request){

    	//dd($request->all());
    	$user_id = Auth::id();
    	$user = User::find($user_id);
    	$user->email = $request->email;
    	$user->name = $request->name;

    	$user_detail = UserDetail::where('user_id',$user_id)->first();
    	if(!$user_detail){
    		$user_detail = new UserDetail;
    	}
    	$user_detail->user_id = $user_id;
    	$user_detail->father_name = $request->father_name;
    	$user_detail->family_member = $request->family_member;
    	$user_detail->dob = $request->dob;
    	$user_detail->aadhar_number = $request->aadhar_number;
    	$user_detail->mobile = $request->mobile;
    	$user_detail->state = $request->state;
    	$user_detail->district = $request->district;
    	$user_detail->city = $request->city;
    	$user_detail->pincode = $request->pincode;
    	$user_detail->address = $request->address;
    	$user_detail->area = $request->area;
    	$user_detail->land_type = $request->land_type;
    	$user_detail->bank_name = $request->bank_name;
    	$user_detail->name_on_bank = $request->name_on_bank;
    	$user_detail->account_number = $request->account_number;
    	$user_detail->ifsc_code = $request->ifsc_code;
    	$user_detail->passbook_image = $request->file('passbook_image')->store('useredetalisimage');
    	$user_detail->passport_size_image = $request->file('passport_size_image')->store('useredetalisimage');
    	$user_detail->signature_image = $request->file('signature_image')->store('useredetalisimage');
    	$user_detail->aadhar_image = $request->file('aadhar_image')->store('useredetalisimage');
    	$user_detail->save();

        $request->session()->flash('feedback','Your Details has been sent successfully Updated!');
	    return back();
        				//->with('success', 'Your Details has been sent successfully Updated!');

    } 
}








