<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Catalogo;
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
       "codigo_barras"=>array("type"=>"text", "header"=>"Código"),
       "precio_provee"=>array("type"=>"text", "header"=>"$ Provedor"),
       "precio_venta"=>array("type"=>"text", "header"=>"$ Venta"),
       "inventario_actual"=>array("type"=>"text", "header"=>"Actual"),
       "inventario_minimo"=>array("type"=>"text", "header"=>"Mínimo"),
       "idcatalogo"=>array("type"=>"text", "header"=>"Catálogo")
   );

   $this->arr_datos = array(
     "idproducto"  => 0,
     "producto"    => "",
     "descripcion" => "",
     "codigo_barras" => "",
     "precio_provee" => 0,
     "precio_venta" => 0,
     "inventario_actual" => 0,
     "inventario_minimo" => 0,
     "idcatalogo" => ""
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

  public function create(Request $request){
    if (!$request->session()->has(DATOSUSUARIO)) {
      return redirect()->route('login');
    }else{
      $action = "Nuevo";
      $arr_catalogos = (object)[];
      $arr_catalogos = Catalogo::read_for_tohers();

      return view("producto.creup")->with(Utilerias::get_array_panelblade($request,$this,$action))
      ->with("datos",$this->arr_datos)
      ->with("arr_catalogos",$arr_catalogos);
    }
  }// create()

  public function save(Request $request){
    if (!$request->session()->has(DATOSUSUARIO)) {
      return redirect()->route('login');
    }else{


      echo "<pre>"; print_r($_POST);
      echo "<pre>"; print_r($_FILES);
      echo "<a href='".route("producto.create")."'>Regresar al formulario</a>";
    }
  }// save()

}// class ProductoController
