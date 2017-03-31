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
    public $resumen_largo;
    public $contenido;
    public $categorias;
    public $etiquetas;
    public $visible;
    public $foto;
    public $publico;
    public $entidades;
    public $usuario_publicador;
    public $data_publicacion;
    public $relevancia;
    public $fecha1;
    public $fecha2;
    public $imagen;
    public $etiquetasNuevas;

    public function guardar(){
      $data = array(
        'titulo'=> $this->titulo,
        'subtitulo'=> $this->subtitulo,
        'resumen_largo'=> $this->resumen_largo,
        'localizacion' => '',
        'contenido'=>  $this->contenido,
        'data_publicacion' => $this->data_publicacion,
        'visible'=> $this->visible,
        'fecha1'=> $this->fecha1,
        'fecha2'=> $this->fecha2,
        'foto'=> $this->imagen,
        'localizacion'=> '',
        'eliminado'=>'0',
        'publico'=> '1',
        'usuario_publicador'=> '1',
        'relevancia'=> '1'
      );

      $nuevasetiquetas_array = array();
      $nuevasetiquetas_array = json_decode($this->etiquetasNuevas);

        DB::beginTransaction();
        try {

            //$post = Entradas::insert($data);
            $this->id = DB::table('entradas')->insertGetId($data);

            //GUARDAR LAS CATEGORIAS

            for ($i=0;$i<count($this->categorias);$i++){
             DB::table('entradas_categorias')->insert(
                  ['id_entrada' => $this->id, 'id_categoria' => $this->categorias[$i]]
              );
            }

            for ($i=0;$i<count($this->etiquetas);$i++){
             DB::table('entradas_etiquetas')->insert(
                  ['id_entrada' => $this->id, 'id_etiqueta' => $this->etiquetas[$i]]
              );
            }

            for ($i=0;$i<count($this->entidades);$i++){
             DB::table('entradas_entidades')->insert(
                  ['id_entrada' => $this->id, 'id_entidad' => $this->entidades[$i]]
              );
            }

            //GUARDAR NUEVAS etiquetas
            for ($i=0;$i<count($nuevasetiquetas_array);$i++){
              $data_etiquetaNueva = array('nombre' => $nuevasetiquetas_array[$i]);
              $id_nuevaEtiqueta = DB::table('etiquetas')->insertGetId($data_etiquetaNueva);
              DB::table('entradas_etiquetas')->insert(
                   ['id_entrada' => $this->id, 'id_etiqueta' =>  $id_nuevaEtiqueta]
               );
            }

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
        'resumen_largo'=> $this->resumen_largo,
        'localizacion' => '',
        'contenido'=>  $this->contenido,
        'visible'=> $this->visible,
        'fecha1'=> $this->fecha1,
        'fecha2'=> $this->fecha2,
        'foto'=> $this->imagen,
        'localizacion'=> '',
        'eliminado'=>'0',
        'publico'=> $this->publico,
        'data_publicacion' => $this->data_publicacion,
        'usuario_publicador'=> '1',
        'relevancia'=> '1'
      );

        $nuevasetiquetas_array = array();
        $nuevasetiquetas_array = json_decode($this->etiquetasNuevas);

        DB::beginTransaction();
        try {
           //$post = Entradas::insert($data);
            DB::table('entradas')->where('id', '=', $this->id)->update($data);
            //GUARDAR LAS CATEGORIAS
            DB::table('entradas_categorias')->where('id_entrada', '=', $this->id)->delete();
            for ($i=0;$i<count($this->categorias);$i++){
             DB::table('entradas_categorias')->insert(
                  ['id_entrada' => $this->id, 'id_categoria' => $this->categorias[$i]]
              );
            }

            //GUARDAR LAS EITQUETAS
            DB::table('entradas_etiquetas')->where('id_entrada', '=', $this->id)->delete();
            for ($i=0;$i<count($this->etiquetas);$i++){
             DB::table('entradas_etiquetas')->insert(
                  ['id_entrada' => $this->id, 'id_etiqueta' => $this->etiquetas[$i]]
              );
            }

            DB::table('entradas_entidades')->where('id_entrada', '=', $this->id)->delete();
            for ($i=0;$i<count($this->entidades);$i++){
             DB::table('entradas_entidades')->insert(
                  ['id_entrada' => $this->id, 'id_entidad' => $this->entidades[$i]]
              );
            }

            //GUARDAR NUEVAS etiquetas
            for ($i=0;$i<count($nuevasetiquetas_array);$i++){
              $data_etiquetaNueva = array('nombre' => $nuevasetiquetas_array[$i]);
              $id_nuevaEtiqueta = DB::table('etiquetas')->insertGetId($data_etiquetaNueva);
              DB::table('entradas_etiquetas')->insert(
                   ['id_entrada' => $this->id, 'id_etiqueta' =>  $id_nuevaEtiqueta]
               );
            }

            DB::commit();
            return $this->id;
        } catch (\Illuminate\Database\QueryException $e) {
            //return $e;
            DB::rollback();
            return '-1';
        } catch (\Exception $e) {
            DB::rollback();
            return '-1';
        }

    }

    public function leerTodas(){
        $contenido =  DB::table('entradas')
          ->join('fotos', 'entradas.foto', '=', 'fotos.id')
          ->join('entradas_categorias', 'entradas_categorias.id_entrada', '=', 'entradas.id')
          ->join('categorias', 'categorias.id', '=', 'entradas_categorias.id_categoria')
          ->select('entradas.id','entradas.resumen_corto','entradas.titulo','entradas.data_publicacion', 'fotos.url',DB::raw('group_concat(categorias.nombre separator ", ") as categoriasDePost'))
          ->groupBy('entradas.id','entradas.resumen_corto','entradas.titulo','entradas.data_publicacion','fotos.url')
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

    public function llegirCategoriesDeEntrada() {

        $contenido = DB::table('entradas')
                ->join('entradas_categorias', 'entradas_categorias.id_entrada', '=', 'entradas.id')
                ->join('categorias', 'categorias.id', '=', 'entradas_categorias.id_categoria')
                ->select( 'categorias.nombre', 'categorias.id as idcat')
                ->where('entradas.id', '=', $this->id)
                ->get();
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
