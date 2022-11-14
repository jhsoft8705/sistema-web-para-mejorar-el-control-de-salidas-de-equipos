<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Entradas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entradas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('site_id')->references('id')->on('sites');

            $table->enum('status',['ACTIVO','INACTIVO'])->default('ACTIVO');
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
        Schema::dropIfExists('entradas');

    }
}
