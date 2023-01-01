<?php

namespace App\Http\Controllers;

use App\Models\Cargo\truck;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TruckController extends Controller
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
        //
        truck::create([
            'no_pol' => "EA",
            'sopir_utama' => "bambang",
        ]); 
        truck::create([
            'no_pol' => "EA",
            'sopir_utama' => "risa",
        ]); 
        return response(['message' => 'Truck telah dibuat']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function show(truck $truck)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function edit(truck $truck)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, truck $truck)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function destroy(truck $truck)
    {
        //
    }
}
