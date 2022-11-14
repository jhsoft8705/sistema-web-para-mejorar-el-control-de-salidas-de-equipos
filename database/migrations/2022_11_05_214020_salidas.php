<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Salidas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salidas', function (Blueprint $table) {
                 $table->id();
                 $table->foreignId('consignado_id')->references('id')->on('consignados');
                 $table->string('motivo_salida');
                 $table->string('estado');
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
        Schema::dropIfExists('salidas');

    }
}
