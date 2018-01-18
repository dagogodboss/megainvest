<?php

namespace App\Http\Controllers;

class ProfileController extends Controller
{

    protected $user_details;

    public function __construct()
    {
      $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return [
            'user_details' => LogUser()->getUserProfile(),
        ];
        return view('dashboard');
    }
}
