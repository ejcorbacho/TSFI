<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ReportarPost extends Model
{
    protected $table = 'entradas';
    public $id;
    public $titulo;
    public $contenido;
    public $nom;
    public $email;


    public function guardarfe(){
      //guardo la notificaciones
      $dia_actual = date("d");
      $mes_actual = date("m");
      $any_actual = date("Y");
      $hora_actual = date("H");
      $minuto_actual = date("i");

      $fecha_actual = $any_actual . '-' . $mes_actual . '-' . $dia_actual . ' ' . $hora_actual . ':' . $minuto_actual . ':00';


      $data = array(
        'contenido'=> $this->contenido,
        'titulo' => $this->titulo,
        'mail'=> $this->email,
        'nombre'=> $this->nom,
        'id_relacion'=> $this->id,
        'visto'=>  '0',
        'fecha'=> $fecha_actual,
      );


        DB::beginTransaction();
        try {
            $this->id = DB::table('notificaciones')->insertGetId($data);

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



}
