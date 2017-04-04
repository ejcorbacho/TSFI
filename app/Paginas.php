<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Paginas extends Model
{
    protected $table = 'paginas';
    public $id;
    public $titulo;
    public $subtitulo;
    public $contenido;
    public $foto;

    public function guardar(){
      $data = array(
        'titulo'=> $this->titulo,
        'subtitulo'=> $this->subtitulo,
        'contenido'=>  $this->contenido,
        'foto'=>  $this->foto,
        'usuario_publicador'=> '1',
      );


        DB::beginTransaction();
        try {
            $this->id = DB::table('paginas')->insertGetId($data);

            DB::commit();
           return $this->id;
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollback();
            return '-1';
        } catch (\Exception $e) {
            DB::rollback();
            return '-1';
        }


    }

    public function actualizar(){

      $data = array(
        'titulo'=> $this->titulo,
        'subtitulo'=> $this->subtitulo,
        'contenido'=>  $this->contenido,
        'foto'=>  $this->foto,
        'usuario_publicador'=> '1',
      );



        DB::beginTransaction();
        try {
            DB::table('paginas')->where('id', '=', $this->id)->update($data);
            DB::commit();
            return $this->id;
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollback();
            return '-1';
        } catch (\Exception $e) {
            DB::rollback();
            return '-1';
        }

    }



    public function llegirContingut($id){
        $contenido =  DB::table('paginas')
          ->leftjoin('fotos', 'paginas.foto', '=', 'fotos.id')
          ->select('paginas.*', 'fotos.url as fotoUrl', 'fotos.alt')
          ->where('paginas.id', '=', $id)
          ->get();

        return $contenido;
    }

    public function llegirTotes() {

        $contenido = DB::table('paginas')
                ->select( 'paginas.id', 'paginas.titulo')
                ->get();

        return $contenido;
    }



}
