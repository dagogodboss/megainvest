<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserProfile extends Controller
{
	public function __construct(){
        $this->middleware([/*'auth', 'account'*/]);
	}

    protected function show_profile(){
    	return view('users.profile.show_profile', [
    		'user' => LogUser()
    	]);
    }

    protected function show_settings(){
    LogUser()->nextstage();
	return view('users.profile.show_settings', [
    		'user' => LogUser()
    	]);
    }

    protected function change_stage(){
        LogUser()->nextstage();
        return json_success();
    }

    public function logout(){
        if(\Auth::logout()){
            return redirect('/')->with('success', 'Thank You very much. Please come back again');
        }
            return redirect('/')->with('success', 'Thank You very much. Please come back again');
    }
}
