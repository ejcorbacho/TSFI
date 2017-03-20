<?php

namespace App\Http\Controllers;

use App\Entradas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use View;


class EntradasController  extends Controller
{
  private $oentradas;
  private $salida_vista = array(
    'mensaje'=>'caca'
  );

  public function __construct()
  {
    $this->middleware('auth');
    $this->oentradas = new Entradas;
  }
  //Mostrar formulario para crear cliente
  public function makeEntrada()
  {
      return view('backend.Entradas',['data'=>$this->salida_vista]);
  }
  //Guardar datos del formulario en la BD
  public function crearEntrada()
  {
      $idPostBd = Input::get('idBD');
      $this->oentradas->id = Input::get('idBD');
      $this->oentradas->titulo = Input::get('titulo');
      $this->oentradas->subtitulo = Input::get('subtitulo');
      $this->oentradas->twitter = Input::get('twitter');
      $this->oentradas->resumen_largo = Input::get('resum');
      $this->oentradas->contenido = Input::get('contingut');
      $this->oentradas->categorias = Input::get('categorias_seleccionadas');
      $fecha = Input::get('data_publicacion');

      return  date_format($fecha, 'Y-m-d');
      $this->oentradas->data_publicacion = '2017-03-07';
      if(Input::get('visible') == null){
        $this->oentradas->visible = 0;
      } else {
        $this->oentradas->visible = Input::get('visible');
      }
      $this->oentradas->publico = Input::get('publico');

      //return Input::get('categorias_seleccionadas');
      if($idPostBd == 0){
          return $this->oentradas->guardar();
      } else {
          return $this->oentradas->actualizar();
      }


  }
//Listar los clientes guardados en la BD
  public function editarEntrada($id)
  {
    $this->oentradas->id = $id;
    $entradas = $this->oentradas->leerContenido();
    return view('backend.Entradas',['data'=>$entradas]);
  }

  //Listar las entradas guardados en la BD
  public function llistarEntradas()
  {
    $entradas = $this->oentradas->leerTodas();
    return view('backend.beTotesEntrades',['data'=> $entradas]);
  }
}
