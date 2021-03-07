<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Crop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    	$crops =  Crop::all();
    	return view('admin.crop',['crops'=>$crops]);

    }

   

    
    public function createcrop()
    {
        return view('admin.createcrop');
    } 

    public function updatecrop(Request $request,$crop_id)
    {
        $crop = Crop::find($crop_id);
        return view('admin.createcrop',['crop'=>$crop]);
    }

    
    public function storecrop(Request $request)
    {
         // $request->validate([

         //    'studname'=>'required',
         //    'course'=>'required',
         //    'fee'=>'required'

         // ]);

        if($request->id){
            Crop::find($request->id)->update($request->all());
        }else{

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

    
    public function update(Request $request, crop $crop)
    {
        $request->validate([
        ]);

        $student->update($request->all());

        return redirect()->route('admin.crop')
        ->with('success','Update Successfully');
    }
     

     public function status_update($id)
    {
    	//get product status with the help of product ID
    	$crop = DB::table('crops')
    				->select('active')
    				->where('id','=',$id)
    				->first();

    	//Check user status
    	if($crop->active == '1'){
    		$active = '0';
    	}else{
    		$active = '1';
    	}

    	//update product status
    	$values = array('active' => $active );
    	DB::table('crops')->where('id',$id)->update($values);

    	session()->flash('msg','crop status has been updated successfully.');
    	return redirect('admin/crop_user_list');
    }

    
    public function destroy(crop $crop)
    {
        $student->delete();

        return redirect()->route('admin.crop')
        ->with('success','Delete Successfully');
    }
}
