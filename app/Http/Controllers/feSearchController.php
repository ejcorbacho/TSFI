<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Search\Search;

class SearchController extends Controller {
    public function Search(Request $request, User $user)
    {
        return Search::search($request);
    }
}