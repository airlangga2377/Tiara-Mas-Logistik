<?php

namespace App\Http\Controllers\Bus;

<<<<<<<< HEAD:app/Http/Controllers/TrackingController.php
========
use App\Models\Cargo\Bus\Bus;
>>>>>>>> a1d66252d031d8304a268ea3ce5a09ee09d6e01d:app/Http/Controllers/Bus/BusController.php
use App\Http\Controllers\Controller;
use App\Models\Cargo\Tracking;
use Illuminate\Http\Request;

<<<<<<<< HEAD:app/Http/Controllers/TrackingController.php
class TrackingController extends Controller
========
class BusController extends Controller
>>>>>>>> a1d66252d031d8304a268ea3ce5a09ee09d6e01d:app/Http/Controllers/Bus/BusController.php
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
        Bus::create([
            'no_pol' => "EA 1",
            'sopir_utama' => "bambang",
        ]); 
        Bus::create([
            'no_pol' => "EA 2",
            'sopir_utama' => "risa",
        ]); 
        return response(['message' => 'Bus telah dibuat']);
    }

    /**
     * Display the specified resource.
     *
<<<<<<<< HEAD:app/Http/Controllers/TrackingController.php
     * @param  \App\Models\Cargo\Tracking  $tracking
========
     * @param  \App\Models\Cargo\Bus\Bus  $bus
>>>>>>>> a1d66252d031d8304a268ea3ce5a09ee09d6e01d:app/Http/Controllers/Bus/BusController.php
     * @return \Illuminate\Http\Response
     */
    public function show(Tracking $tracking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
<<<<<<<< HEAD:app/Http/Controllers/TrackingController.php
     * @param  \App\Models\Cargo\Tracking  $tracking
========
     * @param  \App\Models\Cargo\Bus\Bus  $bus
>>>>>>>> a1d66252d031d8304a268ea3ce5a09ee09d6e01d:app/Http/Controllers/Bus/BusController.php
     * @return \Illuminate\Http\Response
     */
    public function edit(Tracking $tracking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
<<<<<<<< HEAD:app/Http/Controllers/TrackingController.php
     * @param  \App\Models\Cargo\Tracking  $tracking
========
     * @param  \App\Models\Cargo\Bus\Bus  $bus
>>>>>>>> a1d66252d031d8304a268ea3ce5a09ee09d6e01d:app/Http/Controllers/Bus/BusController.php
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tracking $tracking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
<<<<<<<< HEAD:app/Http/Controllers/TrackingController.php
     * @param  \App\Models\Cargo\Tracking  $tracking
========
     * @param  \App\Models\Cargo\Bus\Bus  $bus
>>>>>>>> a1d66252d031d8304a268ea3ce5a09ee09d6e01d:app/Http/Controllers/Bus/BusController.php
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tracking $tracking)
    {
        //
    }
}
