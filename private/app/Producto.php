<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Producto extends Model
{

  public static function read_index(){
      return DB::table('producto AS p')
              ->join('catalogo AS c', 'c.id', '=', 'p.idcatalogo')
              ->join('imagenes_xproducto AS img', 'img.idproducto', '=', 'p.id')
              ->select('p.id as idproducto', 'p.producto', 'p.codigo_barras', 'p.precio_provee','p.precio_venta','p.inventario_actual', 'p.inventario_minimo','p.inventario_minimo','p.idcatalogo', 'c.catalogo', 'img.imgurl')
              ->where('p.estatus', '=', 1)
              ->orderBy('p.producto', 'asc')
              ->get();
  }// read_index()

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
                ->join('catalogo AS c', 'c.id', '=', 'p.idcatalogo')
                ->select('p.id as idproducto', 'p.producto', 'p.codigo_barras', 'p.precio_provee','p.precio_venta','p.inventario_actual', 'p.inventario_minimo','p.inventario_minimo','p.idcatalogo', 'c.catalogo')
                ->where('p.estatus', '=', 1)
                ->where('p.producto', 'LIKE', "%".$nombre."%")
                ->offset($offset)
                ->orderBy('p.producto', 'asc')
                ->limit($limit)
                ->get();
      }
    }// read()

    public static function create($data, $img){
      /*
      DB::table('producto')->insert($data);
      return DB::getPdo()->lastInsertId();
      */
      DB::beginTransaction();

      try {
          DB::table('producto')->insert($data);
          $idproducto = DB::getPdo()->lastInsertId();

          $data_img = [
            "idproducto"=>$idproducto,
            "imgurl"=>$img
          ];

          DB::table('imagenes_xproducto')->insert($data_img);

          DB::commit();

          return TRUE;// all good

      } catch (\Exception $e) {
          DB::rollback();

          return FALSE;// something went wrong
      }

      // ->lastInsertId();
      /*
      DB::transaction(function () {
          DB::table('users')->update(['votes' => 1]);

          DB::table('posts')->delete();
      });
      */
    }// create()
}// class Producto
