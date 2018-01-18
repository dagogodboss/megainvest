<?php

namespace App\Http\Controllers\Auth;

use App\Site\CountryCode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Authenticator\AuthTrait\AuthTrait;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{


    use AuthenticatesUsers, AuthTrait;


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function redirectToProvider($services){
        return Socialite::driver($services)->redirect();
    }

    protected function handleProviderCallback($services){
        $user = ($services == 'twitter') ? 
                    Socialite::driver($services)->user() : 
                        Socialite::driver($services)->stateless()->user();
            return $this->check_user_details($user);
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
                $auth_user->createEmailToken()->setAccount($request->bitcoin_address)->sendEmailToken()):
                if($request->ajax())
                    return response()->json(['success' => message('register_done')]);
                else
                    return redirect('site-notice')->with('success', message('register_done'));
            endif;
        }
    }

}
