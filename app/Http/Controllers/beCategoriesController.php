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
        $data = $this->ocategories->llegirCategoriesSensePare();
        
        $this->ocategories->nombre = Input::get('nombre');
        $this->ocategories->id_padre = Input::get('idPare');  
        //falta un if de comprobacion que esta en entradas controller
        if ($this->ocategories->guardar()){
          $this->salida_vista['mensaje'] = "Guardat!";
        } else {
          $this->salida_vista['mensaje'] = "Error al guardar!";
        }
        return view('backend.beNovaCategoria',['data'=>$data, 'salida_vista' =>$this->salida_vista]);
    }
    public function editarCategoria()
    {
        return view('backend.beEditarCategoria');
    }
    
}
