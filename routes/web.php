<?php

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
use Illuminate\Support\Facades\Route;  

Route::get('/', function () { 
    return view('page.guest.tracking');
    // return phpinfo();
});

Route::get('/login', function () { 
    return view('auth.login');
});

Route::post('/login', 'Auth\AuthController@login');

Route::get('/logout', 'Auth\AuthController@logout');

Route::group(['middleware' => 'userAuthenticated'], function ()
{      
    Route::get('/profile', 'CargoBarangController@index');

    Route::get('/home', 'HomeController@page');

    Route::get('/barang', 'CargoBarangController@page');
    
    Route::get('/barang/truk/insert', 'CargoPengirimanTrukController@page');
    Route::get('/barang/bus/insert', 'Bus\CargoPengirimanBusController@page');

    // BARANG CRUD 
    Route::post('/barang/truk/insert', 'CargoPengirimanTrukController@storeTruk');
    Route::get('/barang/truk/print', function (){return abort(404);});  
    Route::get('/barang/truk/print/deliverynote', 'CargoPengirimanTrukController@storeTrukDeliveryNote');
    Route::get('/barang/truk/print/manifest', 'CargoPengirimanTrukController@storeTrukManifest');

    // BARANG UPDATE
    Route::post('/barang/update', function ()
    { 
        return abort(404);
    });  
    Route::get('/barang/truk/update/diterima', 'CargoPengirimanTrukController@updateDiterima');  
    Route::get('/barang/truk/update/lunas', 'CargoPengirimanTrukController@updateLunas');  
    // BARANG DELETE
    Route::get('/barang/truk/delete', 'CargoPengirimanTrukController@destroy');   
});