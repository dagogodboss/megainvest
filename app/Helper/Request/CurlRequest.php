<?php

namespace App\Helper\Request;

use Ixudra\Curl\Facades\Curl;

class CurlRequest{

	public function get($link){
		$response = Curl::to($link)
        ->get();
        return $response;
	}

	public function getWithData($link, $value = array()){
		$response = Curl::to($link)
        ->withData($value)
        ->get();
        return $response;
	}

	public function postWithData($link, $value = array()){
		$response = Curl::to($link)
        ->withData($value)
        ->post();
        return $response;
	}

	public function postJsonData($link, $value= array()){
		$response = Curl::to($link)
		->withData($value)
		->asJson()
		->post();
		return $response;
	}
}