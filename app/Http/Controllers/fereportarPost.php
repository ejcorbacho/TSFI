<?php

namespace App\Http\Controllers;

use App\feEntitats;
use App\Paginas;
use App\feCategories;
use App\Notificaciones;
use App\feHome;
use App\ReportarPost;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;


class fereportarPost extends Controller {

    private $ocategories;
    private $opaginashome;
    private $ocontacta;
    private $mnotificaciones;
    private $oentradas;

    public function __construct()
    {
      $this->ocategories = new feCategories;
      $this->opaginashome = new Paginas;
      $this->oreporte = new ReportarPost;
      $this->mnotificaciones = new Notificaciones;
      $this->oentitats = new feEntitats;

    }


    public function mostrarCaptcha($id_post) {

        $categories = $this->ocategories->llegirTotes();
        $paginas = $this->opaginashome->llegirTotes();
        $entitats = $entitats = $this->oentitats->LlistaFooterEntitats();

        return view('frontend.fecaptchaReportar',['paginas'=>$paginas, 'categories'=>$categories, 'id_post'=>$id_post, 'entitats'=>$entitats]);
    }

    public function informarReporte() {

        $categories = $this->ocategories->llegirTotes();
        $paginas = $this->opaginashome->llegirTotes();
        $entitats = $entitats = $this->oentitats->LlistaFooterEntitats();
        $id_post = Input::get('id_post');

        return view('frontend.feinformarReporte',['paginas'=>$paginas, 'categories'=>$categories, 'id_post'=>$id_post, 'entitats'=>$entitats]);
    }

    public function enviarMail($asunto, $contenido, $destinatario){

      //cabecera
      $headers = "MIME-Version: 1.0\r\n";
      $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
      //dirección del remitente
      $headers .= "From: TSFI < TSFI.no_reply >\r\n";
      //Enviamos el mensaje a tu_dirección_email
      $enviado = true; /*mail($destinatario,$asunto,$contenido,$headers);*/

      return $enviado;

    }

      public function guardarReport() {

          $this->oreporte->titulo = '@reportePost';
          $this->oreporte->contenido = Input::get('contingut');
          $this->oreporte->nom = Input::get('nom');
          $this->oreporte->email = Input::get('email');
          $this->oreporte->id = Input::get('id_post');

          $entitats = $entitats = $this->oentitats->LlistaFooterEntitats();
          $titulo = Input::get('titulo');
          $nombre = Input::get('nom');

          $asunto = 'Nova entrada rebuda!';
          $contenido = 'Hola ' . $nombre . '! Hem rebut la seva consulta sobre ' . $titulo . '. La contestarem en el menor temps possible. Gràcies! <br /> Aquest es un correu automàtic, si us plau, no el contestis.';

          $destinatario = Input::get('email');

          if ($this->oreporte->guardarfe()=='-1'){
            $categories = $this->ocategories->llegirTotes();
            $paginas = $this->opaginashome->llegirTotes();
            return view('frontend.feerror',['paginas'=>$paginas, 'categories'=>$categories]);
          } else {
            $categories = $this->ocategories->llegirTotes();
            $paginas = $this->opaginashome->llegirTotes();
            $this->enviarMail($asunto, $contenido, $destinatario);

            $administradores = $this->mnotificaciones->leerAdministradores();
            foreach($administradores as $admnistrador){
              $this->enviarMail('Nou contacte!', 'Han contactat mitjançant la pàgina web!', $admnistrador->email);
            }

            return view('frontend.feagradecimento',['paginas'=>$paginas, 'categories'=>$categories, 'entitats'=>$entitats]);
          };
      }


}
