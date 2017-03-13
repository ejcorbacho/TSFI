<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class feCategories extends Model
{
    protected $table = 'categorias';

        public function llegirCategories($id){
        $contenido =  DB::table('categorias')
          //->join('fotos', 'entradas.foto', '=', 'fotos.id')

          //->join('entradas_categorias','entradas_categorias.id_entrada', '=','entradas.id' )
          //->join('entradas', 'entradas_categorias.id_entradas', '=', 'entradas.id' )
          ->select('categorias.*')
          ->where('categorias.id', '=', $id)
          ->get();

        return $contenido;
    }

    public function MostarPosts($id){
    $contenido =  DB::table('entradas')
      ->join('entradas_categorias','entradas_categorias.id_entrada', '=','entradas.id' )
      ->select('entradas.*')
      ->where('entradas_categorias.id_categoria', '=', $id)
      ->get();

    return $contenido;
}



}
