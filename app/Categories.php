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
        'id_padre'=> $this->id_padre,
        'eliminado'=>'0',
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
    public function MostarPostsDeCategoria($id){
    $contenido =  DB::table('entradas')
      ->join('entradas_categorias','entradas_categorias.id_entrada', '=','entradas.id' )
      ->select('entradas.*')
      ->where('entradas_categorias.id_categoria', '=', $id)
      ->get();
    return $contenido;
}
    public function actualitzarCategoria(){
        $contenido =  DB::table('categorias')
          ->where('categorias.id', '=', $this->id)
          ->update(['id_padre'=> $this->id_padre, 'nombre'=> $this->nombre]);
        return $contenido;
    }
    public function eliminarCategoria(){
        $contenido =  DB::table('categorias')
          ->where('categorias.id', '=', $this->id)
          ->update(['eliminado'=> 1]);
        return $contenido;
    }
    public function llegirCategoriaPerId($id){
        $contenido =  DB::table('categorias')
          ->select('categorias.*')
          ->where('categorias.id', '=', $id)
          ->get();

        return $contenido;
    }
    public function llegirCategoriesSensePare(){
        $contenido =  DB::table('categorias')
          ->select('categorias.*')
          ->where('categorias.id_padre', '=', null)
          ->get();
          //->pluck('nombre', 'id');

        return $contenido;
    }
    public function llistarTotes(){
        $contenido =  DB::table('categorias')
          ->select('categorias.*')
          ->orderby('nombre')
          ->get();

        return $contenido;
    }
}
