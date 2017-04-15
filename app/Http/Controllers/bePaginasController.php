<?php

namespace App\Http\Controllers;

use App\Paginas;

use App\Notificaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use View;



class bePaginasController extends Controller
{

  private $cImages;
  private $mpaginas;
  private $onotificaciones;


  public function __construct()
  {
    $this->middleware('auth');
    $this->mpaginas = new Paginas;
    $this->cImages = new beImageController;
    $this->onotificaciones = new Notificaciones;
  }


  public function mostrarPagina()
  {
    $notificaciones = $this->onotificaciones->leerTodas();
    return view('backend.bePaginas', ['notificaciones'=>$notificaciones]);
  }

  public function editarPagina($id)
  {

    $this->mpaginas->id = $id;
    $paginas = $this->mpaginas->llegirContingut($id);
    $notificaciones = $this->onotificaciones->leerTodas();

    if(!is_null($paginas[0]->foto)){
      $foto = $this->cImages->getOneImage($paginas[0]->foto);
    } else {
      $foto = NULL;
    }

    return view('backend.bePaginas',['data'=>$paginas, 'foto'=>$foto, 'notificaciones'=>$notificaciones]);
  }


  public function mostrarTotes()
  {

    $data = $this->mpaginas->llegirTotes();
    $notificaciones = $this->onotificaciones->leerTodas();
    return view('backend.beTotesPagines',['data'=>$data, 'notificaciones'=>$notificaciones]);
  }

  public function eliminar()
  {
    $this->mpaginas->id = Input::get('id');

    if ($this->mpaginas->eliminar()){
          $mensaje = "Pàgina Eliminada!";
        } else {
          $mensaje = "Error al eliminar!";
          abort(500,"Error al eliminar!");
        }
        return json_encode($mensaje);
    return $mensaje;
  }


  //Guardar datos del formulario en la BD
  public function guardarBD()
  {
      /* TRATAMOS LA ID DEL POST */

      $idPostBd = Input::get('idBD');
      $this->mpaginas->id = Input::get('idBD');

      /* TRATAMOS EL CONTENIDO DE LA PAGINA */

      $this->mpaginas->titulo = Input::get('titulo');
      $this->mpaginas->subtitulo = Input::get('subtitulo');
      $this->mpaginas->contenido = Input::get('contingut');

      /* TRATAMOS DATOS DE LA IMAGEN */

      $this->mpaginas->foto = Input::get('mainImage');

      if($idPostBd == 0){
          $request = $this->mpaginas->guardar();
          if($request == '-1'){
            abort(500);
          } else {
            return $request;
          }
      } else {
          $request = $this->mpaginas->actualizar();
          if($request == '-1'){
            abort(500);
          } else {
            return $request;
          }
      }


  }


}
