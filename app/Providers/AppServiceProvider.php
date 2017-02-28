<?php

namespace App\Providers;


//use App\Global;


use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public $nombre_usuario;
    public $apellidos_usuario;
    public $email_usuarios;
    public $foto_usuario;
    //public $oAuth;

    public function __construct(){
      //$this->oGlobal -> new Global();

      //$this->nombre_usuario = Auth::user()->name    ;
      $this->apellidos_usuario = "Manuel";
      $this->email_usuarios = "Manuel";
      $this->foto_usuario = "Manuel";
    }

    public function boot()
    {

      //$instancia = new Global();

        view()->composer('*', function($view) {
             $view->with([
                'nombre_usuario' => $this->nombre_usuario,
                'apellidos_usuario' => $this->apellidos_usuario,
                'email_usuarios' => $this->email_usuarios,
                'foto_usuario' => $this->foto_usuario
             ]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
