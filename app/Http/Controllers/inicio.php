<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entradas;

class inicio extends Controller
{
  public function index() {


    $instancia = new Entradas();

    $instancia->guardar();

    $hola = $instancia->leerTodas();
    return view('home',['variable'=>$hola]);
  }
}
