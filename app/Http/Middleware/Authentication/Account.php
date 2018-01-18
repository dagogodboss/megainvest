<?php

namespace App\Http\Middleware\Authentication;

use Closure;

class Account
{
    public function handle($request, Closure $next)
    {
        $fillable = ['name', 'email', 'phone_number',];
        foreach($fillable as $fill_data){
            if(LogUser()->$fill_data == null){
                return redirect('user/'.LogUser()->hashId())->with('success', config('messages.fill_form'));
            }
        }
        if(!LogUser()->isValidated()){
            LogUser()->createEmailToken()->sendEmailToken();
            return redirect('site-notice')->with('verify_email', message('verify_email'));
        }
        if(!LogUser()->phoneIsValidated()){
            LogUser()->sendToken(LogUser()->userPhoneToken());
            return redirect('site-notice')->with('verify_phone', message('verify_phone'));
        }
        
        return $next($request);
    }
}
