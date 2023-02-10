<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodsCategoryBusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_category_bus', function (Blueprint $table) {
            $table->bigIncrements('id_goods_category_bus');  
            $table->string('category'); 
            $table->string('name'); 
            $table->string('pickup'); 
            $table->string('dropoff'); 
            $table->string('price'); 
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
        Schema::dropIfExists('goods_category_bus');
    }
}
