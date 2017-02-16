<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prova;
use App\Noticia;

class home extends Controller
{
  public function index() {
    $hola = Prova::all();

    $data = array('titulo'=>'Coder 1', 'cuerpo'=> 'blablablabla');

    Noticia::insert($data);

    return view('home',['variable'=>$hola]);
  }
}
