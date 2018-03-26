<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Catalogo extends Model
{
    //
    public static function get_all($nombre){

        return DB::select( DB::raw("SELECT c.idcatalogo,c.catalogo,c.descripcion
                                    FROM catalogo c
                                    WHERE c.estatus = 1 AND c.catalogo LIKE :nombre "
                                  ),
                                  array( 'nombre' => "%".$nombre."%" )
                      );

                      /*
                      return DB::table('catalogo')
                                  ->select('catalogo.idcatalogo', 'catalogo.catalogo', 'catalogo.descripcion'
                                            )
                                  ->where('catalogo.estatus', '=', 1)
                                  ->where('catalogo.catalogo', 'LIKE', "%".$nombre."%")
                                  // ->get();
                                  ->get()->toArray();
                                  */
    }// get_all()


}
