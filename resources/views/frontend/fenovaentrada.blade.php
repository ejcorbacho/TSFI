@extends('layouts.frontend')

@section('content')

<!-- FUNCIONES  VALIDACION -->
<script type="text/javascript" src="{{ asset('js/frontend/feEntradas.js') }}"></script>
<link href="{{ asset('css/feFormularios.css') }}" rel="stylesheet" type="text/css">

<!-- CAPTCHA -->
<script src='https://www.google.com/recaptcha/api.js'></script>

<!-- Càrrega d'arxius -->
<script type="text/javascript" src="{{ asset('js/dropzone/dropzone.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/backend/dropzoneConfig.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/dropzone/dropzone.css') }}">
<link rel="stylesheet" href="{{ asset('css/image-picker/image-picker.css') }}">

<!-- Image gallery -->
<script src="{{ asset('js/image-picker/image-picker.js') }}"></script>
<script src="{{ asset('js/backend/imageGallery.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/imageGallery.css') }}">

<!-- Paginacio -->
<script src="{{ asset('js/bootpag/bootpag.js') }}"></script>

<!-- TINY -->
<link href="{{ asset('css/tinymce.css') }}" rel="stylesheet" type="text/css">
<script src="{{ asset('js/tinymce/tinymce/tinymce.dev.js') }}"></script>
<script src="{{ asset('js/tinymceConfig.js') }}"></script>

<body>
  <div class="col-md-12">
    <div class="row titulo">
      <div class="col-md-12">
        <h1>Nova entrada</h1>
      </div>
      <div class="col-md-12">
        <hr />
      </div>
    </div>

    <div class="row contenido">
      <div class="col-md-1"></div>
      <div class="col-md-10">
        <p>
          En el següent formulari pots indicar tota la informació en els diferents camps de text. <br />
          Agraïm que la informació s’indiqui d’una forma clara i estructural, encara que no t’amoïnis, ja que realitzarem una validació de l’entrada abans de publicar-la a la web.
        </p>
      </div>
      <div class="col-md-1"></div>
    </div>
    <hr />

    <div class="row formulario_nova_entrada">
      <div class="col-md-1"></div>
      <div class="col-md-10">
        <form method="POST" action="{{url('/entradaGuardada')}}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="row">
            <div class="col-md-6">
              <h5>INDICA EL TEU NOM:</h5>
              <h6><div id="notificaciones_nom"></div></h6>
              <input type="text" name="nom" id="nom" class="form-control" placeholder="Introdueix el nom" onkeyup="validarFormulario()" />
            </div>
            <div class="col-md-6">
              <h5>INDICA EL E-MAIL:</h5>
              <h6><div id="notificaciones_email"></div></h6>
              <input type="text" name="email" id="email" class="form-control" placeholder="Introdueix el email" onkeyup="validarFormulario()" />
            </div>
            <div class="col-md-6">
              <h5>TITOL:</h5>
              <h6><div id="notificaciones_titulo"></div></h6>
              <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Introdueix el titol" onkeyup="validarFormulario()" />
            </div>
            <div class="col-md-6">
              <h5>SUBTITOL:</h5>
              <h6><div id="notificaciones_subtitulo"></div></h6>
              <input type="text" name="subtitulo" id="subtitulo" class="form-control" placeholder="Introdueix el subtitol" onkeyup="validarFormulario()" />
            </div>
            <div class="col-md-8">
              <h5>RESUM:</h5>
              <h6><div id="notificaciones_resumen"></div></h6>
              <textarea name="resum" id="resum" style="width: 100%;" onkeyup="validarFormulario()" onchange="validarFormulario()"></textarea>
            </div>
            <div class="col-md-4">
              <h5>IMATGE PRINCIPAL:</h5>
              <br /><br />
              <input id="mainImageInput" name="mainImage" type="hidden">
              <a href="javascript:void(0);" data-toggle="modal" data-target="#imageSelectionModal">
                <div id="mainImage">
                  @if (!empty($data[0]->foto))<img class="image_picker_image" src="{{$foto[0]->url}}" alt="{{$foto[0]->alt}}" width="200"> @endif
                </div>
              </a>
              <a type="button" class="btn" data-toggle="modal" data-target="#imageSelectionModal">
                  + Editar imatge destacada
              </a>
            </div>
            <div class="col-md-12">
              <h5>CONTINGUT:</h5>
              <h6><div id="notificaciones_contenido"></div></h6>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#imageInsertionModal">
                  Inserir imatges
              </button>
              <textarea name="contingut" id="contingut" onkeyup="validarFormulario()" onchange="validarFormulario()"></textarea>
            </div>
            <div class="col-md-12">
              <center><button type="submit" value="Guardar" class="btn btn-primary" />Enviar</button></center>
            </div>

          </div>
        </form>
      </div>
      <div class="col-md-1"></div>
    </div>
  </div>
</body>


<!-- START IMAGE INSERTION MODAL -->
    <div class="modal fade" id="imageInsertionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        Gestió d'imatges
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="tabbable">
                        <ul class="nav nav-tabs" data-tabs="tabs">
                            <li id="tab1" class="active mytabs">
                                <a href="#imageInsertionTabOne" data-toggle="tab">
                                    Biblioteca
                                </a>
                            </li>
                            <li id="tab2" class="mytabs">
                                <a href="#imageInsertionTabTwo" data-toggle="tab">
                                    Pujar imatges
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="imageInsertionTabOne">
                                <div class="picker insertion">
                                    <select id="imageInsertionSelector" class="image-picker" multiple="multiple"></select>
                                </div>
                                <p id="imageInsertionGallery" style="text-align:center">

                                </p>
                            </div>
                            <div class="tab-pane" id="imageInsertionTabTwo">
                                <form class="dropzone" id="imageInsertionUpload">
                                    <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tancar</button>
                    <button id="insertImages" type="button" class="btn btn-primary">Inserir seleccionats</button>
                </div>
            </div>
        </div>
    </div>
<!-- END IMAGE INSERTION MODAL -->

<!-- START IMAGE SELECTION MODAL -->
    <div class="modal fade" id="imageSelectionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        Gestió d'imatges
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="tabbable">
                        <ul class="nav nav-tabs" data-tabs="tabs">
                            <li id="tab1" class="active mytabs">
                                <a href="#imageSelectionTabOne" data-toggle="tab">
                                    Biblioteca
                                </a>
                            </li>
                            <li id="tab2" class="mytabs">
                                <a href="#imageSelectionTabTwo" data-toggle="tab">
                                    Pujar imatges
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="imageSelectionTabOne">
                                <div class="picker selection">
                                    <select id="imageSelectionSelector" class="image-insertion"></select>
                                </div>
                                <p id="imageSelectionGallery" style="text-align:center">

                                </p>
                            </div>
                            <div class="tab-pane" id="imageSelectionTabTwo">
                                <form class="dropzone" id="imageSelectionUpload">
                                    <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tancar</button>
                    <button id="setImage" type="button" class="btn btn-primary">Desar</button>
                </div>
            </div>
        </div>
    </div>
<!-- END IMAGE SELECTION MODAL -->





        </div>

        <!-- FECHAS EVENTOS -->


</div>
@endsection
