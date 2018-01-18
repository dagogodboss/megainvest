<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
   
    public function __construct()
    {
        $this->middleware([/*'auth', 'account'*/]);
    }

    public function index()
    {   
        $user = null;

        if(session('user')){
            $user = session('user');
            $request->session('user')->flush();
        }
        return view('home')->with([
            'user' => $user
        ]);
    }
}
