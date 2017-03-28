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

Route::get('/category/{id}', ['uses' =>'feController@category']);

Route::get('/post', 'feController@post');

Route::get('/post/{id}', ['uses' =>'feController@post']);

Auth::routes();

Route::get('/administracio', 'HomeController@index');
//Categories:
Route::get('administracio/categoria/editar', 'beCategoriesController@editarCategoria');
Route::get('administracio/categoria/nova', 'beCategoriesController@novaCategoria');
Route::get('administracio/categoria/llistat', 'beCategoriesController@taulaCaregories');
Route::get('administracio/categoria/editar/{id}', array('uses' => 'beCategoriesController@editarCategoria')); //Mostrar formulario
Route::get('ajax/categories/guardarCategoria', 'beCategoriesController@guardarNovaCategoria');
Route::post('ajax/categories/actualitzarCategoria', 'beCategoriesController@actualitzarCategoria');
Route::post('ajax/categories/eliminarCategoria', 'beCategoriesController@eliminarCategoria');
Route::post('ajax/categories/dadesTaulaCaregories', 'beCategoriesController@dadesTaulaCaregories');
Route::post('ajax/categories/llistarPostsDeCategoria', 'beCategoriesController@MostarPostsDeCategoria');
Route::post('ajax/categories/llistarCategoriaPerTransferencia', 'beCategoriesController@llistarCategoriaPerTransferencia');
Route::post('ajax/categories/transferirCategoria', 'beCategoriesController@transferirCategoria');


Route::get('administracio/entrada/nova/', array('uses' => 'EntradasController@makeEntrada')); //Mostrar formulario
Route::get('administracio/entrada/nova/{id}', array('uses' => 'EntradasController@editarEntrada')); //Mostrar formulario
Route::get('administracio/entrada/llistat', array('uses' => 'EntradasController@llistarEntradas')); //Mostrar listado de entradas

//Dades analytics
Route::get('ajax/analytics/getNewUsersData', array('uses' => 'HomeController@getNewUsersData'));                        //Dades sobre nous usuaris
Route::get('ajax/analytics/getDeviceCategoriesData', array('uses' => 'HomeController@getDeviceCategoriesData'));        //Dades sobre dispositius
Route::get('ajax/analytics/getMobileOSData', array('uses' => 'HomeController@getMobileOSData'));                        //Dades sobre sistema operatiu dels mòbils
Route::get('ajax/analytics/getGenderData', array('uses' => 'HomeController@getGenderData'));                            //Dades sobre l'edat dels usuaris
Route::get('ajax/analytics/getAgeBracketData', array('uses' => 'HomeController@getAgeBracketData'));                    //Dades sobre el gènere dels usuaris

//Uploads
Route::post('administracio/uploadFile', array('uses' => 'beImageController@uploadFile'));

//******* RUTAS AJAX ***********/
Route::get('ajax/categories/llistaCategories', array('uses' => 'beCategoriesController@llistarCategoria')); //Mostrar formulario
Route::post('ajax/categories/guardarCategoria', array('uses' => 'beCategoriesController@novaCategoria')); //Mostrar formulario
Route::post('ajax/entradas/guardarEntrada', array('uses' => 'EntradasController@crearEntrada'));  //Guardar entrada


/***** entitats *****/

Route::get('administracio/entitats/nova', 'beEntitatsController@NovaEntitat');
Route::get('ajax/entitat/guardarEntitat', array('uses' => 'beEntitatsController@guardarNovaEntitat'));
Route::get('ajax/entitat/llistatEntitats', array('uses' => 'beEntitatsController@llistarEnitats'));
Route::get('ajax/entitat/TresEntitats', array('uses' => 'feController@TresEnitats'));
/***entitats footer ***/
Route::get('ajax/entitat/EntitatsFooter', array('uses' => 'feController@FooterEntitats'));

/***home****/

Route::get('ajax/entitat/FotosEntrades', array('uses' => 'feController@FotosEntitats'));
