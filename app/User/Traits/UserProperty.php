<?php

namespace App\User\Traits;

use App\Notifications\Auth\EmailVerificationToken;

trait UserProperty{

	public function hasTwoWayAuth(){
		return $this->tfa_security;
	}

	public function hashId(){
    	return hash('sha256',$this->id.config('app.salt'));
    }

    public function two_way_verification(){
    	return $this->storeTWToken()->sendToken($this->twowaytoken());
    }

    public function activate_two_auth(){
    	$this->tfa_security = 1;
    	$this->save();
    	return true;
    }

    public function remove_user_password(){
    	$this->password = null;
    	$this->save();
    	return true;
    }

    public function deactivate_two_auth(){
    	$this->tfa_security = false;
    	$this->save();
    	return true;
    }

    public function storeTWToken(){
    	$this->twowayverification()->delete();
		$this->twowayverification()->create([
			'token' => $this->generateToken(),
			]);
		return $this;
    }

    public function twowaytoken(){
    	if($this->twowayverification != null){
			return $this->twowayverification->token;
		}else{
			 $this->storeTWToken();
			 return $this->twowayverification->token;
		}
    }

    public function TwoWayTokenIsValidated(){
    	if($this->twowayverification != null){
			return $this->twowayverification->validated;
		}else{
			 $this->storeTWToken();
			 return $this->twowayverification()->first()->validated;
		}
    }

    public function validatetwowayToken(){
    	$this->twowayverification->validated = 1;
		if($this->twowayverification->save())
			return true;
    }
    
    public function isValidated(){
		return $this->emailmagictoken->validated;
	}

    public function sendToken($token){
    	$request = sitefunc()->curl()->getWithData(api('sms_site'), [
			'username' => api('sms_username'),
			'password' => api('sms_password'),
			'sender'   => api('sender'),
			'mobiles'  => $this->formatPhone(),
			'message'  => message('pvmsg').$token,
		]);
		$returnresponse = json_decode($request,true);
		if($returnresponse['status'] == 'ok'){
			return true;
		}
    	return $this;
    }

    public function generateToken(){
		return rand(000000, 999999);
	}

	public function formatPhone(){
		return $this->country_code->code.$this->phone_number;
	}

	public function userPhoneToken(){
		if($this->phonemagictoken != null){
			return $this->phonemagictoken->phone_token;
		}else{
			 $this->storeToken();
			 return $this->phonemagictoken()->first()->phone_token;
		}
		
	}

	public function storeToken(){
		$this->phonemagictoken()->delete();
		$this->phonemagictoken()->create([
			'phone_token' => $this->generateToken(),
			]);
		return $this;
	}

	public function validatePhoneToken(){
		$this->phonemagictoken->validated = 1;
		if($this->phonemagictoken->save())
			return true;
	}

	public function phoneIsValidated(){
		if($this->phonemagictoken != null){
			return $this->phonemagictoken->validated;
		}else{
			 $this->storeToken();
			 return $this->phonemagictoken()->first()->validated;
		}
	}

	public function createEmailToken(){
		$this->emailmagictoken()->delete();
		$this->emailmagictoken()->create([
			'email_token' => str_random(266),
		]);
		return $this;
	}

	public function sendEmailToken(){
		$this->notify(new EmailVerificationToken($this));
		return true;
	}

	public function setAccount($btc){
		$this->account_details()->create([
			'account_address' => $btc,
			'currency_id' 	  => 1, 
		]);
		return $this;
	}

	public function getUSDAccount(){
		$account = 'USD'.$this->generateToken();
		return $account;
	}

	public function validateEmail(){
		$this->emailmagictoken->validated = 1;
		$this->emailmagictoken->save();
		return true;
	}

	public function nextstage(){
		if($this->stage == 'notice'){
			$this->stage = 'how-it-work';
			$this->save();
		}else{
			$this->stage = 'normal';
			$this->save();
		}
	}
}