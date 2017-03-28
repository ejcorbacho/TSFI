<?php

namespace App\Http\Controllers;

use App\feEntitats;
use App\feEntrades;
use App\feCategories;
use App\feHome;
use Illuminate\Http\Request;


class feController extends Controller
{
    private $oentradas;
    private $data;
    private $ocategories;
    private $todosposts;
    private $valor;

    private $oentitats;

    public function __construct()
    {
        $this->oentitats = new feEntitats;
    }

    public function index() {
        return view('frontend.feHome');
    }


    public function category($id) {
        $ocategories = new feCategories;
        $data = $ocategories->llegirCategories($id);
        $post = $ocategories->MostarPosts($id);
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
    //$related = $oentradashome->MostrarEntradasHome($id);
    return view('frontend.feHome',['posts'=>$data]);
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
     
}
