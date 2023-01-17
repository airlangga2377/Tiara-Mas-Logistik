<?php

namespace App\Http\Controllers;

use App\Models\Cargo\KodeKota;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KodeKotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        KodeKota::create([
            'kota' => "surabaya",
            'kode_kota' => "sby",
            'wilayah' => "sulung",
            'kode_wilayah' => "slg",
        ]); 
        KodeKota::create([
            'kota' => "sumbawa",
            'kode_kota' => "sbw",
            'wilayah' => "sulung",
            'kode_wilayah' => "slg",
        ]); 
        return response(['message' => 'Kode Kota telah dibuat']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KodeKota  $kodeKota
     * @return \Illuminate\Http\Response
     */
    public function show(KodeKota $kodeKota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KodeKota  $kodeKota
     * @return \Illuminate\Http\Response
     */
    public function edit(KodeKota $kodeKota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KodeKota  $kodeKota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KodeKota $kodeKota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KodeKota  $kodeKota
     * @return \Illuminate\Http\Response
     */
    public function destroy(KodeKota $kodeKota)
    {
        //
    }
}
