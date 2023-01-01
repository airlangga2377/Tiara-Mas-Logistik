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
<<<<<<< HEAD
    return view('page.guest.tracking'); 
=======
    return view('page.guest.tracking');
    // return phpinfo();
>>>>>>> 96ef6381689b581a74f833bdac31cacd28e36f24
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
    
<<<<<<< HEAD
    Route::get('/barang/truk', function (){return abort(404);});  

    // MANIFEST TRUK CRUD 
    Route::get('/barang/manifest', 'CargoManifestController@page');  
    Route::get('/barang/manifest/update', 'CargoManifestController@pageCreateManifest');  
    Route::post('/barang/manifest/update', 'CargoManifestController@updateManifest');  
    Route::get('/barang/manifest/print', 'CargoManifestController@storeTrukManifestNote');

    // BARANG TRUK CRUD 
    Route::get('/barang/truk/print', function (){return abort(404);});  

    // BARANG READ
    Route::get('/barang/truk/print/deliverynote', 'CargoPengirimanTrukController@storeTrukDeliveryNote');

    // BARANG INSERT
    Route::get('/barang/truk/insert', 'CargoPengirimanTrukController@page');
    Route::post('/barang/truk/insert', 'CargoPengirimanTrukController@storeTruk');
=======
    Route::get('/barang/truk/insert', 'CargoPengirimanTrukController@page');
    Route::get('/barang/bus/insert', 'Bus\CargoPengirimanBusController@page');

    // BARANG CRUD 
    Route::post('/barang/truk/insert', 'CargoPengirimanTrukController@storeTruk');
    Route::get('/barang/truk/print', function (){return abort(404);});  
    Route::get('/barang/truk/print/deliverynote', 'CargoPengirimanTrukController@storeTrukDeliveryNote');
    Route::get('/barang/truk/print/manifest', 'CargoPengirimanTrukController@storeTrukManifest');

>>>>>>> 96ef6381689b581a74f833bdac31cacd28e36f24
    // BARANG UPDATE
    Route::post('/barang/update', function ()
    { 
        return abort(404);
    });  
    Route::get('/barang/truk/update/diterima', 'CargoPengirimanTrukController@updateDiterima');  
    Route::get('/barang/truk/update/lunas', 'CargoPengirimanTrukController@updateLunas');  
    // BARANG DELETE
    Route::get('/barang/truk/delete', 'CargoPengirimanTrukController@destroy');   
<<<<<<< HEAD

    //Pengiriman Bus    
    Route::get('/barang/bus/insert', 'Bus\CargoPengirimanBusController@page');
    Route::post('/barang/bus/insert-save', 'Bus\CargoPengirimanBusController@pagecreate');
    // Route::get('/barang', 'Bus\CargoPengirimanBusController@barang');


    // Kategori Bus
    Route::get('/barang/bus/category', 'Bus\CargoPengirimanBusController@index');
    Route::post('/save-goodscategorybus', 'Bus\CargoPengirimanBusController@categorygoods');

    // Wilayah Berdasarkan Kode
    Route::get('/barang/bus/wilayah', 'Bus\WilayahBusController@index');
    Route::post('/save-busarea', 'Bus\WilayahBusController@add_wilayah');
    // Route::get('wilayahKota', [WilayahBusController::class, 'regencies'])->name('regencies.index');
=======
>>>>>>> 96ef6381689b581a74f833bdac31cacd28e36f24
});