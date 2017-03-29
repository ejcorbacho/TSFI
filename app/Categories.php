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
    public $id_desti;
    public $postsAMover;

    public function guardar(){
      $data = array(
        'nombre'=> $this->nombre,
        'id_padre'=> null,
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
    public function MostarPostsDeCategoria(){
    $contenido =  DB::table('entradas')
      ->join('entradas_categorias','entradas_categorias.id_entrada', '=','entradas.id' )
      ->select('entradas.*')
      ->where('entradas_categorias.id_categoria', '=', $this->id)
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
        DB::beginTransaction();
        try {
            foreach ($this->MostarPostsDeCategoria() as $post) {
                DB::table('entradas_categorias')
                ->where('id_entrada', '=', $post->id)
                ->where('id_categoria', '=', $this->id)
                ->delete();
            }
            
            DB::table('categorias')
            ->where('categorias.id', '=', $this->id)
            ->update(['eliminado'=> 1]);
            
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
//        $contenido =  DB::table('categorias')
//          ->where('categorias.id', '=', $this->id)
//          ->update(['eliminado'=> 1]);
//          
//        return $contenido;
    }
    public function transferirCategoria(){
        DB::beginTransaction();
        try {
            foreach ($this->postsAMover as $post) {
                DB::table('entradas_categorias')
                ->where('id_entrada', '=', $post->id)
                ->where('id_categoria', '=', $this->id)
                ->delete();
            }
            foreach ($this->postsAMover as $post) {
                $contenido =  DB::table('entradas_categorias')
                ->select('entradas_categorias.id')
                ->where('entradas_categorias.id_entrada', '=', $post->id)
                ->where('entradas_categorias.id_categoria', '=', $this->id_desti)
                ->get();
                
                if (count($contenido) <= 0) {
                    DB::table('entradas_categorias')
                    ->insert(['id_entrada' => $post->id, 'id_categoria' => $this->id_desti]);
                }
            }
            if (!$this->eliminarCategoria()) {
                throw new Exception('Eliminar categoria ha fallat');
            }
            
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
//        return $contenido;
    }
    public function llegirCategoriaPerId($id){
        $contenido =  DB::table('categorias')
          ->select('categorias.*')
          ->where('categorias.id', '=', $id)
          ->where('categorias.eliminado', '!=', 1)
          ->get();

        return $contenido;
    }
    public function llegirCategoriesSensePare(){
        $contenido =  DB::table('categorias')
          ->select('categorias.*')
          ->where('categorias.eliminado', '!=', 1)
          ->where('categorias.id_padre', '=', null)
          ->get();
          //->pluck('nombre', 'id');

        return $contenido;
    }
    public function llistarTotes(){
        $contenido =  DB::table('categorias')
          ->select('categorias.*')
          ->where('categorias.eliminado', '!=', 1)
          ->orderby('nombre')
          ->get();
        return $contenido;
    }
    public function llistarCategoriaPerTransferencia($id){
        $contenido =  DB::table('categorias')
          ->select('categorias.*')
          ->where('id', '!=',$id)
          ->where('categorias.eliminado', '!=', 1)
          ->orderby('nombre')
          ->get();
        return $contenido;
    }
}
