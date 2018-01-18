<?php
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/wallet_details', 'WalletsController@index');

//Route::middleware(['web', /*'auth'*/])->group(function () { 

//    Auth::routes();
//
//    Route::get('/', 'IndexController@index')->name('index');
//
//    Route::middleware(['auth'])->group(function (){
//	    Route::get('/home', 'HomeController@index')->name('home');
//	});
//
//    Route::group(['namespace' => 'Auth'], function(){
//	    // Controllers Within The "App\Http\Controllers\Auth" Namespace
//	});

//});

// Route::middleware(['web', /*'auth'*/])->group(function () {

// 	Route::prefix('lending')->group(function () {
//     	Route::get('/', 'LendingController@index')->name('lending');
// 	});

// 	Route::prefix('dashboard')->group(function () {
//     	Route::get('/', 'DashboardController@index')->name('dashboard');
// 	});

// 	Route::prefix('transfer')->group(function () {
//     	Route::get('/', 'TransferController@index')->name('transfer');
//     	Route::post('/', 'TransferController@processDepositRequest');
// 	});

// 	Route::prefix('exchange')->group(function () {
//     	Route::get('/', 'ExchangeController@index')->name('exchange');
// 	});

// 	Route::prefix('wallets')->group(function () {
//     	Route::get('/', 'WalletsController@index')->name('wallets');
// 	});

	Route::prefix('profile')->group(function () {
    	Route::get('/', 'ProfileController@index')->name('profile');
    	Route::get('/details', 'ProfileController@index')->name('profile-details');
	});

//     Route::prefix('settings')->group(function () {
//         Route::get('/', 'SettingsController@index')->name('settings');
//     });

//     Route::prefix('_auth')->group(function () {
// //        dd("here");
//         Route::get('/', 'UserController@isAuth')->name('auth');
//         Route::get('user', 'UserController@userData')->name('auth-user');
//     });

// });

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', 'User\Wallet\WalletController@wallet');

Auth::routes();


Route::get('send', 'Auth\LoginController@send');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('login/{services}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{services}/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('logout', 'User\UserProfile@logout')->name('logout');

/*Users Link*/

/*User Get Link*/
Route::get('/twa_active', 'User\Security@two_auth');
Route::get('/twa_deactive', 'User\Security@two_d_auth');
Route::get('removepass', 'User\Security@remove_password');
Route::get('/user/{user}', 'Auth\VerifyEmail@account_details');
Route::get('change','User\UserProfile@change_stage')->name('change');
Route::get('with_pass/{password}', 'User\Security@withdraw_password');
//Route::get('profile', 'User\UserProfile@show_profile')->name('profile');
Route::get('settings', 'User\UserProfile@show_settings')->name('settings');
Route::get('/verify-email/{token}/{user}', 'Auth\VerifyEmail@verify_email');
Route::get('wallet', 'User\Wallet\WalletController@show_wallet')->name('wallet');

/*User post Link*/
Route::post('/verify', 'Auth\VerifyEmail@verify_phone')->name('verify');
Route::post('/resend_code', 'Auth\VerifyEmail@ResendCode')->name('resend_code');
Route::post('/verify_token', 'Auth\VerifyEmail@Verify_two_fa')->name('verify_token');
Route::post('/set_account', 'Auth\VerifyEmail@set_account_details')->name('set_account');

Route::get('authenticate/{user}', function(){
    return view('users.auth.twoverify');
});

/*End User Link*/

/*Site Notice*/
Route::get('site-notice', function(){
    return view('site.notice');
});

Route::get('log/{id}', function($id){
    Auth::loginUsingId($id);
});

