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
        
        $cargoArray = $request->user->pengirimanBarangs($request->user->id_kode_kota);

        $data = array(
            'name' => $request->user->name,
            
            'jenisUser' => $request->user->jenis_user,

            'kodeKota' => $kodeKota,

            'allCargo' => $cargoArray
        ); 
        return view('page.admin.CargoBarang', [], $data);
    }
}
