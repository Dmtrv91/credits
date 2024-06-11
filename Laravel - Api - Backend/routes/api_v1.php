<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::group(['middleware' => ['ApiAuthorization']], function(){

    Route::get('/client/list', 'App\Http\Controllers\ClientsController@getClientList');
    Route::post('/credit/create', 'App\Http\Controllers\CreditsController@createCredit');
    Route::get('/credit/numbers', 'App\Http\Controllers\PaymentController@getCreditNumbers');
    Route::post('/credit/payment', 'App\Http\Controllers\PaymentController@creditPayment');
});