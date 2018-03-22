<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Seguridad extends Model
{
    //
    public static function validar_login($username,$clave){
      /*
      $str_query = "SELECT se.username, se.estatus, se.idusuario,
                     us.nombre, us.paterno, us.materno, us.idtipousuario, us.email,us.ntelefono
                     FROM seguridad se
                     INNER JOIN usuario us ON us.idusuario = se.idusuario
                     INNER JOIN tipousuario tu ON tu.idtipousuario = us.idtipousuario
                     WHERE se.username = '{$username}' AND se.clave = md5('{$clave}')
         ";
         return  DB::select($str_query);
         */

         /*
         $str_sql = "SELECT se.username, se.estatus, se.idusuario,
                          us.nombre, us.paterno, us.materno, us.idtipousuario, us.email,us.ntelefono
                          FROM seguridad se
                          INNER JOIN usuario us ON us.idusuario = se.idusuario
                          INNER JOIN tipousuario tu ON tu.idtipousuario = us.idtipousuario
                          WHERE se.username = :username AND se.clave = md5( :clave )";
          return DB::selectOne($str_sql,array($username,$clave));
          */


        return DB::select( DB::raw("SELECT se.username, se.estatus, se.idusuario,
                        us.nombre, us.paterno, us.materno, us.idtipousuario, us.email,us.ntelefono
                        FROM seguridad se
                        INNER JOIN usuario us ON us.idusuario = se.idusuario
                        INNER JOIN tipousuario tu ON tu.idtipousuario = us.idtipousuario
                        WHERE se.username = :username AND se.clave = md5( :clave )"),
                        array( 'username' => $username, 'clave' => $clave )
                      );


      /*
      return DB::table('seguridad')
                  ->join('usuario', 'usuario.idusuario', '=', 'seguridad.idusuario')
                  ->join('tipousuario', 'tipousuario.idtipousuario', '=', 'usuario.idtipousuario')
                  ->select('seguridad.username', 'seguridad.estatus', 'seguridad.idusuario',
                            'usuario.nombre', 'usuario.paterno', 'usuario.materno','usuario.idtipousuario', 'usuario.email', 'usuario.ntelefono'
                            )
                  ->where('seguridad.username', '=', $username)
                  ->where('seguridad.clave', '=', md5($clave))
                  // ->get();
                  ->get()->toArray();
                  */

          /* Si queremos ver el historiald de Querys
            DB::enableQueryLog();
            $log = DB::getQueryLog();
            var_dump($log);
          */
    }// validar_login()


}
