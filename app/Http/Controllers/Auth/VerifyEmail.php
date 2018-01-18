<?php

namespace App\Http\Controllers\Auth;

use App\Site\CountryCode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Authenticator\AuthTrait\AuthTrait;

class VerifyEmail extends Controller
{
	 use AuthTrait;

    protected function verify_email(Request $request){
    	foreach(model()->user()->all() as $user){
    		if(hashThis($user->id) == $request->user):
    			if($user->validateEmail()):
    					if($this->LoginUser($user)):
    						$user->storeToken()->sendToken($user->userPhoneToken());
    						return redirect('site-notice')->with( 'verify_phone', message('verify_phone'));
    					endif;
    				else:
    					return redirect('site-notice')->with('error', message('wrong_token'));
                    endelse;
    			endif;
    		endif;
    	}
    }


    protected function verify_phone(Request $request){
        $this->validate($request,[
            'phone_token' => 'required|digits:6',
        ]);

        if(LogUser()->userPhoneToken() == $request->phone_token){
            if(!LogUser()->phoneIsValidated()){
                if(LogUser()->validatePhoneToken())
                    return response()->json(['success' => 'done']); 
            }
            return response()->json(['phone_token' => message('isvalidated')], 422); 
        }
        return response()->json(['error' => message('wrong_token')], 500);
    }

    protected function ResendCode(){
        if($user->storeToken()->sendToken($user->userPhoneToken())){
            return response()->json(['success' => 'Code Sent.']); 
        }
    }

    protected function account_details(Request $request, CountryCode $country){
        foreach(model()->user()->all() as $user){
            if(hashThis($user->id) == $request->user){
                return view('users.profile.account_details')->with(['user' => $user, 'country_code' => $country->all()]); 
            }
        }
           return abort('404', 'Page not Found');
    }

    protected function set_account_details(Request $request){
        $this->validate($request, [
            'country_code_id'=> 'required',
            'name'           => 'required|min:4',
            'email'          => 'required|email|unique:users,email,'.$request->expert,
            'phone_number'   => 'required|digits:11|unique:users,phone_number,'.$request->expert,
            'bitcoin_address'=> 'required|min:30|unique:account_details,account_address,'.$request->expert,   
        ]);
        $auth_user = model()->user()->find($request->expert);
        if($auth_user != null){
            if($auth_user->update($request->all()) && 
                $auth_user->createEmailToken()->setAccount($request->bitcoin_address)->setWalllet()->sendEmailToken()):
                if($request->ajax())
                    return response()->json(['success' => message('register_done')]);
                else
                    return redirect('site-notice')->with('success', message('register_done'));
            endif;
        }
    }

    public function Verify_two_fa(Request $request){
        $this->validate($request,[
            'token' => 'required|digits:6',
        ]);
        foreach(model()->user()->all() as $user){
            if(hashThis($user->id) == $request->user){
                if($user->twowaytoken() == $request->token){
                    if(!$user->TwoWayTokenIsValidated()){
                        if($user->validatetwowayToken() && $this->LoginUser($user))
                            return response()->json(['success' => 'done']); 
                    }
                    return response()->json(['phone_token' => message('isvalidated')], 422); 
                }
                return response()->json(['error' => message('wrong_token')], 500);
            }
        }
    }
}
