<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class feController extends Controller
{
  public function index() {
    return view('feHome');
  }
  public function category() {
    return view('feCategory');
  }
  public function post() {
    return view('fePost');
  }
}
