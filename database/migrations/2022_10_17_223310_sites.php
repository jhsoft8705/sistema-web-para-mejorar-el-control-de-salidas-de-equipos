<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Sites extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
          //$table->increments('id_site');
            $table->engine="InnoDB";
            $table->id();
            $table->string('nombre');
            $table->string('codigo');
            $table->string('direccion');
            $table->string('region');
            $table->string('oym');
            $table->string('estado');
            $table->timestamps();
        });
        DB::connection('mysql')->table('sites')->insert([
            [
                'id' =>1,
                 'nombre' => 'Minas',
                'codigo' => 'TC-4520',
                'direccion' => 'Cajamarca-peru',
                'region' => 'Cajamarca',
                'oym' => 'Oym Cajamarca',
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
        Schema::dropIfExists('sites');

    }
}
