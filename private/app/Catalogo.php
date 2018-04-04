<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Catalogo extends Model
{

    public static function read($nombre, $offset,$limit){
      if($offset<0 && $limit<0){
        return DB::table('catalogo')
                ->select('id as idcatalogo')
                ->where('estatus', '=', 1)
                ->where('catalogo', 'LIKE', "%".$nombre."%")
                ->count();
      }
      else{
        return DB::table('catalogo AS c')
                ->select('c.id as idcatalogo', 'c.catalogo', 'c.descripcion', 'c.descripcion as c2')
                ->where('estatus', '=', 1)
                ->where('catalogo', 'LIKE', "%".$nombre."%")
                ->offset($offset)
                ->limit($limit)
                ->get()->toArray();
      }
    }// read()

    public static function create($data){
      return DB::table('catalogo')->insert($data);
    }// create()

    public static function get_xid($idcatalogo){
      return DB::table('catalogo AS c')
              ->select('c.id as idcatalogo', 'c.catalogo as nombre', 'c.descripcion')
              ->where('estatus', '=', 1)
              ->where('id', '=', $idcatalogo)
              ->first();
    }// update()


    public static function set_update($idcatalogo,$data){
      return DB::table('catalogo')
                ->where('id', $idcatalogo)
                ->update($data);
    }// update()



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
