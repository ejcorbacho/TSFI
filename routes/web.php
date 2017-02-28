<?php

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


Route::get('/', 'home@index');

Auth::routes();

Route::get('/administracio', 'HomeController@index');

Route::get('/nuevaEntrada', 'nuevaEntrada@index');

Route::get('/nuevaEntrada', array('uses' => 'EntradasController@makeEntrada')); //Mostrar formulario
Route::post('/crearEntrada', array('uses' => 'EntradasController@crearEntrada'));  //Guardar entrada
Route::get('/listarEntradas', array('uses' => 'EntradasController@listarEntradas'));  //Mostrar los datos
