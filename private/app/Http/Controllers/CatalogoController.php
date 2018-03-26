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
       "id"=>array("type"=>"hidden", "header"=>"id"),
       "catalogo"=>array("type"=>"text", "header"=>"Catálogo"),
       "descripcion"=>array("type"=>"text", "header"=>"Descripción")
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
      $nombre = "";
      $result = Catalogo::get_all($nombre);
      // echo "<pre>"; print_r($result); die();
      $response = array(
        "result" => $result,
        "columnas" => $this->arr_columnas_grid
      );
      return response()->json(["result" => $response]);
    }




  }// read()



  public function create(Request $request){
    if (!$request->session()->has(DATOSUSUARIO)) {
      return redirect()->action('Auth\LoginController@index');
    }else{
      // $usuario_session = $request->session()->get(DATOSUSUARIO);
      $action = "Nuevo";
      // return view("catalogo.ae",  compact('modulo','modulo_url', 'username', 'action'));
      return view("catalogo.ae")->with(Utilerias::get_array_panelblade($request,$this,$action));

    }
  }// create()

  public function save(Request $request){
    if (!$request->session()->has(DATOSUSUARIO)) {
      return redirect()->action('Auth\LoginController@index');
    }else{
      // echo "save"; die();
      // $usuario_session = $request->session()->get(DATOSUSUARIO);
      // $action = "Nuevo";
      // return view("catalogo.ae",  compact('modulo','modulo_url', 'username', 'action'));
      // return view("catalogo.ae")->with(Utilerias::get_array_panelblade($request,$this,$action));

    }
  }// create()

}
