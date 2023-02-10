<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            
            $table->index('status_user');
            $table->string('status_user')->default("aktif");

            $table->string('is_user_superadmin')->default("0");
            
            $table->index('id_kode_kota');
            $table->string('id_kode_kota')->nullable(true); 

            $table->index('jenis_user');
            $table->string('jenis_user')->nullable(true); 
            
            $table->rememberToken();
            $table->string('api_token')->nullable(true);
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
        Schema::dropIfExists('users');
    }
}
