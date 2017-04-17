<?php

namespace App\Http\Controllers;

use App\Usuaris;

use App\Notificaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use View;



class beUsuarisController extends Controller
{

  private $cImages;
  private $mUsuaris;
  private $onotificaciones;


  public function __construct()
  {
    $this->middleware('auth');
    $this->mUsuaris = new Usuaris;
    $this->onotificaciones = new Notificaciones;
  }


  public function mostrarLlistat()
  {
    $notificaciones = $this->onotificaciones->leerTodas();
    $usuaris = $this->mUsuaris->leerTodas();
    return view('backend.beTotsUsuaris', ['data'=>$usuaris, 'notificaciones'=>$notificaciones]);
  }


  public function eliminarUsuari()
  {
    $this->mUsuaris->id = Input::get('id');

    if ($this->mUsuaris->eliminarUsuari()){
          $mensaje = "Pàgina Eliminada!";
        } else {
          $mensaje = "Error al eliminar!";
          abort(500,"Error al eliminar!");
        }
        return json_encode($mensaje);
    return $mensaje;
  }


}
