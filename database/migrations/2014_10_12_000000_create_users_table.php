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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('estado');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        DB::connection('mysql')->table('users')->insert([
            [
                'name' => 'Jhon Alex',
                'estado' => 'activo',
                'email' => 'jhonalexvillaflores@gmail.com',
                'password' => Hash::make('12345'),
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
        Schema::dropIfExists('users');
    }
}
