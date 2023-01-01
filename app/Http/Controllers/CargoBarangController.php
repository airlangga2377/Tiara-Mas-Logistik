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
<<<<<<< HEAD
=======
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
>>>>>>> 96ef6381689b581a74f833bdac31cacd28e36f24
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
<<<<<<< HEAD
        $cargoArray = $request->user->pengirimanBarangs();
=======
        $cargoArray = $request->user->allCargoPengirimanBarang();
>>>>>>> 96ef6381689b581a74f833bdac31cacd28e36f24
        
        $data = array(
            'name' => $request->user->name,

            'allCargo' => $cargoArray
        ); 
        return view('page.admin.CargoBarang', [], $data);
    }
}
