<?php

namespace App\Http\Controllers;

use App\feEntitats;
use App\feEntrades;
use App\Paginas;
use App\feCategories;
use App\feHome;
use Illuminate\Http\Request;


class feController extends Controller
{
    private $oentradas;
    private $data;
    private $ocategories;
    private $opaginashome;
    private $todosposts;
    private $valor;
    private $cookiePublico;
    private $oentitats;
    private $publico;

    public function __construct()
    {
        $this->oentitats = new feEntitats;
        $this->opaginashome = new Paginas;
        if (!isset($_COOKIE["CookiePublico"])) {

            setcookie("CookiePublico", 'todos', time() + (60*60*24*60),'/cms');
            $this->publico = array( 0=>0 , 1=>1 , 2=>2 );
        }else{
            $cookiePublico = $_COOKIE["CookiePublico"];
            switch ($cookiePublico) {
                case 'alumnos':
                    $this->publico = array( 0=>1 , 1=>0 );
                    break;
                case 'profesores':
                    $this->publico = array( 0=>2 , 1=>0 );
                    break;
                default :
                    $this->publico = array( 0=>0 , 1=>1 , 2=>2 );
                    break;
            }
        }
    }


    public function category($id) {
        $ocategories = new feCategories;
        $ocategories->publico = $this->publico;
        $data = $ocategories->llegirCategories($id);
        if (count($data)<=0) {
            abort(404);
        }
        $post = $ocategories->MostarPosts($id);
        if (count($post)<=0) {
            abort(404);
        }
        $related = $ocategories->MostrarPostsRelated($id);
        $paginas = $this->opaginashome->llegirTotes();
        $categories = $ocategories->llegirTotesPerMenu();

        return view('frontend.feCategory',['categoria'=>$data[0], 'posts'=>$post, 'related'=>$related, 'categories'=>$categories]);
    }
    public function post($id) {
        $oentradas = new feEntrades;
        $ocategories = new feCategories;

        $oentradas->publico = $this->publico;

        $etiquetas = $oentradas->llegirEtiquetesDePost($id);
        $categories = $ocategories->llegirTotesPerMenu();
        $data = $oentradas->llegirEntrada($id);
            $paginas = $this->opaginashome->llegirTotes();
        if (count($data)<=0) {
            abort(404);
        }
        $related = $oentradas->MostrarPostsRelated($id);
        return view('frontend.fePost',['data'=>$data[0] , 'related'=>$related, 'paginas'=>$paginas, 'categories'=>$categories, 'etiquetas'=>$etiquetas ]);
    }

    public function pagines($id) {
      $ocategories = new feCategories;

      $categories = $ocategories->llegirTotesPerMenu();
      $data = $this->opaginashome->llegirContingut($id);
      $paginas = $this->opaginashome->llegirTotes();
      return view('frontend.fePaginas',['data'=>$data[0], 'paginas'=>$paginas, 'categories'=>$categories]);

    }

    public function index() {
    
      $oentradashome = new feHome;
      $ocategories = new feCategories;
      $oentradashome->publico = $this->publico;

      $categories = $ocategories->llegirTotesPerMenu();
      $data = $oentradashome->MostrarEntradasHome();
      $paginas = $this->opaginashome->llegirTotes();


    //   return $data;
      return view('frontend.feHome',['posts'=>$data, 'paginas'=>$paginas, 'categories'=>$categories]);

    }

    //public function category($id) {
    //    $todosposts = new feCateogories;
    //    $data = $todosposts->MostarPosts($id);
    //      return view('feCategory',['data'=>$data[0]]);
    //}

    public function TresEnitats()
    {
      return($this->oentitats->LlistaTresEntitats());

    }

    public function FooterEntitats()
    {
      return($this->oentitats->LlistaFooterEntitats());

    }

    public function getEventList() {
        $oentradashome = new feHome;
        return $oentradashome->getEventList();
    }

}
