<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Crop;
use Illuminate\Support\Facades\DB;


class CropManagementController extends Controller
{
    
    public function index(Request $request)
    {
    
        $crops =  Crop::all();

        return view('admin.crop',['crops'=>$crops]);

    }

    
    public function create()
    {
        
        return view('admin.createcrop');
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

    
    public function update(Request $request,$crop_id)
    {
        
        $crop = Crop::find($crop_id);

        return view('admin.createcrop',['crop'=>$crop]);
    }


    public function status_update($id)
    {
        
        $crop = DB::table('crops')
                        ->select('active')
                        ->where('id','=',$id)
                        ->first();

        if($crop->active == '1')
        {
            $active = '0';
        }
        else
        {
            $active = '1';
        }

       
        $values = array('active' => $active );

                  DB::table('crops')->where('id',$id)->update($values);

        session()->flash('msg','crop status has been updated successfully.');

            return redirect('admin/crop_user_list');
    }

    public function destroy($id)
    {
        
        $student->delete();

        return redirect()->route('admin.crop')
                         ->with('success','Delete Successfully');
    }
}
