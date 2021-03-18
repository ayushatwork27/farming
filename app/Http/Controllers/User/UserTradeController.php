<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Crop;
use App\Models\User\Trade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class UserTradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trades = Trade::join('crops','crops.id','trades.crop_id')
                        ->join('users','users.id','trades.created_by')
                        ->select('trades.*','crops.name as crop_name','users.name as created_by_name')
                        ->paginate(10);
        //dd($trades);

        return view('user.trade_list',['trades'=>$trades]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $crops =  Crop::all();
      return view('user.trade_create_1',['crops'=>$crops]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function storeInSession(Request $request){

      //dd($request->all());
       if($request->quantity > 0 ){
         $request->session()->put('create_trade', [
                                'id'=>$request->id, 
                                'quantity'=>$request->quantity, 
                                'area'=>$request->area, 
                                'accepected_rate'=>$request->accepected_rate, 
                            ]);
        
        $crop = Crop::find($request->id);
        return view('user.trade_create_2',['crop'=>$crop]);

      }else{

         $request->session()->flash('failed','Quantity Should be greater than zero');
         return back();
      }

    }
    public function store(Request $request)
    {
         // dd($request->all());
         $create_trade =  \Session::get('create_trade'); 
        // dd($create_trade);
         $trade =  new Trade;
         $trade->quantity = $create_trade['quantity'];
         $trade->area= $create_trade['area'];
         $trade->accepected_rate= $create_trade['accepected_rate'];
         $trade->policy_type= $request->policy_type;


         $crop = Crop::find($create_trade['id']);
         $trade->crop_id=$create_trade['id'];
         // dd($request->all());

         if($request->policy_type == 'gold'){

              $actual_price = $crop->gold;
              $bonus_percentage = 50;

         }elseif($request->policy_type == 'silver'){

              $actual_price = $crop->silver;
              $bonus_percentage = 30;

         }elseif($request->policy_type == 'normal'){

              $actual_price = $crop->normal;
              $bonus_percentage = 0;
         }


         $trade->actual_price= $actual_price;
         $total_amount= $actual_price * $create_trade['quantity'];

         $bonus_amount  = ($bonus_percentage / 100) * $total_amount;

         $total_trading_amount = $total_amount - $bonus_amount;

         $trade->total_amount = $total_amount;
         $trade->bonus_amount = $bonus_amount;
         $trade->total_trading_amount = $total_trading_amount;
        
         $trade->created_by= \Auth::id();

         $trade->save();

         return redirect()->route('user.trade.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($trade_id)
    {
       $trade =  Trade::with('trade_details')
                        ->join('crops','crops.id','trades.crop_id')
                        ->join('users','users.id','trades.created_by')
                        ->select('trades.*','crops.name as crop_name','users.name as created_by_name')->find($trade_id);
       // dd($trade->trade_details);
       return view('user.trade_detail',['trade'=>$trade]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function user_trade(Request $request)

    {
     

    }
   

}
