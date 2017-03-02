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
    
    public function novaCategoria()
    {
        $this->ocategories->nombre = Input::get('nombre');
        //falta un if de comprobacion que esta en entradas controller
        $this->ocategories->guardar();
        
        
        return view('backend.beNovaCategoria');
    }
    public function editarCategoria()
    {
        return view('backend.beEditarCategoria');
    }
}
