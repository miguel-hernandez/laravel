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

Route::get('login', 'Auth\LoginController@index')
        ->name('login');
Route::post('login/validar', 'Auth\LoginController@validar');
Route::get('salir', 'Auth\LoginController@salir');

// Route::get('user', 'UserController@index');
// Route::get('user/create', 'UserController@create');
// Route::post('usuario/update', 'UserController@update');

Route::get("panel", "PanelController@index")
        ->name("panel");


Route::get("catalogos", "CatalogoController@index")
        ->name("catalogo");
Route::post("catalogo.read", "CatalogoController@read")
        ->name("catalogo.read");
Route::get('catalogo/create', 'CatalogoController@create')
        ->name('catalogo.create');

/*
Route::get('catalogo/update/{idcatalogo}', 'CatalogoController@update')
      ->where(['idcatalogo' => '[0-9]+'])
      ->name("catalogo.update");
      */
      Route::get('catalogo/update/{idcatalogo}', function ($idcatalogo) {
          return "idcatalogo: ".$idcatalogo;
      })->name("catalogo.update");

Route::post('catalogo/save', 'CatalogoController@save')
        ->name('catalogo.save');
