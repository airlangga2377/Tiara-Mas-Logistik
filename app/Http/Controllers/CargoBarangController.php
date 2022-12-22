<?php

namespace App\Http\Controllers;

use App\Models\Cargo\CargoPengirimanBarang;
use App\Http\Controllers\Controller;
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
        //
        // $cargoArray = CargoPengirimanBarang::
        //     selectRaw(
        //         'no_resi, 

        //         nama_pengirim, 
        //         nama_penerima, 
        //         jenis_barang, 
        //         jumlah_barang,

        //         keterangan,
        //         DATE(created_at) as created',
        //     )
        //     ->get()
        //     ;
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
        $cargoArray = $request->user->allCargoPengirimanBarang();
        
        $data = array(
            'name' => $request->user->name,

            'allCargo' => $cargoArray
        ); 
        return view('page.admin.CargoBarang', [], $data);
    }
}
