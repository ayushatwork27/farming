<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Crop;
use App\Models\Category;
use Illuminate\Support\Facades\DB;


class CropManagementController extends Controller
{
    
    public function index(Request $request)
    {
    
        
         $crops = Crop::join('category','category.category_id','crops.category_id')
                        
                    ->paginate(10);

        return view('admin.crop',['crops'=>$crops]);

    }

    
    public function create()
    {
        $categories=Category::all();
    
           return view('admin.createcrop',['categories'=>$categories]);
    
    }

   
    public function store(Request $request)
    {
        
        if($request->id){

            Crop::find($request->id)->update($request->all());

        }
        else
        {

            Crop::create($request->all());

        }

         return redirect()->route('admin.index')
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

    
    public function update(Request $request,$crop_id)
    {
        
        $crop = Crop::find($crop_id);
        $categories=Category::all();

        return view('admin.createcrop',['crop'=>$crop,'categories'=>$categories]);


    }


     public function update_crop_status(Request $request,$id){

        $crop = Crop::find($id);

        if($crop->active){

            $crop->active = 0;

        }else{
            $crop->active = 1;
        }

        $crop->save();

        $request->session()->flash('feedback','crop Status successfully Updated!');
        return back();

    }   
    public function destroy($id)
    {
        
        $student->delete();

        return redirect()->route('admin.crop')
                         ->with('success','Delete Successfully');
    }
}
