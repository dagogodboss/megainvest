<?php

namespace App\Helper\Model;

use App\User;
/*use App\EmailMagicToken;
use App\Admin\Trade\Currency;
use App\Auth\PhoneMagicToken;
use App\User\Trade\BuyCurrency;*/

class ModelInitializer
{
	protected $user/*, $emailtoken, $phonetoken, $buy, $currency*/; 

	public function __construct(){
		$this->user = new User();
		/*$this->emailtoken = new EmailMagicToken();
		$this->phonetoken = new PhoneMagicToken();
		$this->currency   = new Currency();
		$this->buy        = new BuyCurrency();*/
	}

	public function user() {
		return $this->user;
	}

	/*public function emailtoken(){
		return $this->emailtoken;
	}

	public function phonetoken(){
		return $this->phonetoken;
	}

	public function currency(){
		return $this->currency;
	}

	public function buy(){
		return $this->buy;
	}*/
}