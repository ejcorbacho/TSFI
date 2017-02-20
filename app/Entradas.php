<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Entradas extends Model
{
    protected $table = 'entradas';

    public function guardar(){
      $data = array(
        'titulo'=>'titulo',
        'subtitulo'=> 'subtitulo',
        'resumen_corto'=> 'resumen corto',
        'resumen_largo'=> 'resumen largo',
        'contenido'=> 'blablablabla',
        'visible'=> '1',
        'foto'=> '1',
        'publico'=> '1',
        'usuario_publicador'=> '1',
        'relevancia'=> '1'
      );
      Entradas::insert($data);
    }

    public function leerTodas(){
        $contenido =  DB::table('entradas')
          ->join('fotos', 'entradas.foto', '=', 'fotos.id')
          ->select('entradas.*', 'fotos.url')
          ->get();

        return $contenido;
    }

}
