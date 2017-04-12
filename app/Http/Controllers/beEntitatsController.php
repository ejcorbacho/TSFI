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

    public function guardarNovaEntitat()
    {
        $this->oentitats->nombre = Input::get('nombre');
        $this->oentitats->son_colaboradoras = Input::get('colab');
        $this->oentitats->foto = Input::get('mainImage');
        $this->oentitats->url = Input::get('url');
        
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

    public function editarEntitat($id)
    {
        $data = $this->oentitats->llegirEntitatPerId($id);

        return view('backend.beEditarEntitat',['data'=>$data]);
    }

    public function actualitzarEntitat()
    {
        $this->oentitats->id = Input::get('id');
        $this->oentitats->nombre = Input::get('nombre');
        $this->oentitats->url = Input::get('url');
        $this->oentitats->son_colaboradoras = Input::get('colab');
        $this->oentitats->foto = Input::get('mainImage');

        if($this->oentitats->son_colaboradoras ){ // comprobacion de si es o no colaboardor
            $this->oentitats->son_colaboradoras = 1;

        }else{
            $this->oentitats->son_colaboradoras = 0;
        }

        //COMPOBAR SI ID ES NULL
        if ($this->oentitats->actualitzarEntitat()){
          $mensaje = "Guardat!";
        } else {
          $mensaje = "Error al guardar!";
          abort(500,"Error al guardar!");
        }
        return $mensaje;
    }

    public function NovaEntitat()
    {
        return view('backend.beNuevaEntitat');
    }
    public function eliminarEntitat()
    {
        $this->oentitats->id = Input::get('id');
        //COMPOBAR SI ID ES NULL
        if ($this->oentitats->eliminarEntitat()){
          $mensaje = "Enitat Eliminada!";
        } else {
          $mensaje = "Error al eliminar!";
          abort(500,"Error al eliminar!");
        }
        return json_encode($mensaje);
    }
    
    public function llistarEnitats()
    {
      return($this->oentitats->llistarTotesEntitats());

    }
    public function totesEntitats()
    {
      return view('backend.beTotesEntitats',['data'=>$this->oentitats->llistarTotesEntitats()]);
    }
    
}