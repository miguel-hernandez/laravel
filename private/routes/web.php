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

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/', 'Auth\LoginController@index');

Route::get('login', 'Auth\LoginController@index');
Route::post('login/validar', 'Auth\LoginController@validar');
Route::get('login/salir', 'Auth\LoginController@salir');

Route::get('user', 'UserController@index');
Route::get('user/create', 'UserController@create');

Route::post('usuario/update', 'UserController@update');
