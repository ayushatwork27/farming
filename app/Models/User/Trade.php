<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    use HasFactory;
    protected $table = 'trades';
    protected $gaurded = [
		
    ];
    protected $dates = ['created_at'];

    public function trade_details(){
    	return $this->hasMany('App\Models\User\TradeDetail','trade_id','id');
    }
}
