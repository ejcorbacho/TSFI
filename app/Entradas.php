<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Entradas extends Model
{
    protected $table = 'entradas';
    public $titulo;
    public $subtitulo;
    public $twitter;
    public $resumen_largo;
    public $contenido;
    public $visible;
    public $foto;
    public $publico;
    public $usuario_publicador;
    public $relevancia;

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
            Entradas::insert($data);
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
        $contenido =  DB::table('entradas')
          ->join('fotos', 'entradas.foto', '=', 'fotos.id')
          ->select('entradas.*', 'fotos.url')
          ->get();

        return $contenido;
    }

}
