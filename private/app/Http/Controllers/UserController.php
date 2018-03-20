<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libraries\Utilerias;


class UserController extends Controller
{
  private $titulo;
  private $usuarios;
  private $usuario_session;

  public function __construct(){
    $this->titulo = "Usuarios";
    $this->usuarios = [
      array('id'=>1, 'name'=>'miguel'),
      array('id'=>2, 'name'=>'violeta'),
      array('id'=>3, 'name'=>'damian')
    ];


  }

  public function index(Request $request){
    if (!$request->session()->has(DATOSUSUARIO)) {
      // return redirect('/');
      return redirect()->action('Auth\LoginController@index');
    }else{
      $usuario_session = $request->session()->get(DATOSUSUARIO);
      $username = $usuario_session->username;
      $titulo = $this->titulo;
      $usuarios = $this->usuarios;

      return view("usuario.index", compact('usuarios', 'titulo', 'username'));
    }
  }// index()



  public function show(){
    return "UserController -> index()";
  }// show()

  public function create(){
    $titulo = "Nuevo usuario";
    return view("usuario.nuevo", compact('titulo'));
  }// create()

  public function update(Request $request){
      $id = $request->input('id');
      $usuarios = $this->usuarios;

      $arr_aux = array();
      foreach ($usuarios as $key => $value) {
        if($id != $value["id"]){
          array_push($arr_aux, $value);
          // unset($usuarios[$key]);
        }
      }

      return response()->json(["usuarios" => $arr_aux]);

      /*
      $respuesta_post = array(
        'response' => 'This is POST method'
      );
      $respuesta_get = array(
        'response' => 'This is GET method'
      );
      if ($request->isMethod('post')){
          return response()->json(Utilerias::test());
      }
      return response()->json($respuesta_get);
      */

  }// update()

  public function delete(){
    return "UserController -> delete()";
  }// delete()

}


/*
public function index(Request $request){
  if ($request->session()->has(DATOSUSUARIO)) {
    $titulo = $this->titulo;
    $usuarios = $this->usuarios;

    /* Pasar valores
    return view("user", ['usuarios'=>$Usuarios, "titulo"=>$titulo]);
    */
    /* Paso valores con with
    return view("user")->with(['usuarios'=>$Usuarios, 'titulo'=>$titulo]);
    */
    /* Puedo pasar los valores con with uno por uno
    return view("user")->with('usuarios', $Usuarios)
                     ->with('titulo',$titulo);
    */
    /* Puedo usar la function compact (genera un array asociativo)*//*
    return view("usuario.index", compact('usuarios', 'titulo'));
  }else{
    return redirect()->action('UserController@index');
  }
}// index()
*/
/*
public function index(Request $request){
  if (!$request->session()->has(DATOSUSUARIO)) {
    // return redirect('/');
    return redirect()->action('Auth\LoginController@index');
  }else{


    $titulo = $this->titulo;
    $usuarios = $this->usuarios;
    $variable = "<script> alert('test') </script>";

    $usuario_session = $request->session()->get(DATOSUSUARIO);
    // echo "<pre>"; print_r($usuario_session); die();
    // Pasar valores
    return view("user", ['usuarios'=>$Usuarios, "titulo"=>$titulo]);

    // Paso valores con with
    return view("user")->with(['usuarios'=>$Usuarios, 'titulo'=>$titulo]);

    // Puedo pasar los valores con with uno por uno
    return view("user")->with('usuarios', $Usuarios)
                     ->with('titulo',$titulo);

    // Puedo usar la function compact (genera un array asociativo)
    return view("usuario.index", compact('usuarios', 'titulo', 'variable'));
  }
}// index()
*/
