<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Crop;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;

class CropManagementController extends Controller
{
    //
	 // public function index()
  //   {
  //      $users=Crop::latest()->paginate(5);
  //      return view('admin.crop',compact('crops'))
  //      ->with('i',(request()->input('page',1)-1)*5);
    	 
  //   	 // $data=DB::table('crops')->pagination(4);
  //   	 // return view('ropManagementController',['data'=>$users]);


       
    
  //   }



    public function crop_user_list(Request $request)
    {
    	$users=Crop::latest()->paginate(5);
    	return view('admin.crop',['users'=>$users]);
    }

   

    
    public function createcrop()
    {
        return view('admin.createcrop');
    }

    
    public function storecrop(Request $request)
    {
         // $request->validate([

         //    'studname'=>'required',
         //    'course'=>'required',
         //    'fee'=>'required'

         // ]);

         Crop::create($request->all());

         return redirect()->route('admin.crop_user_list')
         ->with('success','Created Successfully');
    }

    
    public function show(crop $crop)
    {
        return view('admin.crop',compact('crop'));
    }

    
    public function edit(crop $crop)
    {
        return view('admin.crop',compact('crop'));
    }

    
    public function update(Request $request, crop $crop)
    {
        $request->validate([
        ]);

        $student->update($request->all());

        return redirect()->route('admin.crop')
        ->with('success','Update Successfully');
    }

    
    public function destroy(crop $crop)
    {
        $student->delete();

        return redirect()->route('admin.crop')
        ->with('success','Delete Successfully');
    }
}
