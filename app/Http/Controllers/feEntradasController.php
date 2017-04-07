<?php

namespace App\Http\Controllers;

use App\feEntitats;
use App\feEntrades;
use App\Paginas;
use App\feCategories;
use App\feHome;
use Illuminate\Http\Request;


class feEntradasController extends Controller {

    private $ocategories;
    private $opaginashome;

    public function __construct()
    {
      $this->ocategories = new feCategories;
      $this->opaginashome = new Paginas;
    }


    public function mostrarpagina() {

        $categories = $this->ocategories->llegirTotes();
        $paginas = $this->opaginashome->llegirTotes();

        return view('frontend.fenovaentrada',['paginas'=>$paginas, 'categories'=>$categories]);
    }

    public function guardarNuevaEntrada() {

        $captcha = Input::get('captcha');
        if($captcha){
          return "captcha bien";
        } else {
          return "captcha mal";
        }

    }


}
