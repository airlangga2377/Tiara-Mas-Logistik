<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTruckTrackingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('truck_trackings', function (Blueprint $table) {
            $table->bigIncrements('id_truck_tracking');

            $table->index('no_lmt');
            $table->string('no_lmt')->nullable(false);

            $table->index('id_message_tracking')->nullable(false);
            $table->string('id_message_tracking')->nullable(false);

            $table->index('id_status_pembayaran')->nullable(false);
            $table->string('id_status_pembayaran')->nullable(false);

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
        Schema::dropIfExists('truck_trackings');
    }
}
