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

Route::get('/category', 'home@category');

Route::get('/post', 'home@post');

Auth::routes();

Route::get('/administracio', 'HomeController@index');

Auth::routes();

Route::get('/nuevoUsuario', 'nuevoUsuarioController@index');
