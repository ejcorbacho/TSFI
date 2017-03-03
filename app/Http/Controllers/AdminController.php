<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
  public function index() {


    $instancia = new Entradas();

    $instancia->guardar();

    $hola = $instancia->leerTodas();
    return view('auth/passwords/login',['variable'=>$hola]);
  }
}
