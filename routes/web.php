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

Route::get('/', 'HomeController@pageGuest'); 

Route::post('/', 'HomeController@pageTrackingGuest'); 

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
    
    Route::get('/barang/truk', function (){return abort(404);});  

    // MANIFEST TRUK CRUD 
    Route::get('/barang/manifest', 'CargoManifestController@page');  
    Route::get('/barang/manifest/create', 'CargoManifestController@pageCreateManifest');  
    Route::post('/barang/manifest/create', 'CargoManifestController@createManifest');  
    Route::get('/barang/manifest/print', 'CargoManifestController@storeTrukManifestNote'); 
    Route::post('/barang/manifest/get', 'CargoManifestController@getManifest'); 
    Route::post('/barang/manifest/tracking', 'CargoManifestController@getManifestTracking'); 
    
    Route::get('/barang/manifest/berangkat', 'CargoManifestController@updateBerangkat');  
    Route::post('/barang/manifest/berangkat', 'CargoManifestController@updateBerangkat');  
    
    Route::get('/barang/manifest/sampai', 'CargoManifestController@updateSampai');  

    // BARANG TRUK CRUD 
    Route::get('/barang/truk/print', function (){return abort(404);});  

    // BARANG READ
    Route::get('/barang/truk/print/deliverynote', 'CargoPengirimanTrukController@storeTrukDeliveryNote');

    // BARANG INSERT
    Route::get('/barang/truk/insert', 'CargoPengirimanTrukController@page');
    Route::post('/barang/truk/insert', 'CargoPengirimanTrukController@storeTruk');
    // BARANG UPDATE
    Route::post('/barang/update', function ()
    { 
        return abort(404);
    });  
    Route::get('/barang/truk/update/diterima', 'CargoPengirimanTrukController@updateDiterima');  
    Route::get('/barang/truk/update/lunas', 'CargoPengirimanTrukController@updateLunas');  
    // BARANG DELETE
    Route::get('/barang/truk/delete', 'CargoPengirimanTrukController@destroy');

    Route::post('/barang/tracking', 'CargoPengirimanTrukController@getResiTracking');
    // PENGIRIMAN BUS    
    Route::get('/barang/bus/insert', 'Bus\CargoPengirimanBusController@page');
    Route::post('/barang/bus/insert-save', 'Bus\CargoPengirimanBusController@pagecreate');

    // RESI BUS
    Route::get('/barang/bus/print/resi', 'Bus\CargoPengirimanBusController@storeBusResi');
    Route::get('/barang/bus/print/barang', 'Bus\CargoPengirimanBusController@storeBusBarang');
    Route::get('/barang/bus', function (){return abort(404);});  

    // KATEGORI BUS
    Route::get('/barang/bus/category', 'Bus\CargoPengirimanBusController@index');
    Route::post('/save-goodscategorybus', 'Bus\CargoPengirimanBusController@categorygoods');

    // WILAYAH BERDASARKAN KODE
    Route::get('/barang/bus/wilayah', 'Bus\WilayahBusController@page');
    Route::post('/save-busarea', 'WilayahBusController@add_wilayah');
    // Route::get('/barang/bus/print/resi', 'CargoPengirimanTrukController@DeliveryNote');

    // MANIFEST BUS
    Route::get('/barang/manifest/bus/create', 'Bus\ManifestBusController@pageCreateManifest');  
    Route::post('/barang/manifest-bus/create', 'Bus\ManifestBusController@createManifest');  
    Route::post('/barang/manifest-bus/get', 'Bus\ManifestBusController@getManifest'); 
    Route::get('/barang/manifest-bus/print', 'Bus\ManifestBusController@storeCetakManifestBus');  
});