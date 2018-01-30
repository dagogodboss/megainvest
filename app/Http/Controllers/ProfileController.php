<?php

namespace App\Http\Controllers;

class ProfileController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    
    public function index()
    {
        return view('dashboard')->with([
            'user_details' => LogUser()->getUserProfile(),
        ]);
    }
}
