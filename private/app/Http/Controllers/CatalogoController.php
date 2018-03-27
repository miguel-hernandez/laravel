<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Catalogo;
use App\Libraries\Utilerias;
class CatalogoController extends Controller
{
  public $modulo;
  // public $modulo_url;

  public function __construct(){
    $this->modulo = "Catálogos";
    $this->arr_columnas_grid = array(
       "idcatalogo"=>array("type"=>"hidden", "header"=>"id"),
       "catalogo"=>array("type"=>"text", "header"=>"Catálogo"),
       "descripcion"=>array("type"=>"text", "header"=>"Descripción"),
       "c2"=>array("type"=>"text", "header"=>"Descripción")

   );
  }

  public function index(Request $request){
    if (!$request->session()->has(DATOSUSUARIO)) {
      return redirect()->action('Auth\LoginController@index');
    }else{
        $action = NULL;
        return view("catalogo.index")->with(Utilerias::get_array_panelblade($request,$this,$action));
    }
  }// index()

  public function read(Request $request){
    if (!$request->session()->has(DATOSUSUARIO)) {
      return redirect()->action('Auth\LoginController@index');
    }else{
      // $nombre = $this->input->post('nombre');
      $nombre = $request->input('nombre');;
      // $offset = $request->input('offset');
      $offset = Utilerias::get_offset($_POST, VALORES_XPAGINA);
      $num_rows = Catalogo::read($nombre,-1,-1);
      // echo $arr_datos; die();
      // $num_rows = count($arr_datos);
      // echo "<pre>"; print_r($arr_datos); die();
      $result = Catalogo::read($nombre, $offset, VALORES_XPAGINA);
      // echo "<pre>"; print_r($result); die();
      $response = array(
        "num_rows" => $num_rows,
        "arr_datos" => $result,
        "arr_columnas" => $this->arr_columnas_grid,
        "pagina_actual" => $_SESSION[PAGINA_ACTUAL_GRID]
      );
      return response()->json(["result" => $response]);
    }
  }// read()



  public function create(Request $request){
    if (!$request->session()->has(DATOSUSUARIO)) {
      return redirect()->action('Auth\LoginController@index');
    }else{
      $action = "Nuevo";
      return view("catalogo.ae")->with(Utilerias::get_array_panelblade($request,$this,$action));
    }
  }// create()

  public function save(Request $request){
    if (!$request->session()->has(DATOSUSUARIO)) {
      return redirect()->action('Auth\LoginController@index');
    }else{
      $nombre = $request->input('itxt_catalogo_nombre');;
      $descripcion = $request->input('itxt_catalogo_descripcion');
      $result = Catalogo::create($nombre,$descripcion);
       // return back()->with('message', 'User created successfully.');
       // return back()->with('message', "OK!");

      return redirect()->action('CatalogoController@index');
    }
  }// create()

}
