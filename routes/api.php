<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/register', 'Auth\RegisterController@create'); 

Route::group(['middleware' => 'authApi'], function ()
{ 
    Route::post('/register/kodekota', 'KodeKotaController@store'); 
    Route::post('/register/distributor', 'DistributorController@store'); 
    Route::post('/register/truk', 'TruckController@store'); 
    Route::post('/register/statuspembayaran', 'StatusPembayaranController@store'); 
    Route::post('/register/messagetracking', 'MessageTrackingController@store'); 
});