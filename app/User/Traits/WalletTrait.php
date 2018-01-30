<?php 
	
namespace App\User\Traits;

use App\Notifications\Wallet\EmailWalletDetails;

trait  WalletTrait
{

	public function bitcoin_account(){
		return $this->bitcoin_wallets()->first();
	}

	public function usd_account(){
		return $this->usd_wallets()->first();
	}

	public function crypto_account(){
		return $this->crypto_wallets()->first();
	}

	public function getUserWalletDetails(){
		return response()->json([
			'usd_wallet'		=> $this->usd_account(),
			'crypto_wallet' 	=> $this->crypto_account(),
			'bitcoin_wallet' 	=> $this->bitcoin_account(),
		]);
	}

	public function setWalllet(){
		$this->createbitcoinwallet();
		$this->createEtherWallet();
		$this->createusdwallet();
		//emailUserhisDetails();
		return $this;
	}

	public function createEtherWallet(){
		$request = sitefunc()->curl()->get(api('ether-link'));
		$this->notify(new EmailWalletDetails($this, $this->bitcoin_account(), json_decode($request)));
		return $this->save_ether_wallet($request);
	}

	public function createusdwallet(){
		$this->usd_wallets()->create([
			'account_uuid' 	=> $this->getUSDAccount(),
			'balance'		=> 0,
		]);
	}

	public function createbitcoinwallet(){
		$request = sitefunc()->curl()
					->getWithData(
						api('bitcoin_create'), $this->bitcoin_parametrs()
					);
		$this->save_wallet($request, $this->getqrcode($request));
	} 

	public function save_ether_wallet($data){
		$this->crypto_wallets()->create([
			'account_uuid' 	=> json_decode($data)->address,
			'balance' 		=> '0',
		]);
		$wallet_file = file_put_contents($this->phone_number.'etherwallet.txt', $data);
		return $this->phone_number.'etherwallet.txt';
	}

	private function getqrcode($data){
		$add = json_decode($data)->address;
		$qrcode = sitefunc()->curl()->get(api('qrcode_link').$add);
		return $qrcode;
	}

	private function save_wallet($data, $svg_data){
		$qrcode = json_decode($svg_data)->qrcode;
		$wallet_data = json_decode($data);
		$this->bitcoin_wallets()->create([
			'balance'		=> 0,
			'qrcode'		=> $qrcode, 
			'address' 		=> $wallet_data->address,
			'invoice' 		=> $wallet_data->invoice,
			'redeem_code' 	=> $wallet_data->redeem_code,
		]);
	}

	public function get_btc_balance(){
		$param = $this->bitcoin_wallets->redeem_code;
		$response = sitefunc()->curl()->postJsonData(api('btc_info'), [
			'redeemcode' => $param,
		]);
		return $response;
	}

	public function bitcoin_parametrs(){
		return [
			'confirmations' => 1,
		];
	}

	public function get_btc_transaction(){
		
	}
}	

?>