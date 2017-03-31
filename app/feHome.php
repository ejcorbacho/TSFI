<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class feHome extends Model
{
    protected $table = 'entradas';

        public function llegirCategories($id){
        $contenido =  DB::table('entradas')
          //->join('fotos', 'entradas.foto', '=', 'fotos.id')

          //->join('entradas_categorias','entradas_categorias.id_entrada', '=','entradas.id' )
          //->join('entradas', 'entradas_categorias.id_entradas', '=', 'entradas.id' )
          ->select('entradas.*')
          ->where('entradas.id', '=', $id)
          ->get();

        return $contenido;
    }

public function MostrarEntradasHome(){
  $contenidos = DB::table('entradas')
      ->join('fotos', 'entradas.foto', '=', 'fotos.id')
      ->select('fotos.id as fotoId', 'fotos.alt as alt_foto', 'fotos.url as fotosUrl' , 'entradas.*', 'entradas.id as id_entrada')
      ->orderBy('entradas.data_publicacion', 'DESC')
      ->get();

    foreach ($contenidos as $k => $contenido) {
      $contenidos[$k]->nombre_categoria = DB::table('entradas')
        ->join('entradas_categorias','entradas_categorias.id_entrada', '=','entradas.id' )
        ->join('categorias','categorias.id', '=','entradas_categorias.id_categoria' )
        ->where('entradas.id', '=', $contenidos[$k]->id_entrada)
        ->select('categorias.nombre as nombre_categoria')
        ->get();
    }

    return $contenidos;
}

}
