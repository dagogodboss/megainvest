<?php

namespace App\User\Traits;
 
trait RelationshipTrait{
    
    public function account_details(){
        return $this->hasOne('App\User\Account\AccountDetail');
    }   
    
    public function crypto_wallets(){
        return $this->hasOne('App\User\Wallet\CryptoWallet');
    }   
   
    public function internal_trades(){
        return $this->hasOne('App\User\Trade\InternalTrade');
    }   
    
    public function bitcoin_wallets(){
        return $this->hasOne('App\User\Wallet\BitCoinWallet');
    }	
	
    public function usd_wallets(){
		return $this->hasOne('App\User\Wallet\UsdWallet');
	}

	public function emailmagictoken(){
        return $this->hasOne('App\Authenticator\Email\EmailMagicToken');
    }

    public function phonemagictoken(){
        return $this->hasOne('App\Authenticator\Phone\PhoneMagicToken');
    }

    public function country_code(){
    	return $this->belongsTo('App\Site\CountryCode');
    }

    public function twowayverification(){
        return $this->hasOne('App\Authenticator\Phone\TwoWayVerifaction');
    }
}