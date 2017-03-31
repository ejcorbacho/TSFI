<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class beUploads extends Model {
    protected $table = 'fotos';

    public function uploadFile() {
        $ds = DIRECTORY_SEPARATOR;

        $storeFolder = __DIR__ . $ds . '..' . $ds . 'public' . $ds . 'uploads' . $ds;

        $targetFile = '';

        if (isset($_FILES) && !empty($_FILES)) {
            $originalFileName = $_FILES['file']['name'];
            $extension = pathinfo($originalFileName, PATHINFO_EXTENSION);
            $originalFileName = pathinfo($originalFileName, PATHINFO_FILENAME);

            $tempName = $_FILES['file']['tmp_name'];

            $serverFileName = tempnam($storeFolder, '');
            unlink($serverFileName);

            $serverFileName = str_replace(".tmp", "." . $extension, $serverFileName);

            if (move_uploaded_file($tempName,$serverFileName)) {
                $extensions = array('jpg', 'jpeg', 'png', 'gif', 'bmp');
                if (in_array(strtolower($extension), $extensions)) {
                    $serverFileName = substr($serverFileName, strpos($serverFileName, $ds.'TSFI'));
                    if($this->insertAtDataBase($serverFileName, $originalFileName)) {
                        return $serverFileName;
                    } else {
                        return '0';
                    }
                } else {
                    //Fer algo amb els arxius que no siguin fotos
                }
            } else {
                return '1';
            }
        } else {
            return '2';
        }
    }

    public function insertAtDataBase($serverFileName, $originalFileName) {
        $data = array(
            'url'=> $serverFileName,
            'alt'=> $originalFileName
        );

        DB::beginTransaction();
        try {
            $this->insert($data);
            DB::commit();
        } catch (\Illuminate\Database\QueryException $e) {
            return $e;
            DB::rollback();
            //return false;
        } catch (\Exception $e) {
            return $e;
            DB::rollback();
            //return false;
        }

        return true;
    }

    public function getImageList(){
        $images = DB::table($this->table)
          ->select('id', 'url', 'alt')
          ->orderBy('id','DESC')
          ->get();

        return $images;
    }
    public function getOneImge($imageId){
        $images = DB::table($this->table)
          ->select('id', 'url', 'alt')
          ->where('id', '=', $imageId)
          ->get();

        return $images;
    }
}
?>
