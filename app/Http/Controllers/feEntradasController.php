<?php

namespace App\Http\Controllers;

use App\feEntitats;
use App\feEntrades;
use App\Paginas;
use App\feCategories;
use App\Entradas;
use App\feHome;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;


class feEntradasController extends Controller {

    private $ocategories;
    private $opaginashome;
    private $mentradas; //* MODEL ENTRADAS **/

    public function __construct()
    {
      $this->mentradas = new Entradas;
      $this->ocategories = new feCategories;
      $this->opaginashome = new Paginas;
    }


    public function mostrarpagina() {

        $categories = $this->ocategories->llegirTotes();
        $paginas = $this->opaginashome->llegirTotes();

        return view('frontend.fecaptcha',['paginas'=>$paginas, 'categories'=>$categories]);
    }

    public function aceptarCaptcha() {


      $captcha = Input::get('g-recaptcha-response');

      if(isset($captcha)){
        if(!empty($captcha)){
          $categories = $this->ocategories->llegirTotes();
          $paginas = $this->opaginashome->llegirTotes();
          return view('frontend.fenovaentrada',['paginas'=>$paginas, 'categories'=>$categories]);
        } else {
          $categories = $this->ocategories->llegirTotes();
          $paginas = $this->opaginashome->llegirTotes();
          return view('frontend.fecaptcha',['paginas'=>$paginas, 'categories'=>$categories]);
        }
      } else {
        $categories = $this->ocategories->llegirTotes();
        $paginas = $this->opaginashome->llegirTotes();
        return view('frontend.fecaptcha',['paginas'=>$paginas, 'categories'=>$categories]);
      }


    }


      public function guardarEntrada() {



          $this->mentradas->titulo = Input::get('titulo');
          $this->mentradas->subtitulo = Input::get('subtitulo');
          $this->mentradas->resumen_largo = Input::get('resum');
          $this->mentradas->contenido = Input::get('contingut');
          $this->mentradas->nom = Input::get('nom');
          $this->mentradas->email = Input::get('email');



          if ($this->mentradas->guardarfe()=='-1'){
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
