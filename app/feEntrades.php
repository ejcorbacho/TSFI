<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class feEntrades extends Model
{
    protected $table = 'entradas';

        public function llegirEntrada($id){
        $contenido =  DB::table('entradas')
          //->join('fotos', 'entradas.foto', '=', 'fotos.id')

          ->join('entradas_categorias','entradas_categorias.id_entrada', '=','entradas.id' )
          ->join('categorias','categorias.id', '=', 'entradas_categorias.id_categoria' )
          ->select('entradas.*','categorias.nombre')
          ->where('entradas.id', '=', $id)
          ->get();

        return $contenido;
    }


}
