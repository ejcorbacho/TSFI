<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class feEntitats extends Model
{
    protected $table = 'entidades';

    public function LlistaTresEntitats(){
        $contenido =  DB::table('entidades')
          ->leftjoin('fotos','fotos.id', '=','entidades.foto' )
          ->select('entidades.*', 'fotos.url as fotoentidad')
          ->inRandomOrder()
          ->limit(3)
          ->get();

        return $contenido;
    }

    public function LlistaFooterEntitats(){
        $contenido =  DB::table('entidades')
          ->select('entidades.*')
          ->where('entidades.son_colaboradoras' , '=', '1')
          ->get();

        return $contenido;
    }

    public function llistarEntiatsCol($id){
        $contenido =  DB::table('entidades')
          ->leftjoin('fotos','fotos.id', '=', 'entidades.foto')
          ->join('entradas_entidades','entradas_entidades.id_entidad', '=', 'entidades.id')
          ->select('entidades.*', 'fotos.url as fotoURL', 'fotos.alt as fotoALT')
          ->where('entradas_entidades.id_entrada' , '=', $id)
          ->get();

        return $contenido;
    }

}
