<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TradeDetail extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'trade_details';
    protected $gaurded = [
    ];
    protected $dates = ['created_at','updated_at','deleted_at'];
}
