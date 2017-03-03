<?php

namespace App\Http\Controllers;

use App\feEntrades;
use Illuminate\Http\Request;


class feController extends Controller
{
    private $oentradas;
    private $data;
    
    
    public function index() {
        return view('feHome');
    }
    public function category() {
        return view('feCategory');
    }
    public function post($id) {
        $oentradas = new feEntrades;
        $data = $oentradas->llegirEntrada($id);
        return view('fePost',['data'=>$data[0]]);
    }
}
