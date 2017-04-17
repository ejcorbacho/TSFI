<?php

namespace App\Http\Controllers;

use App\beUploads;
use Illuminate\Support\Facades\Input;
use URL;

class beImageController extends Controller {
    private $uploads;

    public function __construct() {
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

    public function getOneImage($imageId) {
        return($this->uploads->getOneImge($imageId));
    }

    public function getResourceList() {
        $dir = 'uploads/files';

        // Run the recursive function

        $response = $this->scan($dir);

        return json_encode(array(
        	"name" => "files",
        	"type" => "folder",
        	"path" => $dir,
        	"items" => $response
        ));
    }

    public function scan($dir){

    	$files = array();

    	// Is there actually such a folder/file?

    	if(file_exists($dir)){

    		foreach(scandir($dir) as $f) {

    			if(!$f || $f[0] == '.') {
    				continue; // Ignore hidden files
    			}

    			if(is_dir($dir . '/' . $f)) {

    				// The path is a folder

    				$files[] = array(
    					"name" => $f,
    					"type" => "folder",
    					"path" => $dir . '/' . $f,
    					"items" => scan($dir . '/' . $f) // Recursively get the contents of the folder
    				);
    			}

    			else {

    				// It is a file

    				$files[] = array(
    					"name" => $f,
    					"type" => "file",
    					"path" => URL::to('/') . '/' . $dir . '/' . $f,
    					"size" => filesize($dir . '/' . $f) // Gets the size of this file
    				);
    			}
    		}

    	}

    	return $files;
    }
}
