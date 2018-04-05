<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Catalogo;
use App\Libraries\Utilerias;
class CatalogoController extends Controller
{
  public $modulo;

  public function __construct(){
    $this->modulo = "Catálogos";
    $this->arr_columnas_grid = array(
       "idcatalogo"=>array("type"=>"hidden", "header"=>"id"),
       "catalogo"=>array("type"=>"text", "header"=>"Catálogo"),
       "descripcion"=>array("type"=>"text", "header"=>"Descripción"),
       "c2"=>array("type"=>"text", "header"=>"Descripción")

   );
   // $this->arr_datos = (object)array(
   //   "idcatalogo"  => 0,
   //   "nombre"    => "",
   //   "descripcion" => ""
   // );
   $this->arr_datos = array(
     "idcatalogo"  => 0,
     "nombre"    => "",
     "descripcion" => ""
   );
  }

  public function index(Request $request){
    if (!$request->session()->has(DATOSUSUARIO)) {
      // return redirect()->action('Auth\LoginController@index');
      return redirect()->route('login'); // Redirigimos a la ruta con el nombre "login"
    }else{
        $action = NULL;
        return view("catalogo.index")->with(Utilerias::get_array_panelblade($request,$this,$action));
    }
  }// index()

  public function read(Request $request){
    if (!$request->session()->has(DATOSUSUARIO)) {
      return redirect()->route('login'); // Redirigimos a la ruta con el nombre "login"
    }else{
      // $nombre = $this->input->post('nombre');
      // $nombre = $request->input('nombre');
      // $offset = $request->input('offset');
      $nombre = $request->input('intxt_catalogo_nombre');
      // echo $nombre; die();
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
        "pagina_actual" => $_SESSION[PAGINA_ACTUAL_GRID],
        "total_pags" => floor($num_rows/10)
      );
      return response()->json(["result" => $response]);
    }
  }// read()

  public function create(Request $request){
    if (!$request->session()->has(DATOSUSUARIO)) {
      return redirect()->route('login'); // Redirigimos a la ruta con el nombre "login"
    }else{
      $action = "Nuevo";
      return view("catalogo.ae")->with(Utilerias::get_array_panelblade($request,$this,$action))->with("datos",$this->arr_datos);
    }
  }// create()

  public function update(Request $request){
    if (!$request->session()->has(DATOSUSUARIO)) {
      return redirect()->route('login'); // Redirigimos a la ruta con el nombre "login"
    }else{
      $idcatalogo = $request->input('idcatalogo');
      if(!$idcatalogo){
        session_start();
        $idcatalogo = $_SESSION["id_aux"];
      }
      // echo "idcatalogo: ".$idcatalogo; die();
      $action = "Editar";
      $arr_datos = Catalogo::get_xid($idcatalogo);
      $arr_datos =  (array) $arr_datos;
      // echo "<pre>"; print_r($arr_datos['idcatalogo']); die();
      return view("catalogo.ae")->with(Utilerias::get_array_panelblade($request,$this,$action))->with("datos",$arr_datos);
    }
  }// update()

  public function save(Request $request){
    if (!$request->session()->has(DATOSUSUARIO)) {
      return redirect()->route('login'); // Redirigimos a la ruta con el nombre "login"
    }else{
      $idcatalogo = $request->input('itxt_catalogo_idcatalogo');
      session_start();
      $_SESSION["id_aux"] = $idcatalogo;
      // echo "<pre>"; print_r($_SESSION); die();
      // echo $idcatalogo; die();
      $request->validate(
        [
          'itxt_catalogo_idcatalogo'=> ['required'],
          'itxt_catalogo_nombre'=> ['required','unique:catalogo,catalogo,'.$idcatalogo]
        ],
        [
          'itxt_catalogo_idcatalogo.required'=>'',
          'itxt_catalogo_nombre.required'=>'El nombre del catálogo es obligatorio',
         'itxt_catalogo_nombre.unique'=>'Ya existe un catálogo con el nombre ingresado'
       ]
      );

      $data = [
               "id"=>$request->input('itxt_catalogo_idcatalogo'),
               "catalogo"=>$request->input('itxt_catalogo_nombre'),
               "descripcion"=>$request->input('itxt_catalogo_descripcion')
              ];


      if($idcatalogo==0){
        // echo "if"; die();

        $result = Catalogo::create($data);
      }else{
        // echo "else"; die();
        $result = Catalogo::set_update($idcatalogo, $data);
      }

      // return redirect()->action('CatalogoController@index');
      return redirect()->route('catalogo');
    }
  }// save()



}// class CatalogoController
