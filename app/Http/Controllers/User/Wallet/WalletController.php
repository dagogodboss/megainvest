<?php

namespace App\Http\Controllers\User\Wallet;

use Illuminate\Http\Request;
use App\User\Wallet\WalletWrapper;
use App\Http\Controllers\Controller;

class WalletController extends Controller
{
	public  function __construct(){
        $this->middleware(['auth', 'account']);
		//$this->wall = new WalletWrapper();
	}

	protected function show_wallet(){
		return view('users.wallet.show_wallet');
	}

    protected function wallet(){
    	dd(LogUser()->get_btc_balance());
    }
}
