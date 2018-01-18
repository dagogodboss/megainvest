<?php

namespace App\Helper\Request;

class RequestHelper
{	

	public function redirectTo($link, $type, $message){
		return redirect($link)->with($type, $message);
	}

	public function RequestNewToken($user){
		if($user->UpdateEmailToken())$user->sendEmailToken();
		return $this->redirectTo('change-email/'.$user->hashId(), 'reg_success', config('messages.change_email'));
	}

	public function jsonResponse($type, $message, $code=200){
		return response()->json([
			$type => $message,
		], $code);
	}
}