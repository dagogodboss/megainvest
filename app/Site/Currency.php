<?php

namespace App\Site;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $fillable = [
    	'currency_name',
    	'symbol',
    ];

    public function account_detail(){
    	return $this->hasOne('App\User\Account\AccountDetail');
    }
}
