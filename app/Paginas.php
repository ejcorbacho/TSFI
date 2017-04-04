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
        'foto'=> '1',
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
        'foto'=> '1',
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



    public function leerContenido(){
        $contenido =  DB::table('entradas')
          ->select('entradas.*')
          ->where('entradas.id', '=', $this->id)
          ->get();

        return $contenido;
    }

    public function llegirTotes() {

        $contenido = DB::table('paginas')
                ->select( 'paginas.id', 'paginas.titulo')
                ->get();

        return $contenido;
    }

    public function getEvents() {

    }
    public function leerEtiquetasMarcadas($id){
        $contenido =  DB::table('entradas_etiquetas')
          ->select('entradas_etiquetas.id_etiqueta as id')
          ->where('entradas_etiquetas.id_entrada', '=', $id)
          ->get();

        return $contenido;
    }

    public function leerEntidadesMarcadas($id){
        $contenido =  DB::table('entradas_entidades')
          ->select('entradas_entidades.id_entidad as id')
          ->where('entradas_entidades.id_entrada', '=', $id)
          ->get();

        return $contenido;
    }

    public function leerCategoriasMarcadas($id){
        $contenido =  DB::table('entradas_categorias')
          ->select('entradas_categoria.id_categoria as id')
          ->where('entradas_categoria.id_entrada', '=', $id)
          ->get();

        return $contenido;
    }

}
