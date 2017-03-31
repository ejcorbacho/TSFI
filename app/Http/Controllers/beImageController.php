<?php

namespace App\Http\Controllers;

use App\beUploads;
use Illuminate\Support\Facades\Input;

class beImageController extends Controller {
    private $uploads;

    public function __construct() {
        $this->middleware('auth');
        $this->uploads = new beUploads;
    }

    //Image uploading
    public function uploadFile() {
        $photo = Input::all();
        $response = $this->uploads->uploadFile($photo);
        return $response;
    }


    public function getImageList() {
        return($this->uploads->getImageList());
    }

    public function getOneImge($imageId) {
        return($this->uploads->getOneImge($imageId));
    }
}
