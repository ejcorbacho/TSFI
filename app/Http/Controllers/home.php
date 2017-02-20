<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class home extends Controller
{
  public function index() {
    return view('home');
  }
  public function category() {
    return view('category');
  }
  public function post() {
    return view('post');
  }
}
