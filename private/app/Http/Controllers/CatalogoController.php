<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Catalogo;
use App\Libraries\Utilerias;
class CatalogoController extends Controller
{
  public $modulo;
  private $arr_datos; // va ser object, así lo estamos retornando en el Model para el update;
  private $arr_columnas_grid;

  public function __construct(){
    $this->modulo = "Catálogos";
    $this->arr_columnas_grid = array(
       "idcatalogo"=>array("type"=>"hidden", "header"=>"id"),
       "catalogo"=>array("type"=>"text", "header"=>"Catálogo"),
       "descripcion"=>array("type"=>"text", "header"=>"Descripción")

   );
   $this->arr_datos = (object)array(
     "idcatalogo"  => 0,
     "nombre"    => "",
     "descripcion" => ""
   );
 }// __construct()

  public function index(Request $request){
    if (!$request->session()->has(DATOSUSUARIO)) {
      return redirect()->route('login'); // Redirigimos a la ruta con el nombre "login"
    }else{
        $action = NULL;
        session()->has('data');
        return view("catalogo.index")->with(Utilerias::get_array_panelblade($request,$this,$action));
    }
  }// index()

  public function read(Request $request){
    if (!$request->session()->has(DATOSUSUARIO)) {
      return redirect()->route('login');
    }else{
      $nombre = $request->input('itxt_catalogo_nombre');

      $offset = Utilerias::get_offset($_POST, VALORES_XPAGINA);
      $num_rows = Catalogo::read($nombre,-1,-1);

      $result = Catalogo::read($nombre, $offset, VALORES_XPAGINA);

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
      return view("catalogo.creup")->with(Utilerias::get_array_panelblade($request,$this,$action))->with("datos",$this->arr_datos);
    }
  }// create()

  public function update(Request $request,$idcatalogo){
    if (!$request->session()->has(DATOSUSUARIO)) {
      return redirect()->route('login');
    }else{
      $action = "Editar";
      $arr_datos = Catalogo::get_xid($idcatalogo);
      return view("catalogo.creup")->with(Utilerias::get_array_panelblade($request,$this,$action))->with("datos",$arr_datos);
    }
  }// update()

  public function save(Request $request){
    if (!$request->session()->has(DATOSUSUARIO)) {
      return redirect()->route('login');
    }else{
      $idcatalogo = $request->input('itxt_catalogo_idcatalogo');
      $request->validate(
        [
          'itxt_catalogo_nombre'=> ['required','unique:catalogo,catalogo,'.$idcatalogo]
        ],
        [
          'itxt_catalogo_nombre.required'=>'El nombre del catálogo es obligatorio',
         'itxt_catalogo_nombre.unique'=>'Ya existe un catálogo con el nombre ingresado'
       ]
      );

      $data = [
               "catalogo"=>$request->input('itxt_catalogo_nombre'),
               "descripcion"=>$request->input('itxt_catalogo_descripcion')
              ];


      if($idcatalogo==0){
        $action = "creado";
        $result = Catalogo::create($data);
      }else{
        $arr_datos = Catalogo::get_xid($idcatalogo);
        $arr_datos = (array)$arr_datos;
        if($arr_datos['nombre'] == $request->input('itxt_catalogo_nombre') && $arr_datos['descripcion'] == $request->input('itxt_catalogo_descripcion')){
          $action = "sin cambios";
          $result = 1;
        }
        else{
          $action = "actualizado";
          $result = Catalogo::set_update($idcatalogo, $data);
        }
      }

      $tipo = ($result && $result!=0)?SUCCESS:DANGER;
      $mensaje = ($result)?"Catálogo ".$action:"Reintente por favor";

      Utilerias::set_flash_message($tipo, $mensaje);

      return redirect()->route('catalogo');
    }
  }// save()

  public function delete(Request $request,$idcatalogo){
    if (!$request->session()->has(DATOSUSUARIO)) {
      return redirect()->route('login');
    }else{
      $result = Catalogo::delete_xid($idcatalogo);

      $tipo = ($result)?SUCCESS:DANGER;
      $mensaje = ($result)?"Catálogo eliminado":"Reintente por favor";
      Utilerias::set_flash_message($tipo, $mensaje);

      return redirect()->route('catalogo');
    }
  }// delete()


}// class CatalogoController
