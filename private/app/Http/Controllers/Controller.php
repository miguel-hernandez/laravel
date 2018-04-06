<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

define("ZONAHORARIA", "America/Mexico_City");
define("DATOSUSUARIO", "datos_usuario_laravel");
define("PAGINA_ACTUAL_GRID","gridpaginador_laravel");
define("VALORES_XPAGINA",10);

// types alert bootstrap 4

define("FLASH_MESSAGE","flash_message");
define("SUCCESS","success");
define("DANGER","danger");
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
