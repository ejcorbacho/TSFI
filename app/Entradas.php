<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Entradas extends Model
{
    protected $table = 'entradas';
    public $id;
    public $titulo;
    public $subtitulo;
    public $twitter;
    public $resumen_largo;
    public $contenido;
    public $categorias;
    public $visible;
    public $foto;
    public $publico;
    public $usuario_publicador;
    public $data_publicacion;
    public $relevancia;

    public function guardar(){
      $data = array(
        'titulo'=> $this->titulo,
        'subtitulo'=> $this->subtitulo,
        'resumen_corto'=>  $this->twitter,
        'resumen_largo'=> $this->resumen_largo,
        'contenido'=>  $this->contenido,
        'data_publicacion' => $this->data_publicacion,
        'visible'=> $this->visible,
        'eliminado'=>'0',
        'foto'=> '1',
        'publico'=> '1',
        'usuario_publicador'=> '1',
        'relevancia'=> '1'
      );


        DB::beginTransaction();
        try {
            $post = Entradas::insert($data);
            $this->id = DB::table('entradas')->insertGetId($data);
            //GUARDAR LAS CATEGORIAS
            for ($i=0;$i<count($this->categorias);$i++){
              DB::table('entradas_categorias')->insert(
                  ['id_entrada' => $this->id, 'id_categoria' => $this->categorias[$i]]
              );
            }

            DB::commit();
            return $this->id;
        } catch (\Illuminate\Database\QueryException $e) {
            //return $e;
            DB::rollback();
            return false;
        } catch (\Exception $e) {
            return $e;
            DB::rollback();
            return false;
        }


    }

    public function actualizar(){
      $data = array(
        'titulo'=> $this->titulo,
        'subtitulo'=> $this->subtitulo,
        'resumen_corto'=>  $this->twitter,
        'resumen_largo'=> $this->resumen_largo,
        'contenido'=>  $this->contenido,
        'visible'=> $this->visible,
        'foto'=> '1',
        'publico'=> $this->publico,
        'data_publicacion' => $this->data_publicacion,
        'usuario_publicador'=> '1',
        'relevancia'=> '1'
      );


        DB::beginTransaction();
        try {
            //$post = Entradas::insert($data);
            DB::table('entradas')->where('id', '=', $this->id)->update($data);
            //GUARDAR LAS CATEGORIAS

            DB::commit();
            return $this->id;
        } catch (\Illuminate\Database\QueryException $e) {
            //return $e;
            DB::rollback();
            return false;
        } catch (\Exception $e) {
            return $e;
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

    public function leerContenido(){
        $contenido =  DB::table('entradas')
          ->join('fotos', 'entradas.foto', '=', 'fotos.id')
          ->select('entradas.*', 'fotos.url')
          ->where('entradas.id', '=', $this->id)
          ->get();

        return $contenido;
    }


}
