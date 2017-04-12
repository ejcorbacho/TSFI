<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class beEntitats extends Model
{
    protected $table = 'entidades';
    public $id;
    public $nombre;
    public $url;
    public $son_colaboradoras;
    public $foto;

    public function guardar(){
      $data = array(
        'nombre'=> $this->nombre,
        'url'=> $this->url,
        'foto'=>$this->foto,
        'son_colaboradoras'=> $this->son_colaboradoras,
        'eliminado'=> '0'
      );


        DB::beginTransaction();
        try {
            beEntitats::insert($data);
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

    public function llegirEntitatPerId($id){
        $contenido =  DB::table('entidades')
          ->leftJoin('fotos', 'fotos.id', '=', 'entidades.foto')
          ->select('entidades.*', 'fotos.id as fotoId', 'fotos.url as fotoUrl', 'fotos.alt as fotoAlt')
          ->where('entidades.id', '=', $id)
          ->where('entidades.eliminado', '!=', 1)
          ->get();

        return $contenido;
    }

    public function actualitzarEntitat(){
            $contenido =  DB::table('entidades')
              ->where('entidades.id', '=', $this->id)
              ->update(['nombre'=> $this->nombre, 'url' => $this->url, 'son_colaboradoras' => $this->son_colaboradoras, 'foto' => $this->foto]);
            return $contenido;
        }

    public function llistarTotesEntitats(){
        $contenido =  DB::table('entidades')
          ->select('entidades.*')
          ->where('eliminado', '=', 0)
          ->inRandomOrder()
          ->get();

        return $contenido;
    }

     public function LlistaTresEntitats(){
        $contenido =  DB::table('entidades')
          ->select('entidades.*')
          ->where('eliminado', '=', 0)
          ->inRandomOrder()
          ->limit(3)
          ->get();

        return $contenido;
    }
    public function eliminarEntitat(){
        DB::beginTransaction();
        try {
            DB::table('entidades')
            ->where('entidades.id', '=', $this->id)
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
    }
}
