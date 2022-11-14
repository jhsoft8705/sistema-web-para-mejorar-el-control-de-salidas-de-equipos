<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetalleEntradas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_entradas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('entrada_id')->references('id')->on('entradas');
            $table->foreignId('equipo_id')->references('id')->on('equipos');
            $table->integer('cantidad');
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
        Schema::dropIfExists('detalle_entradas');

    }
}
