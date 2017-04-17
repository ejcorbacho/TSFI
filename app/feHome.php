<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class feHome extends Model
{
    protected $table = 'entradas';
    public $publico;

    public function llegirCategories($id){
        $contenido =  DB::table('entradas')
          //->join('fotos', 'entradas.foto', '=', 'fotos.id')

          //->join('entradas_categorias','entradas_categorias.id_entrada', '=','entradas.id' )
          //->join('entradas', 'entradas_categorias.id_entradas', '=', 'entradas.id' )
          ->select('entradas.*')
          ->where('entradas.id', '=', $id)
          ->where('entradas.eliminado','=',0)
          ->get();

        return $contenido;
    }

public function MostrarEntradasHome(){
  $contenidos = DB::table('entradas')
      ->leftJoin('fotos', 'entradas.foto', '=', 'fotos.id')
      ->leftJoin('rellevancia as r', 'r.id', '=', 'entradas.relevancia')
      ->select('fotos.id as fotoId', 'fotos.alt as alt_foto', 'fotos.url as fotosUrl' , 'entradas.*', 'entradas.id as id_entrada')
      ->where('entradas.visible','=',1)
      ->where('entradas.eliminado','=',0)
      ->where('entradas.data_publicacion', '<=' , date('Y-m-d H:i:s'))
      ->whereIn('entradas.publico', $this->publico)
      ->orderByRaw('date_add(entradas.data_publicacion, INTERVAL r.valor DAY) DESC, entradas.data_publicacion DESC')
      ->paginate(12);

    foreach ($contenidos as $k => $contenido) {
      $contenidos[$k]->nombre_categoria = DB::table('entradas')
        ->join('entradas_categorias','entradas_categorias.id_entrada', '=','entradas.id' )
        ->join('categorias','categorias.id', '=','entradas_categorias.id_categoria' )
        ->where('entradas.id', '=', $contenidos[$k]->id_entrada)
        ->where('entradas.data_publicacion', '<=' , date('Y-m-d H:i:s'))
        ->where('categorias.eliminado','=', 0)
        ->select('categorias.nombre as nombre_categoria' , 'categorias.id as idCategoria')
        ->get();
    }

    return $contenidos;
}

    public function getEventList() {
        $eventList = DB::table('entradas as e')
        ->select('e.titulo as title', 'e.fecha1 as start', 'e.fecha2 as end')
        ->whereNotNull('e.fecha1')
        ->whereNotNull('e.fecha2')
        ->whereMonth('e.fecha1', '>=', date('m'))
        ->where('e.esdeveniment', '=', '1')
        ->where('e.visible', '=', '1')
        ->where('e.eliminado', '=', '0')
        ->whereDate('e.data_publicacion', '<=' , date('Y-m-d') . ' 00:00:00')
        ->orderBy('e.fecha1', 'DESC')
        ->get();

        return $eventList;
    }

}
