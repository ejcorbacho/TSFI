<?php

namespace App\Http\Controllers;

use App\Entradas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use View;


class EntradasController  extends Controller
{
  private $nombre;
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
      $nombre = "caca";
      return view('Entradas',['data'=>$this->salida_vista]);
  }
  //Guardar datos del formulario en la BD
  public function crearEntrada()
  {

      $this->oentradas->titulo = Input::get('titulo');
      $this->oentradas->subtitulo = Input::get('subtitulo');
      $this->oentradas->twitter = Input::get('twitter');
      $this->oentradas->resumen_largo = Input::get('resum_llarg');
      $this->oentradas->contenido = Input::get('contenido');

      if ($this->oentradas->guardar()){

          $this->salida_vista['mensaje'] = "Guardat!";
      } else {
        $this->salida_vista['mensaje'] = "Error al guardar!";
      }
        

      return view('Entradas',['data'=>$this->salida_vista]);

  }

  //Listar los clientes guardados en la BD
  public function listarEntradas()
  {
    $caca = "hola";
    return View::make('Entradas',['variable'=>$this->nombre]);
  }
}
