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
Route::get('administracio/categoria/nova', 'beCategoriesController@novaCategoriaForm');

Route::get('administracio/entrada/nova/', array('uses' => 'EntradasController@makeEntrada')); //Mostrar formulario
Route::get('administracio/entrada/nova/{id}', array('uses' => 'EntradasController@editarEntrada')); //Mostrar formulario
Route::get('administracio/entrada/llistat', array('uses' => 'EntradasController@llistarEntradas')); //Mostrar listado de entradas


//******* RUTAS AJAX ***********/
Route::get('ajax/categories/llistaCategories', array('uses' => 'beCategoriesController@llistarCategoria')); //Mostrar formulario
Route::post('ajax/categories/guardarCategoria', array('uses' => 'beCategoriesController@novaCategoriaPost')); //Mostrar formulario
Route::post('ajax/entradas/guardarEntrada', array('uses' => 'EntradasController@crearEntrada'));  //Guardar entrada
