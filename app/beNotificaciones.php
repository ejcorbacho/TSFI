<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class beNotificaciones extends Model
{

    public function leerTodas(){
        $contenido =  DB::table('notificaciones')
          ->select('notificaciones.*')
          ->get();

        return $contenido;
    }


}
