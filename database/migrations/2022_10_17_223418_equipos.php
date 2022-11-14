<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Equipos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            //$table->increments('id_equipo');
            $table->engine="InnoDB";
            $table->id();
            $table->foreignId('sitio_id')->references('id')->on('sites');
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

            //$table->foreign('site_id')->references('id_site')->on('sites')->nullable();
        });
        DB::connection('mysql')->table('equipos')->insert([
            [
                'id' =>1,
                'sitio_id' => 1,
                'codigo' => '102502',
                'alias' => 'RTN',
                'descripcion' => 'equipo-RTNA',
                'serie' => 'SN:4528',
                'condicion' => 'Operativo',
                'unidad_medida' => 'unidad',
                'cantidad' => 2,
                'estado' => 'Activo',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipos');
    }
}
