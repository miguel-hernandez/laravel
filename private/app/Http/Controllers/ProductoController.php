<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Producto;
use App\Libraries\Utilerias;
class ProductoController extends Controller
{
  public $modulo;
  private $arr_datos; // va ser object, así lo estamos retornando en el Model para el update;
  private $arr_columnas_grid;

  public function __construct(){
    $this->modulo = "Productos";
    $this->arr_columnas_grid = array(
       "idproducto"=>array("type"=>"hidden", "header"=>"id"),
       "producto"=>array("type"=>"text", "header"=>"Producto"),
       "codigo"=>array("type"=>"text", "header"=>"Código")

   );

   $this->arr_datos = array(
     "idproducto"  => 0,
     "producto"    => "",
     "codigo" => ""
   );
  }

  public function index(Request $request){
    if (!$request->session()->has(DATOSUSUARIO)) {
      return redirect()->route('login'); // Redirigimos a la ruta con el nombre "login"
    }else{
        $action = NULL;
        return view("producto.index")->with(Utilerias::get_array_panelblade($request,$this,$action));
    }
  }// index()

  public function read(Request $request){
    if (!$request->session()->has(DATOSUSUARIO)) {
      return redirect()->route('login'); // Redirigimos a la ruta con el nombre "login"
    }else{
      $nombre = $request->input('itxt_producto_nombre');

      $offset = Utilerias::get_offset($_POST, VALORES_XPAGINA);
      $num_rows = Producto::read($nombre,-1,-1);
      $result = Producto::read($nombre, $offset, VALORES_XPAGINA);
      $response = array(
        "num_rows" => $num_rows,
        "arr_datos" => $result,
        "arr_columnas" => $this->arr_columnas_grid,
        "pagina_actual" => $_SESSION[PAGINA_ACTUAL_GRID],
        "total_pags" => floor($num_rows/10)
      );
      return response()->json(["result" => $response]);
    }
  }// read()

}// class ProductoController
