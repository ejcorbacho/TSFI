<?php

namespace App\Http\Controllers;
use App\Categories;
use App\Entradas;
use App\beEtiquetas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use View;


class EntradasController extends Controller
{
  private $oentradas;
  private $ocategorias;
  private $categorias;
  private $etiquetas;
  private $oetiquetas;

  public function __construct()
  {
    $this->middleware('auth');
    $this->oentradas = new Entradas;
    $this->ocategorias = new Categories;
    $this->oetiquetas = new beEtiquetas;
  }
  //Mostrar formulario para crear cliente
  public function makeEntrada()
  {
      $this->categorias = $this->ocategorias->llistarTotes();
      $this->etiquetas = $this->oetiquetas->llistarTotes();
      return view('backend.Entradas',['etiquetas'=>$this->etiquetas, 'categoriesSensePare'=>$this->categorias]);
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
      $this->oentradas->etiquetas = Input::get('etiquetas_seleccionadas');

      $fecha = Input::get('data_publicacion');
      $fecha = date("Y-m-d", strtotime($fecha));
      $this->oentradas->data_publicacion = $fecha;
      if(Input::get('visible') == null){
        $this->oentradas->visible = 0;
      } else {
        $this->oentradas->visible = Input::get('visible');
      }
      $this->oentradas->publico = Input::get('publico');

      $fechas = Input::get('evento');
      $fecha1 = substr($fechas, 0, strpos($fechas, '-'));
      $fecha2 = substr($fechas, strpos($fechas, '-')+1, strlen($fechas));

      
      $fecha1 = date("Y-m-d", strtotime($fecha1));
      $fecha2 = date("Y-m-d", strtotime($fecha2));
      $this->oentradas->fecha1 = $fecha1;
      $this->oentradas->fecha2 = $fecha2;


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
    $this->categorias = $this->ocategorias->llistarTotes();
    $this->oentradas->id = $id;
    $entradas = $this->oentradas->leerContenido();
    return view('backend.Entradas',['data'=>$entradas, 'categoriesSensePare'=>$this->categorias]);
  }

  //Listar las entradas guardados en la BD
  public function llistarEntradas()
  {
    $entradas = $this->oentradas->leerTodas();
    return view('backend.beTotesEntrades',['data'=> $entradas]);
  }
}
