<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    use HasFactory;
    protected $table = 'trades';
    protected $fillable = [
		'quantity','area','accepected_rate'
    ];
}
