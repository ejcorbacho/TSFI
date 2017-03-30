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
        $contenido =  DB::table('entradas')
          ->join('fotos', 'entradas.foto', '=', 'fotos.id')
          ->join('entradas_categorias','entradas_categorias.id_entrada', '=','entradas.id' )
          ->join('categorias','categorias.id', '=','entradas_categorias.id' )
          ->select('fotos.id as fotoId', 'fotos.url as fotosUrl' , 'entradas.*','categorias.*')
          //->where('entradas_categorias.id_categoria', '=', $id)
          ->inRandomOrder()
          ->get();

        return $contenido;
    }

    public function getEventList() {
        $eventList = DB::table('entradas as e')
        ->select('titulo as title', 'fecha1 as start', 'fecha2 as end')
        ->whereNotNull('fecha1')
        ->whereNotNull('fecha2')
        ->whereMonth('fecha1', '>', 'sysdate')
        ->where('publico', '=', '1')
        ->where('eliminado', '=', '0')
        ->orderBy('fecha1', 'DESC')
        ->get();

        return $eventList;
    }

}