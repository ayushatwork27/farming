<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User\Trade;
use App\Models\User\TradeDetail;
use Illuminate\Http\Request;

class TradeController extends Controller
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
        return view('admin.trade_list',['trades'=>$trades]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $trade =  Trade::with('trade_details')
                        ->join('crops','crops.id','trades.crop_id')
                        ->join('users','users.id','trades.created_by')
                        ->select('trades.*','crops.name as crop_name','crops.crop_type','users.name as created_by_name')->find($id);
       // dd($trade->trade_details);
       return view('admin.trade_detail',['trade'=>$trade]);
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

    public function trade_approve(Request $request){
        
        if($request->installment_number > 0 && $request->start_date){

            $trade = Trade::find($request->trade_id);
            
            if($trade->status_id == 0){

                $trade->status_id = 1;
                $trade->installment_number = $request->installment_number;
                $trade->save();
                $this->insertIntoTradeDetails($request);
                $request->session()->flash('feedback','Trade Approve successfully');
                return back();

            }else{

                $request->session()->flash('failed','Trade Already Approved');
                return back();
            }

            

        }else{
            $request->session()->flash('failed','Trade Approval Failed');
            return back();
        }
    }

    public function insertIntoTradeDetails($request){

        $trade = Trade::find($request->trade_id);
        $actual_price = $trade->actual_price;
        $total_trading_amount = $trade->total_trading_amount;
        $total_bonus_amount = $trade->bonus_amount;
        $quantity = $trade->quantity;
        $installment_number = $trade->installment_number;

        $single_trade_amount = $total_trading_amount/$installment_number;
        $single_bonus_amount = $total_bonus_amount/$installment_number;

        $single_trade_quantity = $quantity/$installment_number;
        $days = 360/$installment_number;

        //$days = 30;
        $today_date = $request->start_date;
       

        //echo "today_date: ".$today_date."<br/>";

        for ($ins_id=0; $ins_id < $installment_number ; $ins_id++) { 

            $total_days = $ins_id * $days;
            $next_due_date = date('Y-m-d', strtotime($today_date. " +".$total_days." days"));
            //echo $next_due_date."<br/>";
            # code...

            $trade_detail = new TradeDetail;
            $trade_detail->trade_id = $request->trade_id;
            $trade_detail->quantity = $single_trade_quantity;
            $trade_detail->amount = $single_trade_amount;
            $trade_detail->bonus_amount = $single_bonus_amount;
            $trade_detail->trading_date = $next_due_date;
            $trade_detail->barcode = $this->generateBarcode(4);
            $trade_detail->save();

        }

         // 
    }

   public function generateBarcode($digit){
        $x = $digit; // Amount of digits
        $min = pow(10,$x);
        $max = pow(10,$x+1)-1;
        $value = rand($min, $max);
        return $value;
    }

    public function status_change(Request $request){
        //dd($request->all());

        if($request->status == 'pending'){
            $status_id = 0;
        }elseif ($request->status == 'receive_payment_pending') {
            $status_id = 1;
        }elseif ($request->status == 'payment_done') {
            $status_id = 2;
        }

        $trade_detail = TradeDetail::find($request->trade_detail_id);
        if($status_id){

            $trade_detail->status_id = $status_id;
            $trade_detail->save();

            $request->session()->flash('feedback','Status Change successfully');
                return back();


        }else{
             $request->session()->flash('failed','Status Change Failed');
                return back();
        }

    }

    public function add_payment(Request $request){
        //dd($request->all());
        
        if(!$request->transaction_number){
            $request->session()->flash('failed','Transaction Number Required');
                return back();
        }

        $trade_detail = TradeDetail::find($request->trade_detail_id);
        if($trade_detail->status_id==1){

            $trade_detail->status_id = 2;
            $trade_detail->transaction_number = $request->transaction_number;
            
            $trade_detail->payment_done_for = $request->amount;
          
            $trade_detail->save();

            $request->session()->flash('feedback','Add Payment successfully');
                return back();


        }else{
             $request->session()->flash('failed','Payment Already Added');
                return back();
        }
    }
}
