<?php

namespace App\Http\Controllers\User\Trade;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TradeController extends Controller
{
    protected function index(Request $request){
    	return view('users.trade.index')->with([
    		'request' => $request,
    	]);
    } 
}
