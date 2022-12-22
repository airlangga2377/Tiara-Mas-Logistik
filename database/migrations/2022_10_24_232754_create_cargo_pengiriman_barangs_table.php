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

            $table->index('no_resi');
            $table->string('no_resi'); 

            $table->string('nama_pengirim');
            $table->string('nomor_pengirim');
            $table->string('nama_penerima');
            $table->string('nomor_penerima');

            $table->string('jenis_barang');
            $table->string('jumlah_barang');
            $table->string('keterangan')->nullable(true);
            $table->string('sopir')->nullable(true);
            $table->string('kernet')->nullable(true);

            $table->string('biaya')->nullable(true);
            $table->string('is_lunas')->nullable(true);
            $table->string('is_diterima')->nullable(true);

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
        Schema::dropIfExists('cargo_pengiriman_barangs');
    }
}
