<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class feEntrades extends Model
{
    protected $table = 'entradas';

    public function llegirEntrada($id) {
        $contenido = DB::table('entradas')
                ->join('fotos', 'entradas.foto', '=', 'fotos.id')
                ->join('entradas_categorias', 'entradas_categorias.id_entrada', '=', 'entradas.id')
                ->join('categorias', 'categorias.id', '=', 'entradas_categorias.id_categoria')
                ->select('entradas.*', 'categorias.nombre', 'categorias.id as idcat', 'fotos.id as fotoId', 'fotos.url as fotosUrl')
                ->where('entradas.id', '=', $id)
                ->get();

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




}
