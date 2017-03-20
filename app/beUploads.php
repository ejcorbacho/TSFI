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

            $tempName = $_FILES['file']['tmp_name'];

            $serverFileName = tempnam($storeFolder, '');
            unlink($serverFileName);

            $serverFileName = str_replace(".tmp", "." . $extension, $serverFileName);

            if (move_uploaded_file($tempName,$serverFileName)) {
                //return $this->insertAtDataBase($serverFileName, $originalFileName);

                if($this->insertAtDataBase($originalFileName, $serverFileName)) {
                    return $serverFileName;
                } else {
                    return '0';
                }
            } else {
                return '0';
            }
        } else {
            return '0';
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
}
?>