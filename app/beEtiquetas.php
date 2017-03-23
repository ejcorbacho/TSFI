<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class beEtiquetas extends Model
{
    protected $table = 'etiquetas';

    public function llistarTotes(){
        $contenido =  DB::table('etiquetas')
          ->select('etiquetas.*')
          ->orderby('nombre')
          ->get();

        return $contenido;
    }
}
