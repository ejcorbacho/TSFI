<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\feSearch;

class feSearchController extends Controller {
    private $osearch;

    public function __construct() {
        $this->osearch = new feSearch;
    }

    public function searchByTag(Request $request)
    {
        return $this->osearch->searchByTag($request);
    }
}