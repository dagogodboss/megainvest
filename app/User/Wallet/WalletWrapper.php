<?php

namespace App\User\Wallet;

use App\User\Wallet\Init;
use Coinbase\Wallet\Resource\User;
use Coinbase\Wallet\Resource\Account;
use Coinbase\Wallet\Resource\Address;


class WalletWrapper
{
	protected $init;

	public function __construct(){
		$this->init = new Init();
	}

	public function create_wallet(){
		$account = new Account();
		$account->setName('New Wallet');
		$this->init->client()->createAccount($account);

		/*$user = new Address();
		$user->getAddress();*/
	}

}