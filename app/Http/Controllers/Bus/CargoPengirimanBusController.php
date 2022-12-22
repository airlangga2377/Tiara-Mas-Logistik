<?php

namespace App\Http\Controllers\Bus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CargoPengirimanBusController extends Controller
{
    /**
     * Display a page pengiriman
     *
     * @return \Illuminate\Http\Response
     */
    protected function page(Request $request)
    {
        $data = array(
            'name' => $request->user->name 
        ); 
        return view('page.admin.Bus.CargoPengirimanBus', [], $data); 
    } 
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
}
