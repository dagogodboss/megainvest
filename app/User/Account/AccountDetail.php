<?php

namespace App\User\Account;

use Illuminate\Database\Eloquent\Model;

class AccountDetail extends Model
{
    protected $fillable = [
    	'user_id', 'currency_id', 'account_address', 'balance'
    ];

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function currency(){
    	return $this->belongsTo('App\Site\Currency');
    }
}
