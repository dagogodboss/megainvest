<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Security extends Controller
{

    protected function two_auth(){
        LogUser()->activate_two_auth();
        return json_success();
    }

    protected function two_d_auth(){
        LogUser()->deactivate_two_auth();
        return json_success();
    }

    protected function withdraw_password(Request $request){
    	if($request->password != ''){
	    	if(LogUser()->update([
	    		'password' => bcrypt($request->password)
	    	])):
	    		return json_success();
  			endif;
  		}
    }

    protected function remove_password(){
    	if(LogUser()->password != null && LogUser()->remove_user_password()){
    		return json_success();
    	}
    }

}
