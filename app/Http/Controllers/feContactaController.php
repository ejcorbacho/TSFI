<?php

namespace App\Http\Controllers;

use App\feEntitats;
use App\Paginas;
use App\feCategories;
use App\feHome;
use App\Contacta;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;


class feContactaController extends Controller {

    private $ocategories;
    private $opaginashome;
    private $ocontacta;

    public function __construct()
    {
      $this->ocategories = new feCategories;
      $this->opaginashome = new Paginas;
      $this->ocontacta = new Contacta;
    }


    public function mostrarpagina() {

        $categories = $this->ocategories->llegirTotes();
        $paginas = $this->opaginashome->llegirTotes();

        return view('frontend.feformularioContacta',['paginas'=>$paginas, 'categories'=>$categories]);
    }


      public function guardarContacta() {



          $this->ocontacta->titulo = Input::get('titulo');
          $this->ocontacta->contenido = Input::get('contingut');
          $this->ocontacta->nom = Input::get('nom');
          $this->ocontacta->email = Input::get('email');



          if ($this->ocontacta->guardarfe()=='-1'){
            $categories = $this->ocategories->llegirTotes();
            $paginas = $this->opaginashome->llegirTotes();
            return view('frontend.feerror',['paginas'=>$paginas, 'categories'=>$categories]);
          } else {
            $categories = $this->ocategories->llegirTotes();
            $paginas = $this->opaginashome->llegirTotes();
            return view('frontend.feagradecimento',['paginas'=>$paginas, 'categories'=>$categories]);
          };
      }


}
