<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PengirimanBusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengiriman_bus', function (Blueprint $table) {
            $table->bigIncrements('id_pengiriman_bus');  
            $table->string('resi'); 
            $table->string('nama_pengirim'); 
            $table->string('telepon_pengirim'); 
            $table->string('nama_penerima'); 
            $table->string('telepon_penerima'); 
            $table->string('asal_barang'); 
            $table->string('tujuan_barang'); 
            $table->string('jenis_barang'); 
            $table->string('nama_barang'); 
            $table->string('berat_barang'); 
            $table->string('panjang_barang'); 
            $table->string('lebar_barang'); 
            $table->string('tinggi_barang'); 
            $table->string('jumlah_barang'); 
            $table->string('harga_barang'); 
            $table->string('kode_user'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengiriman_bus');
    }
}
