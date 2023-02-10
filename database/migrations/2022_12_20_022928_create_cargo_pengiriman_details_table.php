<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargoPengirimanDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargo_pengiriman_details', function (Blueprint $table) {
            $table->bigIncrements('id_cargo_pengiriman_detail');

            $table->index('no_manifest');
            $table->string('no_manifest')->nullable(true); 

            $table->index('no_lmt');
            $table->integer('no_lmt')->nullable(true);  
            
            $table->index('no_resi');
            $table->string('no_resi')->nullable(true); 

            $table->string('nama_pengirim');
            $table->string('nomor_pengirim');
            $table->string('nama_penerima');
            $table->string('nomor_penerima');

            $table->string('sopir')->nullable(true);
            $table->string('kernet')->nullable(true);
            $table->string('no_pol')->nullable(true);

            $table->index('is_lunas');
            $table->string('is_lunas')->nullable(true);

            $table->index('is_diterima');
            $table->string('is_diterima')->nullable(true);

            $table->string('is_pengecualian')->nullable(true);
            $table->string('jenis_pengiriman')->default('truk');
            $table->string('jenis_pengirim')->nullable(true)->default('umum');
            $table->string('jenis_biaya')->default('kubikasi'); 

            $table->string('id_status_pembayaran')->nullable(true);

            $table->string('id_kode_kota_asal')->nullable(true);

            $table->string('id_kode_kota_tujuan')->nullable(true);
            
            $table->string('keterangan')->nullable(true);

            $table->string('jenis_barang_detail');

            $table->index('id_user');
            $table->string('id_user'); 
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
        Schema::dropIfExists('cargo_pengiriman_details');
    }
}
