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
//          $mensaje = "Guardat!";
//        } else {
//          $mensaje = "Error al guardar!";
//        }
        return view('backend.beNovaCategoria',['data'=>$data]);
    }
    public function editarCategoria($id)
    {
        $data = $this->ocategories->llegirCategoriaPerId($id);
        $categoriesSensePare = $this->ocategories->llegirCategoriesSensePare();
        
        return view('backend.beEditarCategoria',['data'=>$data,'categoriesSensePare'=>$categoriesSensePare]);
    }
    public function MostarPostsDeCategoria()
    {
        $this->ocategories->id = Input::get('id');
        $data = $this->ocategories->MostarPostsDeCategoria();
        if (count($data)>0) {
            return $data;
        }
        else{
            return 0;
        }
    }
    
    public function guardarNovaCategoria()
    {
        $this->ocategories->nombre = Input::get('nombre');
        $this->ocategories->id_padre = Input::get('idPare');  
        //falta un if de comprobacion que esta en entradas controller
        if ($this->ocategories->guardar()){
          $mensaje = "Guardat!";
        } else {
          $mensaje = "Error al guardar!";
          abort(500,"Error al guardar!");
        }
        return $mensaje;
    }
    public function actualitzarCategoria()
    {
        $this->ocategories->id = Input::get('id');
        $this->ocategories->nombre = Input::get('nombre');
        $this->ocategories->id_padre = Input::get('idPare');
        //COMPOBAR SI ID ES NULL
        if ($this->ocategories->actualitzarCategoria()){
          $mensaje = "Guardat!";
        } else {
          $mensaje = "Error al guardar!";
          abort(500,"Error al guardar!");
        }
        return $mensaje;
    }
    public function eliminarCategoria()
    {
        $this->ocategories->id = Input::get('id');
        //COMPOBAR SI ID ES NULL
        if ($this->ocategories->eliminarCategoria()){
          $mensaje = "Guardat!";
        } else {
          $mensaje = "Error al guardar!";
          abort(500,"Error al eliminar!");
        }
        return $mensaje;
    }
    public function transferirCategoria()
    {
        $this->ocategories->id = Input::get('id');
        $this->ocategories->id_desti = Input::get('id_desti');
        
        $this->ocategories->postsAMover = $this->ocategories->MostarPostsDeCategoria($this->ocategories->id);
        
        //COMPOBAR SI ID ES NULL
        if ($this->ocategories->transferirCategoria()){
          $mensaje = "Posts transferits correctament";
        } else {
          $mensaje = "Error transferir els posts!";
          abort(500,"Error al eliminar!");
        }
        return json_encode($mensaje);
    }
    public function taulaCaregories()
    {
      return view('backend.beTotesCategories',['data'=>$this->ocategories->llistarTotes()]);
    }
    
    public function llistarCategoria()
    {
      return($this->ocategories->llistarTotes());
    }
    public function llistarCategoriaPerTransferencia()
    {
        return($this->ocategories->llistarCategoriaPerTransferencia(Input::get('id')));
    }
    
    
    
}
