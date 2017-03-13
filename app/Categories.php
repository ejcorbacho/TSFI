<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Categories extends Model
{
    protected $table = 'categorias';
    public $id;
    public $nombre;
    public $id_padre;
    
    

    public function guardar(){
      $data = array(
        'nombre'=> $this->nombre,
        'id_padre'=> $this->id_padre
      );


        DB::beginTransaction();
        try {
            Categories::insert($data);
            DB::commit();
            return true;
        } catch (\Illuminate\Database\QueryException $e) {
            //return $e;
            DB::rollback();
            return false;
        } catch (\Exception $e) {
            //return $e;
            DB::rollback();
            return false;
        }
    }

    public function llegirCategoriesSensePare(){
        $contenido =  DB::table('categorias')
          ->select('categorias.*')
          ->where('categorias.id_padre', '=', null)
          ->get()
          ->pluck('nombre', 'id');

        return $contenido;
    }

}
