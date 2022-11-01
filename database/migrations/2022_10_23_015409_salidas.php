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
       // $table->engine="InnoDB";
           /* $table->id();
            $table->foreignId('equipo_id')->references('id')->on('equipos');

            //$table->integer('site_id')->unsigned();
            $table->string('codigo');
            $table->string('alias');
            $table->string('descripcion');
            $table->string('serie');
            $table->string('condicion');//pendiente cambio x site
            $table->string('unidad_medida');
            $table->integer('cantidad');
            $table->string('estado');
            $table->timestamps();

            //$table->foreign('site_id')->references('id_site')->on('sites')->nullable();*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
