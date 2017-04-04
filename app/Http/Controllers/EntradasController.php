<?php

namespace App\Http\Controllers;
use App\Categories;
use App\Entradas;
use App\beEtiquetas;
use App\beEntitats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use View;


class EntradasController extends Controller
{
  private $mentradas; //* MODEL ENTRADAS **/
  private $ocategorias;
  private $categorias;
  private $etiquetas;
  private $oetiquetas;
  private $cImages;

  private $mentitats; //* MODELO ENTITATS **/

  public function __construct()
  {
    $this->middleware('auth');
    $this->mentradas = new Entradas;
    $this->ocategorias = new Categories;
    $this->oetiquetas = new beEtiquetas;
    $this->cImages = new beImageController;
    $this->mentitats = new beEntitats;
  }

  //Mostrar formulario para crear client
  public function makeEntrada()
  {
      $categorias = $this->categoriaMarcada('-1');
    $etiquetas = $this->etiquetaMarcada('-1');
    $entitats = $this->entidadMarcada('-1');

    return view('backend.Entradas',['categorias'=>$categorias, 'etiquetas'=>$etiquetas, 'entitats'=>$entitats]);
  }

  //Guardar datos del formulario en la BD
  public function crearEntrada()
  {
      /* TRATAMOS LA ID DEL POST */

      $idPostBd = Input::get('idBD');
      $this->mentradas->id = Input::get('idBD');

      /* TRATAMOS EL CONTENIDO DEL POST */

      $this->mentradas->titulo = Input::get('titulo');
      $this->mentradas->subtitulo = Input::get('subtitulo');
      $this->mentradas->resumen_largo = Input::get('resum');
      $this->mentradas->contenido = Input::get('contingut');

      /* TRATAMOS DATOS DE ARRAYS */

      $this->mentradas->categorias = Input::get('categorias_seleccionadas');
      $this->mentradas->entidades = Input::get('entitats_seleccionadas');
      $this->mentradas->etiquetas = Input::get('etiquetas_seleccionadas');
      /* TRATAMOS DATOS DE LA IMAGEN */

      $this->mentradas->imagen = Input::get('mainImage');

      /* TRATAMOS DATOS DE PUBLICACION */

      $fecha = Input::get('data_publicacion');
      $fecha = date("Y-m-d", strtotime($fecha));
      $this->mentradas->data_publicacion = $fecha;

      if(Input::get('visible') == null)
      {
        $this->mentradas->visible = 0;
      } else {
        $this->mentradas->visible = Input::get('visible');
      }

      $this->mentradas->publico = Input::get('publico');
      $this->mentradas->prioritat = Input::get('prioritat');

      /* TRATAR DATOS DE EVENTOS */
      if(Input::get('evento_activo') == null)
      {
        $this->mentradas->evento = 0;
      } else {
        $this->mentradas->evento = Input::get('evento_activo');
      }

      $fechas = Input::get('evento');
      $fecha1 = substr($fechas, 0, strpos($fechas, '-'));
      $fecha2 = substr($fechas, strpos($fechas, '-')+1, strlen($fechas));
      $fecha1 = date("Y-m-d", strtotime($fecha1));
      $fecha2 = date("Y-m-d", strtotime($fecha2));
      $this->mentradas->fecha1 = $fecha1;
      $this->mentradas->fecha2 = $fecha2;

      $this->mentradas->localizacion = Input::get('localizacion');

      if($idPostBd == 0){
          $request = $this->mentradas->guardar();
          if($request == '-1'){
            abort(500);
          } else {
            return $request;
          }
      } else {
          $request = $this->mentradas->actualizar();
          if($request == '-1'){
            abort(500);
          } else {
            return $request;
          }
      }


  }

