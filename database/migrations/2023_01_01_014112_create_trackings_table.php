<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trackings', function (Blueprint $table) {
            $table->bigIncrements('id_tracking');

            $table->index('no_lmt');
            $table->string('no_lmt')->nullable(false);

<<<<<<< HEAD:database/migrations/2023_01_01_014112_create_trackings_table.php
            $table->string('id_message_tracking'); 
            $table->string('id_message_status_pembayaran'); 
=======
            $table->index('id_message_tracking')->nullable(false);
            $table->string('id_message_tracking')->nullable(false);
>>>>>>> a1d66252d031d8304a268ea3ce5a09ee09d6e01d:database/migrations/2023_01_01_014112_create_truck_trackings_table.php

            $table->string('id_kode_kota_tujuan')->nullable(true);

            $table->string('id_status_pembayaran');

            // name user who changed it
            $table->index('id_user');
            $table->string('id_user')->nullable(false);

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
        Schema::dropIfExists('trackings');
    }
}
