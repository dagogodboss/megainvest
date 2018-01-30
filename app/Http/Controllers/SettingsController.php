<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
   protected $user = [];
    public function __construct()
    {
            $this->middleware('auth');
    }

    public function index()
    {
        return view('dashboard')->with([
            'user' => LogUser(),
        ]);
    }
}
