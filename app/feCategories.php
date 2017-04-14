<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class feCategories extends Model
{
    protected $table = 'categorias';
    public $publico;
        public function llegirCategories($id){
        $contenido =  DB::table('categorias')
          //->join('fotos', 'entradas.foto', '=', 'fotos.id')

          //->join('entradas_categorias','entradas_categorias.id_entrada', '=','entradas.id' )
          //->join('entradas', 'entradas_categorias.id_entradas', '=', 'entradas.id' )
          ->select('categorias.*')
          ->where('categorias.id', '=', $id)
          ->where('categorias.eliminado', '=', '0')
          ->get();

        return $contenido;
    }

    public function MostarPosts($id){
    $contenido =  DB::table('entradas')
      ->leftjoin('fotos', 'entradas.foto', '=', 'fotos.id')
      ->leftJoin('rellevancia as r', 'r.id', '=', 'entradas.relevancia')
      ->join('entradas_categorias','entradas_categorias.id_entrada', '=','entradas.id' )
      ->select('fotos.id as fotoId', 'fotos.url as fotosUrl' , 'entradas.*')
      ->where('entradas_categorias.id_categoria', '=', $id)
      ->where('entradas.visible','=',1)
      ->where('entradas.eliminado','=',0)
      ->whereIn('entradas.publico', $this->publico)
      ->orderByRaw('date_add(entradas.data_publicacion, INTERVAL r.valor DAY) DESC, entradas.data_publicacion DESC')
      ->paginate(5);

    return $contenido;
}

    public function MostrarPostsRelated($id){
    $contenido =  DB::table('entradas')
      ->join('fotos', 'entradas.foto', '=', 'fotos.id')
      ->join('entradas_categorias','entradas_categorias.id_entrada', '=','entradas.id' )
      ->select('fotos.id as fotoId', 'fotos.url as fotosUrl' , 'entradas.*')
      ->where('entradas_categorias.id_categoria', '=', $id)
      ->where('entradas.visible','=',1)
      ->where('entradas.eliminado','=',0)
      ->whereIn('entradas.publico', $this->publico)
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
public function llegirTotesPerMenu(){
  $contenido =  DB::table('categorias')
  ->join('entradas_categorias','entradas_categorias.id_categoria', '=','categorias.id' )
  ->join('entradas', 'entradas_categorias.id_entrada', '=', 'entradas.id' )
  ->select('categorias.nombre','categorias.id')
  ->where('categorias.eliminado', '=', '0')
  ->where('entradas.eliminado', '=', '0')
  ->groupBy('categorias.nombre','categorias.id')
  ->get();

  return $contenido;
}

}
