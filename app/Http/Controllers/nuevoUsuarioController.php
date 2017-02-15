<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entradas;

class nuevoUsuarioController extends Controller
{
  public function index() {


    return view('nuevoUsuario');
  }
}
