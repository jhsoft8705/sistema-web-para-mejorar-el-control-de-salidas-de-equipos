<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::resource('sites','App\Http\Controllers\SiteController')->names('sites');
Route::resource('equipos','App\Http\Controllers\EquipoController')->names('equipos');
Route::resource('bajas','App\Http\Controllers\EquipofueraController')->names('bajas');
Route::resource('usuarios','App\Http\Controllers\UserController')->names('users');
Route::resource('salidas','App\Http\Controllers\SalidaController')->names('salidas');
Route::resource('consignados','App\Http\Controllers\ConsignadoController')->names('consignados');
Route::resource('entradas','App\Http\Controllers\EntradaController')->names('entradas');




