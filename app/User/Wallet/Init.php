<?php 
namespace App\User\Wallet;

use Coinbase\Wallet\Client;
use Coinbase\Wallet\Configuration;

class Init
{
	protected $client, $config;

	public function __construct(){
		$this->config = Configuration::apikey(api('cbapikey'), api('cbapisecret'));
		$this->client = Client::create($this->config);
	}

	public function client(){
		return $this->client;
	}
}

?>