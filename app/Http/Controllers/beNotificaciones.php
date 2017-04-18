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
        $notificaciones = $this->mnotificaciones->leerTodas();
        $data = $this->mnotificaciones->leerTodasSinLimite();
        return view('backend.beTotesNotificaciones',['data'=>$data, 'notificaciones'=>$notificaciones]);
    }

    public function veureNotificacio($id) {
        $notificaciones = $this->mnotificaciones->leerTodas();
        $data = $this->mnotificaciones->leerNotificacion($id);

        return view('backend.beVeureNotificacio',['dato'=>$data, 'notificaciones'=>$notificaciones]);
    }

}
