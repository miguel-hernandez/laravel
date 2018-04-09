<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Producto;
use App\Libraries\Utilerias;
class IndexController extends Controller
{

  public function __construct(){
 }// __construct()

  public function index(Request $request){
    $result = Producto::read_index();

    // $result = (object)[];

    return view('index', [
      'titulo' => 'Página principal',
      'username' => 'Visitante',
      'arr_productos' => $result]
    );

  }// index()



}// class CatalogoController
