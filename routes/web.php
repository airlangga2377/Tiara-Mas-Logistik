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

    // PRINT MANIFEST
    Route::get('/barang/manifest/print', 'CargoManifestController@storeManifestNote'); 

    Route::post('/barang/manifest/get', 'CargoManifestController@getManifest'); 
    Route::post('/barang/manifest/tracking', 'CargoManifestController@getManifestTracking'); 
    
    Route::post('/barang/manifest/berangkat', 'CargoManifestController@updateBerangkat');  
    Route::post('/barang/manifest/sampai', 'CargoManifestController@updateSampai');  

    // BARANG TRUK CRUD 
    Route::get('/barang/truk/print', function (){return abort(404);});  

    // BARANG READ
    Route::get('/barang/truk/print/deliverynote', 'CargoPengirimanController@storeTrukDeliveryNote');
    Route::get('/barang/bus/print/resi', 'CargoPengirimanController@storeBusResiNote');
    Route::get('/barang/bus/print/barang', 'CargoPengirimanController@storeBusBarangNote');

    // BARANG INSERT
    Route::get('/barang/truk', function (){return abort(404);});  
    Route::get('/barang/bus', function (){return abort(404);});  
    Route::get('/barang/truk/insert', 'CargoPengirimanController@pageTruck');
    Route::post('/barang/truk/insert', 'CargoPengirimanController@storeTruk');
    Route::get('/barang/bus/insert', 'CargoPengirimanController@pageBus');
    Route::post('/barang/bus/insert', 'CargoPengirimanController@storeBus');

    // BARANG UPDATE
    Route::post('/barang/update', function ()
    { 
        return abort(404);
    });  
    Route::get('/barang/update/diterima', 'CargoPengirimanController@updateDiterima');  
    Route::get('/barang/update/lunas', 'CargoPengirimanController@updateLunas');  

    // BARANG DELETE
    Route::get('/barang/delete', 'CargoPengirimanController@destroyDetail');

    Route::post('/barang/tracking', 'CargoPengirimanController@getResiTracking');

    // RESI BUS
    Route::get('/barang/bus', function (){return abort(404);});  

    // KATEGORI BUS
    Route::get('/barang/bus/category', 'Bus\CargoPengirimanBusController@index');
    Route::post('/save-goodscategorybus', 'Bus\CargoPengirimanBusController@categorygoods');

    // WILAYAH BERDASARKAN KODE
    Route::get('/barang/bus/wilayah', 'Bus\WilayahBusController@page');
    Route::post('/save-busarea', 'WilayahBusController@add_wilayah');
    // Route::get('/barang/bus/print/resi', 'CargoPengirimanController@DeliveryNote');

    // MANIFEST BUS 
    Route::post('/barang/manifest-bus/create', 'Bus\ManifestBusController@createManifest');  
    Route::post('/barang/manifest-bus/get', 'Bus\ManifestBusController@getManifest'); 
    Route::get('/barang/manifest-bus/print', 'Bus\ManifestBusController@storeCetakManifestBus');  
});