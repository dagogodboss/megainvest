<?php

namespace App\User\Wallet;

use Illuminate\Database\Eloquent\Model;

class BitCoinWallet extends Model
{
    protected $fillable = [
    	'qrcode',
    	'user_id',
    	'address',
    	'invoice',
    	'balance',
    	'redeem_code',
    ];

    public function user(){
    	return $this->belongsTo(User::class); 
    }
}
