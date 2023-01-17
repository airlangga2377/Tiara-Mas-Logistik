<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKodeKotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kode_kotas', function (Blueprint $table) {
            $table->bigIncrements('id_kode_kota');

            $table->string('kota'); 

            $table->index('kode_kota');
            $table->string('kode_kota');
            
            $table->string('wilayah');

            $table->index('kode_wilayah');
            $table->string('kode_wilayah');
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
        Schema::dropIfExists('kode_kotas');
    }
}
