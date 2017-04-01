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
        Afegir Entitat
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Categoria</a></li>
        <li class="active">Nova Entiat</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-primary">
        </h1>
        <!--<div class="box-header with-border">
          <h3 class="box-title">Quick Example</h3>
        </div>-->
        <!-- /.box-header -->
        <!-- form start -->
        <form id="formulariNovaEntitat">
            <div class="box-body">
                <div class="form-group">
                    <label>Nom de l'entitat</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Inserta el nom de l'entitat" required>
                </div>
                <div class="form-group">
                    <label>Url de l'entitat</label>
                    <input type="text" class="form-control" id="url" name="url" placeholder="Inserta la URL de l'entitat" required>
                </div>
                
                <div class="checkbox">
                    <label><input id="colab" type="checkbox" name="colab">Son Colaboradors</label>
                </div>

                <!-- /.box-body -->
                <input id="mainImageInput" name="mainImage" type="hidden">
                <a href="javascript:void(0);" data-toggle="modal" data-target="#imageSelectionModal">
                    <div id="mainImage">
                        @if (!empty($data[0]->foto)) {
                        !!html_entity_decode('<img class="image_picker_image" src="\TSFI\public\uploads\8A39.jpg" alt="1milTARJETAredondoBRILLOchento01" width="200"></div>'
                    )!!} @endif
            </div>
            </a>
            <a type="button" class="btn" data-toggle="modal" data-target="#imageSelectionModal">
                + Editar imatge d'entitat
            </a>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Desar</button>
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