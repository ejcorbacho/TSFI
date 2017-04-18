<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Usuaris extends Model
{

  public $id;

    public function leerTodas(){
        $contenido =  DB::table('users')
          ->select('users.*')
          ->get();

        return $contenido;
    }

    public function eliminarUsuari(){
        DB::beginTransaction();
        try {
            DB::table('users')
            ->where('users.id', '=', $this->id)
            ->delete();

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
