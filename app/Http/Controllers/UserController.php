<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->isAuth();
//        return view('dashboard');
    }

    protected $user = [
        "id" => "70",
        "name" => "Lucky John",
        "stage" => "how-it-work",
        "created_at" => "2017-12-23",
        "phone_number" => "8035571510",
        "country" => [
            "code" => "234"
        ],
        "btc_account" => [
            "address" => "btc-address-here",
            "balance" => "btc-balance-here"
        ],
        "usd_account" => [
            "address" => "usd-address-here",
            "balance" => "usd-balance-here"
        ],
        "btc_wallets" => [
            "qr_code" => "01236456789",
        ],
        "usd_wallets" => [
            "qr_code" => "9874563210",
        ],
    ];

    public function isAuth()
    {
        return  [
            "auth" =>"true"
        ];
    }


    public function userData()
    {
        return [
            "user" => $this->user,
        ];
    }
}
