<?php

namespace App\Http\Controllers;

use App\Models\Cargo\CargoPengirimanBarang;
use App\Http\Controllers\Controller;
use App\Models\Cargo\KodeKota;
use Illuminate\Http\Request;

class CargoBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function index(Request $request)
    {
        //
        $cargoArray = CargoPengirimanBarang::all(); 
        return response($cargoArray);
    }

    /**
     * Display a listing of the resource for datatables.
     *
     * @return \Illuminate\Http\Response
     */
    protected function indexDatatables(Request $request)
    {
        $cargoArray = CargoPengirimanBarang::all(); 
        return response($cargoArray);
    }

    /**
     * Display a page list barang
     *
     * @return \Illuminate\Http\Response
     */
    protected function page(Request $request)
    {
        $kodeKota = $request->user->kodeKota(); 
<<<<<<< HEAD
        
        $cargoArray = $request->user->pengirimanBarangs($request->user->id_kode_kota);
=======
        $wilayah = $request->user->Wilayah();
        $cargoArray = $request->user->pengirimanBarangs($kodeKota->kota);
        $wilayahArray = $request->user->pengirimanBarangs($wilayah->wilayah);
>>>>>>> a1d66252d031d8304a268ea3ce5a09ee09d6e01d

        $data = array(
            'name' => $request->user->name,
            
            'jenisUser' => $request->user->jenis_user,

            'kodeKota' => $kodeKota,
            'wilayah' => $wilayah,

            'allCargo' => $cargoArray,
            'allWilayah' => $wilayahArray,
        );
        return view('page.admin.CargoBarang', [], $data);
    }
}
