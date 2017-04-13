<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class feEntrades extends Model
{
    protected $table = 'entradas';
    public $publico;
    public function llegirEntrada($id) {
        $contenido = DB::table('entradas')
                ->leftjoin('fotos', 'entradas.foto', '=', 'fotos.id')
                ->leftjoin('entradas_categorias', 'entradas_categorias.id_entrada', '=', 'entradas.id')
                ->leftjoin('categorias', 'categorias.id', '=', 'entradas_categorias.id_categoria')
                ->select('entradas.*', 'categorias.nombre', 'categorias.id as idcat', 'fotos.id as fotoId', 'fotos.url as fotosUrl')
                ->where('entradas.id', '=', $id)
                ->where('entradas.visible','=',1)
                ->where('entradas.eliminado','=',0)
                ->whereIn('entradas.publico', $this->publico)
                ->get();

        return $contenido;
    }
    public function llegirEtiquetesDePost($id) {
        $contenido = DB::table('entradas')
                ->leftjoin('entradas_etiquetas', 'entradas_etiquetas.id_entrada', '=', 'entradas.id')
                ->leftjoin('etiquetas', 'etiquetas.id', '=', 'entradas_etiquetas.id_etiqueta')
                ->select('etiquetas.*')
                ->where('entradas.id', '=', $id)
                ->where('entradas.eliminado','=',0)
                ->get();

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




}
