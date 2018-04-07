<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Producto extends Model
{

    public static function read($nombre, $offset,$limit){
      if($offset<0 && $limit<0){
        return DB::table('producto')
                ->select('id as idproducto')
                ->where('estatus', '=', 1)
                ->where('producto', 'LIKE', "%".$nombre."%")
                ->count();
      }
      else{
        return DB::table('producto AS p')
                ->select('p.id as idproducto', 'p.producto', 'p.codigo_barras')
                ->where('estatus', '=', 1)
                ->where('producto', 'LIKE', "%".$nombre."%")
                ->offset($offset)
                ->orderBy('producto', 'asc')
                ->limit($limit)
                ->get();
      }
    }// read()

}// class Producto
