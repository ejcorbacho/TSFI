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
      ->join('fotos', 'entradas.foto', '=', 'fotos.id')
      ->join('entradas_categorias','entradas_categorias.id_entrada', '=','entradas.id' )
      ->select('fotos.id as fotoId', 'fotos.url as fotosUrl' , 'entradas.*')
      ->where('entradas_categorias.id_categoria', '=', $id)
      ->paginate(5);

    return $contenido;
}

    public function MostrarPostsRelated($id){
    $contenido =  DB::table('entradas')
      ->join('fotos', 'entradas.foto', '=', 'fotos.id')
      ->join('entradas_categorias','entradas_categorias.id_entrada', '=','entradas.id' )
      ->select('fotos.id as fotoId', 'fotos.url as fotosUrl' , 'entradas.*')
      ->where('entradas_categorias.id_categoria', '=', $id)
      ->inRandomOrder()
      ->limit(4)
      ->get();

    return $contenido;
}

public function llegirTotes(){
  $contenido =  DB::table('categorias')
  ->select('categorias.*')
  ->where('categorias.eliminado', '=', '0')
  ->get();

  return $contenido;
}

}
