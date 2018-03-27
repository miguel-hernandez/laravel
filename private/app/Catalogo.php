<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Catalogo extends Model
{

    public static function read($nombre, $offset,$limit){
      if($offset<0 && $limit<0){
        return DB::table('catalogo')
                ->select('idcatalogo')
                ->where('estatus', '=', 1)
                ->where('catalogo', 'LIKE', "%".$nombre."%")
                ->count();
      }
      else{
        return DB::table('catalogo AS c')
                ->select('c.idcatalogo', 'c.catalogo', 'c.descripcion', 'c.descripcion as c2')
                ->where('estatus', '=', 1)
                ->where('catalogo', 'LIKE', "%".$nombre."%")
                ->offset($offset)
                ->limit($limit)
                ->get()->toArray();
      }
    }// read()

    public static function create($nombre,$descripcion){
      return DB::table('catalogo')->insert(
          ['catalogo' => $nombre, 'descripcion' => $descripcion]
      );
    }// create()

    /*
    public static function update($idcatalogo,$descripcion){
      return DB::table('catalogo')
                ->where('idcatalogo', $idcatalogo)
                ->update(
                  ['catalogo' => $nombre, 'descripcion' => $descripcion]
                );
      );
    }// update()
    */


}// class Catalogo

/*
return DB::table('catalogo')
            ->select('catalogo.idcatalogo', 'catalogo.catalogo', 'catalogo.descripcion'
                      )
            ->where('catalogo.estatus', '=', 1)
            ->where('catalogo.catalogo', 'LIKE', "%".$nombre."%")
            // ->get();
            ->get()->toArray();
            */
            /*
              return DB::select( DB::raw("SELECT c.idcatalogo,c.catalogo,c.descripcion
                                          FROM catalogo c
                                          WHERE c.estatus = 1 AND c.catalogo LIKE :nombre
                                          LIMIT :offset, :limit
                                          "
                                        ),
                                        array( 'nombre' => "%".$nombre."%", "offset"=>$offset, "limit"=>$limit   )
                            );
                            */
