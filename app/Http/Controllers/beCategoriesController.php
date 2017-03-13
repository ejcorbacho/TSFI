<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use View;

class beCategoriesController extends Controller
{
    private $ocategories;

    public function __construct()
    {
        $this->middleware('auth');
        $this->ocategories = new Categories;
    }

    public function novaCategoriaForm()
    {
      $nombre = Input::get('nombre');
      return $this->novaCategoria($nombre);
    }

    public function novaCategoriaPost()
    {
      $nombre = Input::get('nombre');
      return $this->novaCategoria($nombre);
    }

    public function novaCategoria($nombre)
    {
        $this->ocategories->nombre = $nombre;
        //falta un if de comprobacion que esta en entradas controller
        $this->ocategories->guardar();


        return view('backend.beNovaCategoria');
    }

    public function llistarCategoria()
    {
      return($this->ocategories->llistarTotes());

    }
    public function editarCategoria()
    {
        return view('backend.beEditarCategoria');
    }
}
