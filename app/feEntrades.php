<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class feEntrades extends Model
{
    protected $table = 'entradas';

        public function llegirEntrada($id){
        $contenido =  DB::table('entradas')
          //->join('fotos', 'entradas.foto', '=', 'fotos.id')
          ->select('entradas.*')
          ->where('entradas.id', '=', $this->id)
          ->get();

        return $contenido;
    }

}
