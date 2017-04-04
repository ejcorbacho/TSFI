<?php

namespace App\Http\Controllers;

use App\Paginas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use View;



class bePaginasController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
    $this->mpaginas = new Paginas;
  }


  public function mostrarPagina()
  {
    return view('backend.bePaginas');
  }

  public function mostrarTotes()
  {
  
    $data = $this->mpaginas->llegirTotes();
    return view('backend.beTotesPagines',['data'=>$data]);
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
