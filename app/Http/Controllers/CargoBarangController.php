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
     * Display a page list barang
     *
     * @return \Illuminate\Http\Response
     */
    protected function page(Request $request)
    {
        $cargoArray = CargoPengirimanBarang::all(); 

        $data = array(
            'name' => $request->user->name,

            'allCargo' => $cargoArray
        ); 
        return view('page.admin.CargoBarang', [], $data);
    }
}
