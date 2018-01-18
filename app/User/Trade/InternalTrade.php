<?php

namespace App\User\Trade;

use Illuminate\Database\Eloquent\Model;

class InternalTrade extends Model
{
    protected $fillable = [
    	'user_id',
    	'price',
    	'type',
   		'quantity',
   		'crypto_wallet_id',
   		'account_details_id',
    ];

    public function user(){
    	return $this->belongsTo(User::class); 
    }
}
