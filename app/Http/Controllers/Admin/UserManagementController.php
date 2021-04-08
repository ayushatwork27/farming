<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\User\UserDetail;
use Illuminate\Http\Request;
use PDF;

class UserManagementController extends Controller
{
     public function registered_user_list(Request $request)
    {
    	$users =  User::all();
    	return view('admin.registered_user_list',['users'=>$users]);
    }

    public function user_detail(Request $request,$user_id){

    	$user = User::with('user_detail')->find($user_id);

    	return view('admin.user_detail',['user'=>$user]);
    	//dd($user->user_details);
    }

    public function downloadPDF(Request $request,$user_id)
    {    

        $user= User::with('user_detail')->find($user_id);
        $file_path_name = $user->passbook_image;
        $view = \View::make('admin.pdf', ['user'=>$user]);
        $html_content = $view->render();
        PDF::SetTitle("List of users");
        PDF::AddPage();
        PDF::writeHTML($html_content, true, false, true, false, '');
        // D is the change of these two functions. Including D parameter will avoid 
        // loading PDF in browser and allows downloading directly
        PDF::Output('userlist.pdf', 'D');    
    }

    public function download_image(Request $request,$user_id,$path){
    	//dd($user_id,$path);
    	$image  = UserDetail::where('user_id',$user_id)->first();

    	//$path_1 = public_path();
    	//dd($path_1);
    	if($path == "passbook_image"){

    		$file_path_name = $image->passbook_image;

    	}elseif($path == "passport_size_image"){

    		$file_path_name = $image->passport_size_image;

    	}elseif($path == "signature_image"){

    		$file_path_name = $image->signature_image;

    	}elseif($path == "aadhar_image"){
    		
    		$file_path_name = $image->aadhar_image;
    	}

    	//dd($file_path_name);

    	$full_path =storage_path('app/public/' . $file_path_name);

	    return response()->download($full_path);
    }

    public function update_user_status(Request $request,$user_id){

    	$user = User::find($user_id);

    	if($user->is_active){

    		$user->is_active = 0;

    	}else{
    		$user->is_active = 1;
    	}

    	$user->save();

    	$request->session()->flash('feedback','User Status successfully Updated!');
	    return back();

    }	
}
