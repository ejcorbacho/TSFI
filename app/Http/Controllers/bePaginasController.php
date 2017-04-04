<?php

namespace App\Http\Controllers;

//use App\beEntitats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use View;



class bePaginasController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');

  }


  public function mostrarPagina()
  {
    return view('backend.bePaginas');
  }


}
