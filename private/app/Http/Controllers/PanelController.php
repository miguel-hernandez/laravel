<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Libraries\Utilerias;
class PanelController extends Controller
{
  private $usuarios;

  public function __construct(){
    $this->usuarios = [
      array('id'=>1, 'name'=>'miguel'),
      array('id'=>2, 'name'=>'violeta'),
      array('id'=>3, 'name'=>'damian')
    ];
  }

  public function index(Request $request){
    if (!$request->session()->has(DATOSUSUARIO)) {
      // return redirect('/');
      // return redirect()->action('Auth\LoginController@index');
      return redirect()->route('login'); // Redirigimos a la ruta con el nombre "login"
    }else{
      $usuario_session = $request->session()->get(DATOSUSUARIO);
      $username = $usuario_session->username;
      $modulo = NULL;
      $modulo = NULL;
      $action = NULL;
      return view("panel.panel", compact('modulo', 'action', 'username'));
    }
  }// index()

}
