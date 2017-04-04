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

    private $oentitats;

    public function __construct()
    {
        $this->oentitats = new feEntitats;
        $this->opaginashome = new Paginas;
    }


    public function category($id) {
        $ocategories = new feCategories;
        $data = $ocategories->llegirCategories($id);
        if (count($data)<=0) {
            abort(404);
        }
        $post = $ocategories->MostarPosts($id);
        if (count($post)<=0) {
            abort(404);
        }
        $related = $ocategories->MostrarPostsRelated($id);

        return view('frontend.feCategory',['categoria'=>$data[0], 'posts'=>$post, 'related'=>$related]);
    }
    public function post($id) {
        $oentradas = new feEntrades;
        $data = $oentradas->llegirEntrada($id);
        $related = $oentradas->MostrarPostsRelated($id);
        return view('frontend.fePost',['data'=>$data[0] , 'related'=>$related]);
    }

    public function index() {
    $oentradashome = new feHome;
    $data = $oentradashome->MostrarEntradasHome();

    $paginas = $this->opaginashome->llegirTotes();
    //$related = $oentradashome->MostrarEntradasHome($id);
    var_dump($paginas);
    return view('frontend.feHome',['posts'=>$data, 'paginas'=>$paginas]);
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
