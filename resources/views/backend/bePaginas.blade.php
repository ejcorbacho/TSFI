@extends('layouts.backend')

@section('content')
<link href="{{ asset('css/tinymce.css') }}" rel="stylesheet" type="text/css">

<!-- Càrrega d'arxius -->
<script type="text/javascript" src="{{ asset('js/dropzone/dropzone.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/backend/dropzoneConfig.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/dropzone/dropzone.css') }}">
<link rel="stylesheet" href="{{ asset('css/image-picker/image-picker.css') }}">

<script src="{{ asset('js/tinymce/tinymce/tinymce.dev.js') }}"></script>
<script src="{{ asset('js/tinymceConfig.js') }}"></script>

<!-- Image gallery -->
<script src="{{ asset('js/image-picker/image-picker.js') }}"></script>
<script src="{{ asset('js/backend/imageGallery.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/imageGallery.css') }}">

<!-- Paginacio -->
<script src="{{ asset('js/bootpag/bootpag.js') }}"></script>

<script src="{{ asset('js/PaginasScript.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/bePaginas.css') }}">

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Gestió de pàgines
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Pàgines</a></li>
    <li class="active">Gestió de pàgines</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12 col-lg-9">
      <form id="formulario_entrada">
        <!-- general form elements -->
        <input name="idBD" value="@if (!empty($data[0]->titulo)) {{ $data[0]->id }} @else {{ '0' }} @endif" id="idBD" type="hidden" />
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">*TITOL I *SUBTITOL</h3>
            <div>&nbspcaracters</div>
            <div id="notificaciones_subtitulo"></div>
            <div>&nbspcaracters&nbsp<b>· Subtitol:&nbsp</b></div>
            <div id="notificaciones_titulo"></div>
            <div><b>Titol:&nbsp</b></div>
          </div>
          <div class="box-body">

            <div class="form-group">

              <input type="text" name="titulo" value="@if (!empty($data[0]->titulo)) {{ $data[0]->titulo }} @endif" id="titulo" class="form-control" placeholder="Introdueix el titol" onkeyup="validarFormulario()" />

            </div>
            <div class="form-group">

              <input type="text" name="subtitulo" value="@if (!empty($data[0]->subtitulo)) {{ $data[0]->subtitulo  }} @endif" id="subtitulo" class="form-control" placeholder="Introdueix el subtitol" onkeyup="validarFormulario()" />
            </div>
          </div>

        </div>


        <!-- INICIO CAJA CONTINGUT  -->

        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">*CONTINGUT</h3>
            <div id="notificaciones_contenido"></div>
          </div>

          <div class="box-body pad">

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#imageInsertionModal">
              Inserir imatges
            </button>
            <textarea name="contingut" id="contingut" onkeyup="validarFormulario()" onchange="validarFormulario()">@if(!empty($data[0]->contenido)){{$data[0]->contenido}}@endif</textarea>
          </div>
        </div>

        <!-- FIN CAJA CONTINGUT -->

      </div>

      <!-- INICI PUBLICACIO -->

      <div class="col-md-12 col-lg-3">
        <div class="example-modal">
          <div class="modal-content box">
            <div class="modal-header">
              <div class="box-header">
                <h4 class="modal-title">PUBLICACIO</h4>
              </div>

              <hr />

              <button type="submit" value="Guardar" class="btn btn-primary pull-right" />Guardar i publicar</button>
            </div>
          </div>
        </div>
      </div>


      <!-- FI publicacio-->


      <div class="col-md-12 col-lg-3">
        <div class="example-modal">
          <div class="modal-content box">
            <div class="modal-header">
              <h4 class="modal-title">Imatge</h4>
            </div>
            <div class="modal-body">
              <div class="form-group ">
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

            </div>
          </div>
        </div>



      </form>
    </section>

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
@endsection
