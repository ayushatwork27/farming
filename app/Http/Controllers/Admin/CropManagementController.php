<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Crop;
use Illuminate\Http\Request;

class CropManagementController extends Controller
{
    //
	 public function index()
    {
       // $crops=Crop::latest()->paginate(5);
       // return view('admin.crop',compact('crops'))
       // ->with('i',(request()->input('page',1)-1)*5);
    	 $users  =   Crop::paginate(10);

       return view("crop", compact('crops'));

       
    
    }



    public function crop_user_list(Request $request)
    {
    	$users =  Crop::all();
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
