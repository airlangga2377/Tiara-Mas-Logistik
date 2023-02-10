<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreaBusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_bus', function (Blueprint $table) {
            $table->bigIncrements('id_area_bus');

            $table->string('kota');
            
            $table->index('kode_kota');
            $table->string('kode_kota');
            
            $table->string('wilayah');

            $table->index('kode_wilayah');
            $table->string('kode_wilayah');

            $table->string('alamat');

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
        Schema::dropIfExists('area_bus');
    }
}
