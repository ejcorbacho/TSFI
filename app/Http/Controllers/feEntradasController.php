<?php

namespace App\Http\Controllers;

use App\feEntitats;
use App\feEntrades;
use App\Paginas;
use App\Notificaciones;
use App\feCategories;
use App\Entradas;
use App\feHome;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;


class feEntradasController extends Controller {

    private $ocategories;
    private $opaginashome;
    private $mentradas; //* MODEL ENTRADAS **/
    private $mnotificaciones;

    public function __construct()
    {
      $this->mentradas = new Entradas;
      $this->ocategories = new feCategories;
      $this->opaginashome = new Paginas;
      $this->mnotificaciones = new Notificaciones;
    }


    public function mostrarpagina() {

        $categories = $this->ocategories->llegirTotes();
        $paginas = $this->opaginashome->llegirTotes();

        return view('frontend.fecaptcha',['paginas'=>$paginas, 'categories'=>$categories]);
    }

    public function aceptarCaptcha() {


      $captcha = Input::get('g-recaptcha-response');

      if(isset($captcha)){
        if(!empty($captcha)){
          $categories = $this->ocategories->llegirTotes();
          $paginas = $this->opaginashome->llegirTotes();
          return view('frontend.fenovaentrada',['paginas'=>$paginas, 'categories'=>$categories]);
        } else {
          $categories = $this->ocategories->llegirTotes();
          $paginas = $this->opaginashome->llegirTotes();
          return view('frontend.fecaptcha',['paginas'=>$paginas, 'categories'=>$categories]);
        }
      } else {
        $categories = $this->ocategories->llegirTotes();
        $paginas = $this->opaginashome->llegirTotes();
        return view('frontend.fecaptcha',['paginas'=>$paginas, 'categories'=>$categories]);
      }


    }




      public function enviarMail($asunto, $contenido, $destinatario){

        //cabecera
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
        //dirección del remitente
        $headers .= "From: TSFI < TSFI.no_reply >\r\n";
        //Enviamos el mensaje a tu_dirección_email
        $enviado = mail($destinatario,$asunto,$contenido,$headers);

        return $enviado;

      }

      public function guardarEntrada() {

          $this->mentradas->titulo = Input::get('titulo');
          $this->mentradas->subtitulo = Input::get('subtitulo');
          $this->mentradas->resumen_largo = Input::get('resum');
          $this->mentradas->contenido = Input::get('contingut');
          $this->mentradas->nom = Input::get('nom');
          $this->mentradas->email = Input::get('email');

          $titulo = Input::get('titulo');
          $nombre = Input::get('nom');

          $asunto = 'Nova entrada rebuda!';
          $contenido = 'Hola ' . $nombre . '! Hem rebut la nova entrada ' . $titulo . ' correctament. Gràcies per col·laborar! <br /> Aquest es un correu automàtic, si us plau, no el contestis.';

          $destinatario = Input::get('email');

          if ($this->mentradas->guardarfe()=='-1'){
            $categories = $this->ocategories->llegirTotes();
            $paginas = $this->opaginashome->llegirTotes();
            return view('frontend.feerror',['paginas'=>$paginas, 'categories'=>$categories]);
          } else {
            $categories = $this->ocategories->llegirTotes();
            $paginas = $this->opaginashome->llegirTotes();
            $this->enviarMail($asunto, $contenido, $destinatario);

            $administradores = $this->mnotificaciones->leerAdministradores();
            foreach($administradores as $admnistrador){
              $this->enviarMail('Nova Entrada', 'Han enviat una nova entrada!', $admnistrador->email);
            }
            return view('frontend.feagradecimento',['paginas'=>$paginas, 'categories'=>$categories]);
          };
      }


}
