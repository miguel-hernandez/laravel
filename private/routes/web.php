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
    return view('index', [
    'titulo' => 'Página principal',
    'username' => 'Visitante',
    ]
);
});


// Route::get('/', 'Auth\LoginController@index');

Route::get('login', 'Auth\LoginController@index');
Route::post('login/validar', 'Auth\LoginController@validar');
Route::get('salir', 'Auth\LoginController@salir');

// Route::get('user', 'UserController@index');
// Route::get('user/create', 'UserController@create');
// Route::post('usuario/update', 'UserController@update');

Route::get('panel', 'PanelController@index');

Route::get('catalogos', 'CatalogoController@index');
Route::post('catalogo/read', 'CatalogoController@read');
Route::get('catalogos_add', 'CatalogoController@create');
Route::post('catalogo/save', 'CatalogoController@save');
