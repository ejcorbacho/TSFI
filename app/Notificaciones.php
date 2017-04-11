<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Notificaciones extends Model
{


    public function leerAdministradores(){
        $contenido =  DB::table('users')
          ->select('users.email')
          ->get();

        return $contenido;
    }



}
