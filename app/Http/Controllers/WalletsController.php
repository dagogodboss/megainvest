<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User\Traits\WalletTrait;

class WalletsController extends Controller
{
    use WalletTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('dashboard')->with([
            'user_wallets' => LogUser()->getUserWalletDetails(),
        ]);
    }
}
