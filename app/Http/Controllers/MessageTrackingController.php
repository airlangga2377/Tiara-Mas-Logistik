<?php

namespace App\Http\Controllers;

use App\Models\Cargo\MessageTracking;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessageTrackingController extends Controller
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
        MessageTracking::create([
            'pesan' => "barang menunggu dikirim",
        ]);  
        //
        MessageTracking::create([
            'pesan' => "barang sedang di perjalanan",
        ]);  
        //
        MessageTracking::create([
            'pesan' => "barang sudah di gudang tujuan",
        ]);  
        //
        MessageTracking::create([
            'pesan' => "barang sudah di terima",
        ]);  
        //
        MessageTracking::create([
            'pesan' => "barang sudah lunas di kantor surabaya",
        ]);  
        MessageTracking::create([
            'pesan' => "barang sudah lunas di tujuan",
        ]); 
        return response(['message' => 'Pesan Tracking telah dibuat']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MessageTracking  $messageTracking
     * @return \Illuminate\Http\Response
     */
    public function show(MessageTracking $messageTracking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MessageTracking  $messageTracking
     * @return \Illuminate\Http\Response
     */
    public function edit(MessageTracking $messageTracking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MessageTracking  $messageTracking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MessageTracking $messageTracking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MessageTracking  $messageTracking
     * @return \Illuminate\Http\Response
     */
    public function destroy(MessageTracking $messageTracking)
    {
        //
    }
}
