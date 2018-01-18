<?php

namespace App\Helper;
	
use App\Helper\Request\CurlRequest;
use App\Helper\Request\RequestHelper;

class FunctionInitializer{
	protected $curl, $send; 

	public function __construct(){
		$this->curl = new CurlRequest();
		$this->send = new RequestHelper();
	}

	public function curl(){
		return $this->curl;
	}

	public function send(){
		return $this->send;
	}
}