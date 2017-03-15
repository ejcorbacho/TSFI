<?php

namespace App\Http\Controllers;

use App\feEntrades;
use App\feCategories;
use Illuminate\Http\Request;


class feController extends Controller
{
    private $oentradas;
    private $data;
    private $ocategories;
    private $todosposts;
    private $valor;

    public function index() {
        return view('feHome');
    }
    public function category($id) {
        $ocategories = new feCategories;
        $data = $ocategories->llegirCategories($id);
        $post = $ocategories->MostarPosts($id);

        return view('feCategory',['categoria'=>$data[0], 'posts'=>$post]);
    }
    public function post($id) {
        $oentradas = new feEntrades;
        $data = $oentradas->llegirEntrada($id);
        return view('fePost',['data'=>$data[0]]);
    }
    //public function category($id) {
    //    $todosposts = new feCateogories;
    //    $data = $todosposts->MostarPosts($id);
    //      return view('feCategory',['data'=>$data[0]]);
    //}

}
