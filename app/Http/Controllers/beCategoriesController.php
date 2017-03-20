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
        
//        $this->ocategories->nombre = Input::get('nombre');
//        $this->ocategories->id_padre = Input::get('idPare');  
//        //falta un if de comprobacion que esta en entradas controller
//        if ($this->ocategories->guardar()){
//          $this->salida_vista['mensaje'] = "Guardat!";
//        } else {
//          $this->salida_vista['mensaje'] = "Error al guardar!";
//        }
        return view('backend.beNovaCategoria',['data'=>$data]);
    }
    public function editarCategoria($id)
    {
        $data = $this->ocategories->llegirCategoriaPerId($id);
        $categoriesSensePare = $this->ocategories->llegirCategoriesSensePare();
        
        return view('backend.beEditarCategoria',['data'=>$data,'categoriesSensePare'=>$categoriesSensePare]);
    }
    
    public function guardarNovaCategoria()
    {
        $this->ocategories->nombre = Input::get('nombre');
        $this->ocategories->id_padre = Input::get('idPare');  
        //falta un if de comprobacion que esta en entradas controller
        if ($this->ocategories->guardar()){
          $this->salida_vista['mensaje'] = "Guardat!";
        } else {
          $this->salida_vista['mensaje'] = "Error al guardar!";
          abort(500,"Error al guardar!");
        }
        return $this->salida_vista['mensaje'];
    }
    public function actualitzarCategoria()
    {
        $this->ocategories->id = Input::get('id');
        $this->ocategories->nombre = Input::get('nombre');
        $this->ocategories->id_padre = Input::get('idPare');
        //COMPOBAR SI ID ES NULL
        if ($this->ocategories->actualitzarCategoria()){
          $this->salida_vista['mensaje'] = "Guardat!";
        } else {
          $this->salida_vista['mensaje'] = "Error al guardar!";
          abort(500,"Error al guardar!");
        }
        return $this->salida_vista['mensaje'];
    }
    public function taulaCaregories()
    {
      return view('backend.beTotesCategories',['data'=>$this->ocategories->llistarTotes()]);
    }
    
    public function llistarCategoria()
    {
      return($this->ocategories->llistarTotes());
    }
    
    
    
}
