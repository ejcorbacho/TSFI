<?php

namespace App\Http\Controllers;

use App\Notificaciones;
use Illuminate\Support\Facades\Input;

class beNotificaciones extends Controller {

    private $mnotificaciones;

    public function __construct() {
        $this->middleware('auth');
        $this->mnotificaciones = new Notificaciones;
    }

    //Image uploading
    public function mostrarGrid() {
        $data = $this->mnotificaciones->leerTodas();
        return view('backend.beTotesNotificaciones',['data'=>$data, 'notificaciones'=>$data]);
    }


}
