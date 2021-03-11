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
        // dd($request->all());
    	return view('user.user_trade',['crops'=>$crops]);

    }



    public function usertrades_show(Request $request)
    {

    	$trades = Crop::join('trades', 'crops.id', '=', 'trades.crop_id')
            				   ->select('crops.name','crops.category','trades.*')
            				   ->get();
				   // print($trades);die;
				  
    	return view('user.usertrades_show',['trades'=>$trades]);
    	

    }
    
    public function trade_show(Request $request,$id)
    {
        
        $trade = Trade::find($id);

        return view('user.view_trade',['trade'=>$trade]);
    }



    public function user_tradedetail(Request $request)
    {


        $request->session()->put('create_trade', [
                                'id'=>$request->id, 
                                'quantity'=>$request->quantity, 
                                'area'=>$request->area, 
                                'accepected_rate'=>$request->accepected_rate, 
                            ]);

       // dd($request->all());

        $crop = Crop::find($request->id);
        // dd($request->all());

    	return view('user.user_tradedetail',['crop'=>$crop]);
    }

    public function save_user_tradedetail(Request $request){
       // dd($request->all());
       $create_trade =  \Session::get('create_trade'); 
      // dd($create_trade);
       $trade =  new Trade;
       $trade->quantity= $create_trade['quantity'];
       $trade->area= $create_trade['area'];
       $trade->accepected_rate= $create_trade['accepected_rate'];
       $trade->policy_type= $request->policy_type;


       $crop = Crop::find($create_trade['id']);
       $trade->crop_id=$create_trade['id'];
       // dd($request->all());

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

       return redirect()->route('user.usertrades_show');


    }
   

}