  //comprobar si una etiqueta esta marcada o no
  public function etiquetaMarcada($id){
     $todasEtiquetas = $this->oetiquetas->llistarTotes()->toArray();
     $etiquetasMarcadas = $this->mentradas->leerEtiquetasMarcadas($id);

     $AEtiquetasMarcadas = array();
     $etiquetasConMarcado = array();

     foreach ($etiquetasMarcadas as $value) $AEtiquetasMarcadas[] = $value->id;

     for($i=0; $i < count($todasEtiquetas); $i++){
       $etiquetasConMarcado[$i]['id'] = $todasEtiquetas[$i]->id;
       $etiquetasConMarcado[$i]['nombre'] = $todasEtiquetas[$i]->nombre;

       $etiquetasConMarcado[$i]['seleccionado'] = in_array($todasEtiquetas[$i]->id, $AEtiquetasMarcadas);

     }

     return $etiquetasConMarcado;
  }

  //comprobar si una entidad esta marcada o no
  public function entidadMarcada($id){
     $todasEntidades = $this->mentitats->llistarTotesEntitats()->toArray();
     $entidadesMarcadas = $this->mentradas->leerEntidadesMarcadas($id);

     $AEntidadesMarcadas = array();
     $entidadesConMarcado = array();

     foreach ($entidadesMarcadas as $value) $AEntidadesMarcadas[] = $value->id;

     for($i=0; $i < count($todasEntidades); $i++){
       $entidadesConMarcado[$i]['id'] = $todasEntidades[$i]->id;
       $entidadesConMarcado[$i]['nombre'] = $todasEntidades[$i]->nombre;

       $entidadesConMarcado[$i]['seleccionado'] = in_array($todasEntidades[$i]->id, $AEntidadesMarcadas);

     }


     return $entidadesConMarcado;
  }

  //comprobar si una categoria esta marcada o no
  public function categoriaMarcada($id){
     $todasCategorias = $this->ocategorias->llistarTotes()->toArray();
     $categoriasMarcadas = $this->mentradas->leerEntidadesMarcadas($id);

     $ACategoriasMarcadas = array();
     $categoriasConMarcado = array();
     foreach ($categoriasMarcadas as $value) $ACategoriasMarcadas[] = $value->id;

     for($i=0; $i < count($todasCategorias); $i++){
       $categoriasConMarcado[$i]['id'] = $todasCategorias[$i]->id;
       $categoriasConMarcado[$i]['nombre'] = $todasCategorias[$i]->nombre;

       $categoriasConMarcado[$i]['seleccionado'] = in_array($todasCategorias[$i]->id, $ACategoriasMarcadas);

     }

     return $categoriasConMarcado;
  }

//Listar los clientes guardados en la BD
  public function editarEntrada($id)
  {

    $this->mentradas->id = $id;
    $entradas = $this->mentradas->leerContenido();

    $categorias = $this->categoriaMarcada($id);
    $etiquetas = $this->etiquetaMarcada($id);
    $entitats = $this->entidadMarcada($id);
    if(!is_null($entradas[0]->foto)){
      $foto = $this->cImages->getOneImge($entradas[0]->foto);
    } else {
      $foto = NULL;
    }

    return view('backend.Entradas',['data'=>$entradas, 'categorias'=>$categorias, 'etiquetas'=>$etiquetas, 'entitats'=>$entitats, 'foto'=>$foto]);
  }
  public function recargarListadoEtiquetas(){
    $id_entrada = Input::get('id');
    $etiquetas = $this->etiquetaMarcada($id_entrada);

    $html = "";

    for($i=0; $i < count($etiquetas); $i++){
      $html = $html . '<option ';
      if($etiquetas[$i]['seleccionado']){ $html = $html . 'selected '; };
      $html = $html . 'value="' . $etiquetas[$i]['id'] . '">' . $etiquetas[$i]['nombre'] . '</option>';
    }
    return $html;
  }
  //Listar las entradas guardados en la BD
  public function llistarEntradas()
  {
    $entradas = $this->mentradas->leerTodas();
    return view('backend.beTotesEntrades',['data'=> $entradas]);
  }
}
