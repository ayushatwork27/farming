<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Crop;
use App\Models\User\Trade;
use Illuminate\Http\Request;

class UserTradeController extends Controller
{
    //
    public function user_trade(Request $request)
    {
        $crops =  Crop::all();

    	return view('user.user_trade',['crops'=>$crops]);
    }

    public function user_tradedetail(Request $request)
    {


        $request->session()->put('create_trade', [
                                'crop_id'=>$request->crop_id, 
                                'quantity'=>$request->quantity, 
                                'area'=>$request->area, 
                                'accepected_rate'=>$request->accepected_rate, 
                            ]);

       // dd($request->all());

        $crop = Crop::find($request->crop_id);
    	return view('user.user_tradedetail',['crop'=>$crop]);
    }

    public function save_user_tradedetail(Request $request){
       // dd($request->all());
       $create_trade =  \Session::get('create_trade'); 
      // dd($create_trade);
       $trade =  new Trade;
       $trade->crop_id= $create_trade['crop_id'];
       $trade->quantity= $create_trade['quantity'];
       $trade->area= $create_trade['area'];
       $trade->accepected_rate= $create_trade['accepected_rate'];
       $trade->policy_type= $request->policy_type;


       $crop = Crop::find($create_trade['crop_id']);

       if($request->policy_type == 'gold'){

            $actual_price = $crop->gold;

       }elseif($request->policy_type == 'silver'){

            $actual_price = $crop->silver;

       }elseif($request->policy_type == 'normal'){

            $actual_price = $crop->normal;
       }


       $trade->actual_price= $actual_price;
      
       $trade->created_by= \Auth::id();

       $trade->save();


    }
}
