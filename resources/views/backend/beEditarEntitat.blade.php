@extends('layouts.backend')

@section('content')
<script src="{{asset('js/backend/beEntitats.js')}}"></script>

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

<!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Editar Entitat
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i>Entitat</a></li>
          <li class="active">Editar Entitat</li>
        </ol>
      </section>

        <!-- Main content -->
        <section class="content">
            <div class="box box-primary">
                <!-- form start -->
                <form id="formulariEditarEntitat">
                    <div class="box-body">
                        <div class="form-group">
                        <input type="hidden" class="form-control" id="id" name="id" value="{{ $data[0]->id }}">

                        <label>Nom de la categoria</label>

                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Inserta el nom de l'entitat" value="@if (!empty($data[0]->nombre)){{$data[0]->nombre}}@endif">

                        <div class="form-group">
                            <label>Url de l'entitat</label>
                            <input type="text" class="form-control" id="url" name="url" placeholder="Inserta la URL de l'entitat" required value="@if (!empty($data[0]->url)){{$data[0]->url}}@endif">
                        </div>

                        <div class="checkbox">
                            <label><input id="colab" type="checkbox" name="colab" value="@if (!empty($data[0]->son_colaboradoras)){{$data[0]->son_colaboradoras}}@endif">Son Colaboradors</label>
                        </div>

                        <!-- /.box-body -->
                        <input id="mainImageInput" name="mainImage" type="hidden" value="@if (!empty($data[0]->foto)){{$data[0]->foto}}@endif">
                        <a href="javascript:void(0);" data-toggle="modal" data-target="#imageSelectionModal">
                            <div id="mainImage">
                                @if (!empty($data[0]->fotoId))<img src="{{$data[0]->fotoUrl}}" alt="{{$data[0]->fotoAlt}}" width="200"> @endif
                            </div>
                        </a>
                        <a type="button" class="btn" data-toggle="modal" data-target="#imageSelectionModal">
                            + Editar imatge d'entitat
                        </a>
                        </div>

                        <div class="box-footer">
                        <button id="submitEditEntitat" type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </section>

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
