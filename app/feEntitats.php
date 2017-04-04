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
          ->get();

        return $contenido;
    }  
    
}