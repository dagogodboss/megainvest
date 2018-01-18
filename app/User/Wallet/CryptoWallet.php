<?php

namespace App\User\Wallet;

use Illuminate\Database\Eloquent\Model;

class CryptoWallet extends Model
{
    protected $fillable = [
    	'user_id',
    	'account_uuid',
    	'balance',
    ];
    
    public function user(){
    	return $this->belongsTo(User::class); 
    }
}
