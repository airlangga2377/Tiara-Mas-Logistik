<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargoPengirimanBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargo_pengiriman_barangs', function (Blueprint $table) {
            $table->bigIncrements('id_cargo_pengiriman_barangs'); 

            // $table->index('no_manifest');
            // $table->string('no_manifest')->nullable(true); 
            
            $table->index('no_resi');
            $table->string('no_resi')->nullable(true); 

            $table->index('no_lmt');
            $table->integer('no_lmt')->nullable(true);  

            // $table->string('nama_pengirim');
            // $table->string('nomor_pengirim');
            // $table->string('nama_penerima');
            // $table->string('nomor_penerima');

            $table->string('jumlah_barang');
            $table->string('code')->default('koli');
            $table->string('jenis_barang');
            // $table->string('sopir')->nullable(true);
            // $table->string('kernet')->nullable(true);
            // $table->string('no_pol')->nullable(true);

            $table->string('panjang')->nullable(true);
            $table->string('lebar')->nullable(true);
            $table->string('tinggi')->nullable(true);
            $table->string('berat')->nullable(true);

            $table->string('biaya');

            // $table->index('is_lunas');
            // $table->string('is_lunas')->nullable(true);

            // $table->index('is_diterima');
            // $table->string('is_diterima')->nullable(true);

            // $table->string('is_pengecualian')->nullable(true);
            // $table->string('jenis_pengiriman')->default('truk');
            // $table->string('jenis_pengirim')->nullable(true)->default('umum');
            // $table->string('jenis_biaya')->default('kubikasi'); 

            // $table->string('tujuan'); 

            // $table->index('id_user');
            // $table->string('id_user'); 
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
        Schema::dropIfExists('cargo_pengiriman_barangs');
    }
}
