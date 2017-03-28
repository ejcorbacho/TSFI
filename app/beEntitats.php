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

    public function guardar(){
      $data = array(
        'nombre'=> $this->nombre,
        'url'=> $this->url,
        'son_colaboradoras'=> $this->son_colaboradoras
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

    public function llistarTotesEntitats(){
        $contenido =  DB::table('entidades')
          ->select('entidades.*')
          ->inRandomOrder()
          ->get();

        return $contenido;
    }

     public function LlistaTresEntitats(){
        $contenido =  DB::table('entidades')
          ->select('entidades.*')
          ->inRandomOrder()
          ->limit(3)
          ->get();

        return $contenido;
    }
}
