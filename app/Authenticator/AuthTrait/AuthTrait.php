<?php

namespace App\Authenticator\AuthTrait;

use Illuminate\Support\Facades\Auth;

trait AuthTrait{

	protected $required = [
		'name', 'email', 'phone_number', 
	];

	public function findUser($email, $uuid){
		return model()->user()->where('email', $email)->orWhere('social_uuid', $uuid)->first();
	}

	public function check_user_details($user){
		$auth_user = $this->findUser($user->getEmail(), $user->getId());
		if($auth_user != null):
			return $this->missing_data($auth_user);
		else:
			return $this->register_user($user);
		endif;
	}

	public function LoginUser($user){
		 Auth::login($user);
		 return true;
	}

	public function register_user($user){
		$auth_user = model()->user()->create([
			'stage' => 'notice',
			'name' => $user->getName(),
            'email' => $user->getEmail(),
            'social_uuid' => $user->getId(),
            'social_avatar' => $user->avatar_original,
		]);
		return $this->missing_data($auth_user);
	}

	public function missing_data($user){
		foreach($this->required as $required_data):
			if($user->$required_data == null):
                return redirect('/user/'.$user->hashId());
			endif;
		endforeach;
		return $this->check_user_auth_option($user);
	}

	public function check_user_auth_option($user){
		if($user->hasTwoWayAuth()){
			$user->two_way_verification();
			return redirect('authenticate/'.hashThis($user->id))->with('user', $user->id);
		}else{
			$this->LoginUser($user);
			return redirect('home')->with('success', 'Done');
		}
	}
}