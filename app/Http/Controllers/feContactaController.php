<?php

namespace App\Http\Controllers;

use App\feEntitats;
use App\Paginas;
use App\feCategories;
use App\Notificaciones;
use App\feHome;
use App\Contacta;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;


class feContactaController extends Controller {

    private $ocategories;
    private $opaginashome;
    private $ocontacta;
    private $mnotificaciones;

    public function __construct()
    {
      $this->ocategories = new feCategories;
      $this->opaginashome = new Paginas;
      $this->ocontacta = new Contacta;
      $this->mnotificaciones = new Notificaciones;

    }


    public function mostrarpagina() {

        $categories = $this->ocategories->llegirTotes();
        $paginas = $this->opaginashome->llegirTotes();

        return view('frontend.feformularioContacta',['paginas'=>$paginas, 'categories'=>$categories]);
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

      public function guardarContacta() {



          $this->ocontacta->titulo = Input::get('titulo');
          $this->ocontacta->contenido = Input::get('contingut');
          $this->ocontacta->nom = Input::get('nom');
          $this->ocontacta->email = Input::get('email');

          $titulo = Input::get('titulo');
          $nombre = Input::get('nom');

          $asunto = 'Nova entrada rebuda!';
          $contenido = 'Hola ' . $nombre . '! Hem rebut la seva consulta sobre ' . $titulo . '. La contestarem en el menor temps possible. Gràcies! <br /> Aquest es un correu automàtic, si us plau, no el contestis.';

          $destinatario = Input::get('email');

          if ($this->ocontacta->guardarfe()=='-1'){
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

            return view('frontend.feagradecimento',['paginas'=>$paginas, 'categories'=>$categories]);
          };
      }


}
