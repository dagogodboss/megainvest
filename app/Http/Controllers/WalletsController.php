<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User\Traits\WalletTrait;

class WalletsController extends Controller
{
    use WalletTrait;
    protected $wallet_details = [];

    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
         $this->wallet_details = LogUser()->getUserWalletDetails();
         return [
            'user_wallets' => $this->wallet_details,
         ];
        return view('dashboard')->with([
            'user_wallets' => $this->wallet_details,
        ]);
    }
}
