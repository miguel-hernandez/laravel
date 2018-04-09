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
  private $error_types_file;

  public function __construct(){
    $this->modulo = "Productos";
    $this->error_types_file = array(
		1=>'El archivo supera el tamaño permitido en el servidor',
		'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.',
		'The uploaded file was only partially uploaded.',
		'No seleccionó ningún archivo',
		6=>'Missing a temporary folder.',
		'Failed to write file to disk.',
		'A PHP extension stopped the file upload.'
		);

    $this->arr_columnas_grid = array(
       "idproducto"=>array("type"=>"hidden", "header"=>"id", "width"=>"0%"),
       "producto"=>array("type"=>"text", "header"=>"Producto", "width"=>"40%"),
       "codigo_barras"=>array("type"=>"text", "header"=>"Código", "width"=>"10%"),
       "precio_provee"=>array("type"=>"text", "header"=>"$ Provedor", "width"=>"10%"),
       "precio_venta"=>array("type"=>"text", "header"=>"$ Venta", "width"=>"10%"),
       "inventario_actual"=>array("type"=>"text", "header"=>"Actual", "width"=>"10%"),
       "inventario_minimo"=>array("type"=>"text", "header"=>"Mínimo", "width"=>"10%"),
       // "idcatalogo"=>array("type"=>"text", "header"=>"Catálogo", "width"=>"10%")
       "catalogo"=>array("type"=>"text", "header"=>"Catálogo", "width"=>"10%")

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
      // echo "<pre>"; print_r($_POST);
      $idproducto = $request->input('itxt_producto_idproducto');
      $this->request_validate($request);

      $data = [
               "producto"=>$request->input('itxt_producto_producto'),
               "descripcion"=>$request->input('itxt_producto_descripcion'),
               "codigo_barras"=>$request->input('itxt_producto_codigo_barras'),
               "precio_provee"=>$request->input('itxt_producto_precio_provee'),
               "precio_venta"=>$request->input('itxt_producto_precio_venta'),
               "inventario_actual"=>$request->input('itxt_producto_inventario_actual'),
               "inventario_minimo"=>$request->input('itxt_producto_inventario_minimo'),
               "estatus"=>1,
               "idcatalogo"=>$request->input('itxt_producto_idcatalogo')
              ];

    if($idproducto==0){
      $action = "creado";

      // Preparar el nombre del carpeta según el catálogo al que pertenece
      $idcatalogo = $request->input('itxt_producto_idcatalogo');
      $arr_catalogo = Catalogo::get_xid($idcatalogo);
      $catalogo = $arr_catalogo->nombre;
      $micadena = Utilerias::limpia_string($catalogo);
      $micadena = strtolower($micadena);
      $micadena = str_replace(" ","_",$micadena);

      // La URL principal concat la del catálogo
      $url_principal =  'assets/imagenes/productos/';
      $dir_subida = $url_principal.$micadena."/";

      // echo $dir_subida; die();
      if (file_exists($dir_subida)) {
          // echo "existe";  die();
            // $dir_subida = "imagenes/".$micadena."/";
            $fichero_subido = $dir_subida.$_FILES['ifile_producto_img']['name'];
            if (move_uploaded_file($_FILES['ifile_producto_img']['tmp_name'], $fichero_subido)) {
                // echo "El fichero es válido y se subió con éxito.\n";
            } else {
                echo "¡Posible ataque de subida de ficheros!\n";
            }
      } else {
          // echo " no existe"; die();
          if(mkdir($dir_subida, 0777, true)) {
            // $fichero_subido = $dir_subida . basename($_FILES['ifile_producto_img']['name']);
            // $dir_subida = "imagenes/".$micadena."/";
            $fichero_subido = $dir_subida.$_FILES['ifile_producto_img']['name'];
            if (move_uploaded_file($_FILES['ifile_producto_img']['tmp_name'], $fichero_subido)) {
                // echo "El fichero es válido y se subió con éxito.\n";
            } else {
                echo "¡Posible ataque de subida de ficheros!\n";
            }
          }
      }
      // echo $fichero_subido; die();
      $path = $fichero_subido;

      $result = Producto::create($data, $path);
    }else{
      echo "update"; die();
    }

    $tipo = ($result && $result!=0)?SUCCESS:DANGER;
    $mensaje = ($result)?" Producto ".$action:"Reintente por favor";
    Utilerias::set_flash_message($tipo, $mensaje);
    return redirect()->route('productos');
      // $action = ($idproducto==0)?"create":"update";
      // $this->upload_file($_FILES,$action);

      // echo "<pre>"; print_r($_POST);
      // echo "<pre>"; print_r($_FILES);

      echo "<a href='".route("producto.create")."'>Regresar al formulario</a>";
    }
  }// save()

  private function request_validate($request){
      $request->validate(
        [
          'ifile_producto_img'=> ['required','image' => 'mimes:jpeg,png', 'max:2048'], // 2MB
          'itxt_producto_producto'=> ['required'],
          'itxt_producto_codigo_barras'=> ['required'],
          'itxt_producto_idcatalogo'=> ['required'],
          'itxt_producto_descripcion'=> ['required'],
          'itxt_producto_precio_provee'=> ['numeric','min:0'],
          'itxt_producto_precio_venta'=> ['numeric','min:0'],
          'itxt_producto_inventario_actual'=> ['numeric','min:0'],
          'itxt_producto_inventario_minimo'=> ['numeric','min:0']
        ],
        [
         'ifile_producto_img.required'=>'Seleccione una imagen para el producto',
         'ifile_producto_img.mimes'=>'Su archivo no cumple con el formato jpeg o png',
         'ifile_producto_img.max'=>'El tamaño máximo permitido son 2 MB',
         'itxt_producto_producto.required'=>'Ingrese un nombre para el producto',
         'itxt_producto_codigo_barras.required'=>'Ingrese un código de barras',
         'itxt_producto_idcatalogo.required'=>'Seleccione un catálogo',
         'itxt_producto_descripcion.required'=>'Ingrese una descripción',
         'itxt_producto_precio_provee.numeric'=>'Ingrese un número',
         'itxt_producto_precio_provee.min'=>'No se permiten valores menores a 0',
         'itxt_producto_precio_venta.numeric'=>'Ingrese un número',
         'itxt_producto_precio_venta.min'=>'No se permiten valores menores a 0',
         'itxt_producto_inventario_actual.numeric'=>'Ingrese un número',
         'itxt_producto_inventario_actual.min'=>'No se permiten valores menores a 0',
         'itxt_producto_inventario_minimo.numeric'=>'Ingrese un número',
         'itxt_producto_inventario_minimo.min'=>'No se permiten valores menores a 0'
       ]
      );
  }// request_validate()

  private function upload_file($file, $action){
    // echo "upload_file()";
    // echo "<pre>"; print_r($file);
    // ifile_producto_img
    // die();

  }
}// class ProductoController
