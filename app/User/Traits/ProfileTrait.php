<?php 

namespace App\User\Traits;

trait ProfileTrait{
	public function  getUserProfile(){
		return [
			'user' => LogUser(),
			'btc_wallet' => $this->bitcoin_account(),
			'usd_wallet' => $this->usd_account(),
			'crypto_wallet' => $this->crypto_account(),
		];
	}
}

?>