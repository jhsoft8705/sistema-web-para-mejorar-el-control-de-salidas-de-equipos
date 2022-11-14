<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Consignados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consignados', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_documento');
            $table->string('documento');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('telefono');
            $table->string('estado');
            $table->timestamps();

           });
           DB::connection('mysql')->table('consignados')->insert([
            [
                'id' =>1,
                'tipo_documento' => 'DNI',
                'documento' => '73569079',
                'nombres' => 'Jhon Alex',
                'apellidos' => 'Villa Flores',
                'telefono' => '987338646',
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
        Schema::dropIfExists('consignados');
    }
}
