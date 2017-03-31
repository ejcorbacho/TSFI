<?php

namespace App\Http\Controllers;

use App\beEntitats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use View;

class beEntitatsController extends Controller
{
    private $oentitats;

    public function __construct()
    {
        $this->middleware('auth');
        $this->oentitats = new beEntitats;
    }

   /* public function novaCategoria()
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
    }*/
    public function guardarNovaEntitat()
    {
        $this->oentitats->nombre = Input::get('nombre');
        $this->oentitats->son_colaboradoras = Input::get('colab');
        $this->oentitats->url = Input::get('mainImage');

        if($this->oentitats->son_colaboradoras ){ // comprobacion de si es o no colaboardor
            $this->oentitats->son_colaboradoras = 1;

        }else{
            $this->oentitats->son_colaboradoras = 0;
        }

        if ($this->oentitats->guardar()){
          $this->salida_vista['mensaje'] = "Guardat!";
        } else {
          $this->salida_vista['mensaje'] = "Error al guardar!";
          abort(500,"Error al guardar!");
        }
        return $this->salida_vista['mensaje'];
    }
    
   /* 
    public function llistarCategoria()
    {
      return($this->ocategories->llistarTotes());

    }*/
    public function NovaEntitat()
    {
        return view('backend.beNuevaEntitat');
    }

    public function llistarEnitats()
    {
      return($this->oentitats->llistarTotesEntitats());

    }
    
    
}