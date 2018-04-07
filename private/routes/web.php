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


// Route para redireccionar al usuario si no tiene sesión
Route::get('login', 'Auth\LoginController@index')
      ->name('login');

Route::post('login/validar', 'Auth\LoginController@validar');
Route::get('salir', 'Auth\LoginController@salir');


// Panel
Route::get("panel", "PanelController@index")
->name("panel");

// Módulo catálogos
Route::get("catalogos", "CatalogoController@index")
      ->name("catalogo");
Route::post("catalogo.read", "CatalogoController@read")
      ->name("catalogo.read");
Route::get('catalogo/create', 'CatalogoController@create')
      ->name('catalogo.create');
Route::get('catalogo/update/{idcatalogo}', 'CatalogoController@update')
      ->where(['idcatalogo' => '[0-9]+'])
      ->name("catalogo.update");
Route::post('catalogo/save', 'CatalogoController@save')
      ->name('catalogo.save');
Route::get('catalogo/delete/{idcatalogo}', 'CatalogoController@delete')
      ->where(['idcatalogo' => '[0-9]+'])
      ->name("catalogo.update");


Route::get("productos", "ProductoController@index")
      ->name("producto");
Route::post("producto.read", "ProductoController@read")
      ->name("producto.read");
Route::get('producto/create', 'ProductoController@create')
      ->name('producto.create');













/*
Route::match(['get', 'post'],'/catalogo/update', 'CatalogoController@update')
->name("catalogo.update");
*/

// Route::get('user', 'UserController@index');
// Route::get('user/create', 'UserController@create');
// Route::post('usuario/update', 'UserController@update');

// Route::get('catalogo/update/{idcatalogo}', function ($idcatalogo) {
//     return "idcatalogo: ".$idcatalogo;
// })->name("catalogo.update");


/*
Route::post('catalogo/update', 'CatalogoController@update')
->name("catalogo.update");
*/
