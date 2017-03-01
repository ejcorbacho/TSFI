<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Categorias extends Model
{
    protected $table = 'categorias';
    public $id;
    public $nombre;
    public $id_padre;

    public function guardar(){
      $data = array(
        'titulo'=> $this->titulo,
        'subtitulo'=> $this->subtitulo,
        'resumen_corto'=>  $this->twitter,
        'resumen_largo'=> $this->resumen_largo,
        'contenido'=>  $this->contenido,
        'visible'=> '1',
        'foto'=> '1',
        'publico'=> '1',
        'usuario_publicador'=> '1',
        'relevancia'=> '1'
      );


        DB::beginTransaction();
        try {
            Categorias::insert($data);
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

    public function leerTodas(){
        $contenido =  DB::table('categorias')
          ->select('categorias.*')
          ->get();

        return $contenido;
    }

}
