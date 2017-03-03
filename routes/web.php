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


Route::get('/', 'feController@index');

Route::get('/home', 'HomeController@index');

Route::get('/category', 'feController@category');

Route::get('/post', 'feController@post');

Route::get('/post/{id}', ['uses' =>'feController@post']);

Auth::routes();

Route::get('/administracio', 'HomeController@index');

Route::get('administracio/categoria/editar', 'beCategoriesController@editarCategoria');
Route::get('administracio/categoria/nova', 'beCategoriesController@novaCategoria');

Route::get('administracio/entradas/nuevaEntrada', array('uses' => 'EntradasController@makeEntrada')); //Mostrar formulario
Route::post('administracio/entradas/crearEntrada', array('uses' => 'EntradasController@crearEntrada'));  //Guardar entrada
Route::get('administracio/entradas/listarEntradas', array('uses' => 'EntradasController@listarEntradas'));  //Mostrar los datos
