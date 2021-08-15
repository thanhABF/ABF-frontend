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

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('privacy', function () {
    return view('privacy');
})->name('privacy');

Route::get('terms', function () {
    return view('terms');
})->name('terms');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard_temp', function () {
    //return view('dashboard');
    return redirect()->route('panel.index');
})->name('dashboard_temp');

Route::group(['namespace' => 'App\Http\Controllers'], function () {
  Route::get('r/{link}', 'CoinPilotController@referral_detect');
  Route::get('r2', 'CoinPilotController@referral_detect2');

  Route::get('dark_mode', 'CoinPilotController@dark_mode')->name('dark_mode');
});

Route::group(['prefix' => '/admin', 'middleware' => ['auth', 'verified'], 'namespace' => 'App\Http\Controllers', 'as' => 'admin.'], function () {
  Route::get('impersonate/{id}', 'AdminController@impersonate')->name('impersonate');
  Route::get('leaveImpersonation', 'AdminController@leaveImpersonation')->name('leaveImpersonation');
});

Route::group(['prefix' => '/admin', 'middleware' => ['auth', 'verified', 'role:admin'], 'namespace' => 'App\Http\Controllers', 'as' => 'admin.'], function () {
  Route::get('index', 'AdminController@index')->name('index');
  Route::get('user/{id}', 'AdminController@user')->name('user');
  Route::get('referral', 'AdminController@referral')->name('referral');

  Route::post('topup_user_balance', 'AdminController@topup_user_balance')->name('topup_user_balance');
  Route::post('user_commission_rate', 'AdminController@user_commission_rate')->name('user_commission_rate');
});

Route::group(['prefix' => '/dashboard', 'middleware' => ['auth', 'verified'], 'namespace' => 'App\Http\Controllers', 'as' => 'dashboard.'], function () {
  Route::get('index', 'CoinPilotController@index')->name('index');
  Route::get('indext', 'CoinPilotController@indext')->name('indext');
  Route::get('positions', 'CoinPilotController@positions')->name('positions');
  Route::get('positions2', 'CoinPilotController@positions2')->name('positions2');
  Route::get('invoices', 'CoinPilotController@invoices')->name('invoices');
  Route::get('referral', 'CoinPilotController@referral')->name('referral');
  Route::get('terms', 'CoinPilotController@terms')->name('terms');
  Route::get('privacy', 'CoinPilotController@privacy')->name('privacy');

  Route::get('help_setup', 'CoinPilotController@help_setup')->name('help_setup');
  Route::get('help_faq', 'CoinPilotController@help_faq')->name('help_faq');


  Route::get('referral_link_duplicates/{link}', 'CoinPilotController@referral_link_duplicates')->name('referral_link_duplicates');
  Route::post('referral_link_save', 'CoinPilotController@referral_link_save')->name('referral_link_save');

  Route::post('transfer_referral_balance', 'CoinPilotController@transfer_referral_balance')->name('transfer_referral_balance');
  Route::post('withdrawal_referral_balance', 'CoinPilotController@withdrawal_referral_balance')->name('withdrawal_referral_balance');


  Route::get('test', 'CoinPilotController@test')->name('test');
  Route::get('test2', 'CoinPilotController@test2')->name('test2');

  Route::group(['prefix' => '/exchange', 'as' => 'exchange.'], function () {
    Route::get('connect', 'CoinPilotController@exchange_connect')->name('connect');
    Route::get('api/{id}', 'CoinPilotController@exchange_api')->name('api');

    Route::get('list', 'CoinPilotController@exchange_list')->name('list');
    Route::get('delete/{id}', 'CoinPilotController@exchange_delete')->name('delete');

    Route::post('add', 'CoinPilotController@exchange_add')->name('add');
    Route::post('edit_api', 'CoinPilotController@edit_api')->name('edit_api');
    Route::post('delete_approve', 'CoinPilotController@exchange_delete_approve')->name('delete_approve');
  });

  Route::get('CoinbaseCreatePayment', 'CoinPilotController@CoinbaseCreatePayment')->name('CoinbaseCreatePayment');

});

Route::group(['namespace' => 'App\Http\Controllers'], function () {
  Route::post('WebhookCoinbase', 'CoinbaseController@handle')->name('WebhookCoinbase');
  Route::get('WebhookCoinbaseTest', 'CoinbaseController@test')->name('WebhookCoinbaseTest');
});
