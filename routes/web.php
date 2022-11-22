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


Route::resource('/','App\Http\Controllers\SessionController')->names('rutalogin')->middleware('guest');
Route::resource('/home','App\Http\Controllers\HomeController')->names('homes')->middleware('auth');
Route::resource('sites','App\Http\Controllers\SiteController')->names('sites')->middleware('auth');
Route::resource('equipos','App\Http\Controllers\EquipoController')->names('equipos')->middleware('auth');
Route::resource('baja','App\Http\Controllers\EquipoFueraController')->names('bajas')->middleware('auth');

Route::resource('usuarios','App\Http\Controllers\UserController')->names('users')->middleware('auth');
Route::resource('salidas','App\Http\Controllers\SalidaController')->names('salidas')->middleware('auth');
Route::resource('consignados','App\Http\Controllers\ConsignadoController')->names('consignados')->middleware('auth');
Route::resource('entradas','App\Http\Controllers\EntradaController')->names('entradas')->middleware('auth');

Route::get('/close','App\Http\Controllers\SessionController@destroy')->name('close.destroy')->middleware('auth');

