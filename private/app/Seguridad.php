<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Seguridad extends Model
{
    //
    public static function validar_login($username,$clave){
      $str_query = "SELECT se.username, se.estatus, se.idusuario,
                     us.nombre, us.paterno, us.materno, us.idtipousuario, us.email,us.ntelefono
                     FROM seguridad se
                     INNER JOIN usuario us ON us.idusuario = se.idusuario
                     INNER JOIN tipousuario tu ON tu.idtipousuario = us.idtipousuario
                     WHERE se.username = '{$username}' AND se.clave = md5('{$clave}')
         ";
      return  DB::select($str_query);



         //
         // $results = DB::select( DB::raw("SELECT * FROM some_table WHERE some_col = :somevariable"), array(
         //    'somevariable' => $someVariable,
         //  ));



         // $statement = $me->getPdo()->prepare($str_query);
         // $statement->execute($me->prepareBindings($bindings));
         // return $statement->fetchAll($me->getFetchMode());

    }// validar_login()


}
