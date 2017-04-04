<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\feSearch;


class fePaginasController extends Controller
{

  public function __construct()
  {


  }

  //Mostrar formulario para crear client
  public function mostrarPagina()
  {
    return view('frontend.fePaginas');
  }


}
