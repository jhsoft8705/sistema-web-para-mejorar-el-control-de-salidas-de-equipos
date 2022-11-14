<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetalleSalidas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_salidas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('salida_id')->references('id')->on('salidas');
            $table->foreignId('equipo_id')->references('id')->on('equipos'); 
            $table->string('nombre');
            $table->string('estado')->nullable();
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
        Schema::dropIfExists('detalle_salidas');

    }
}
