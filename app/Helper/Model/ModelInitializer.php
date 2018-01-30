<?php

namespace App\Helper\Model;

use App\User;
use App\Site\Currency;
use App\User\Trade\InternalTrade;

class ModelInitializer
{
	protected $user, $emailtoken, $phonetoken, $buy, $currency, $trade; 

	public function __construct(){
		$this->user = new User();
		$this->currency   = new Currency();
		$this->trade = new InternalTrade();
	}

	public function user() {
		return $this->user;
	}

	public function emailtoken(){
		return $this->emailtoken;
	}

	public function phonetoken(){
		return $this->phonetoken;
	}

	public function currency(){
		return $this->currency;
	}

	public function trade(){
		return $this->trade;
	}

}