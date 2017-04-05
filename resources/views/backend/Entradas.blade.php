@extends('layouts.backend')

@section('content')
<link href="{{ asset('css/tinymce.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{ asset('css/sol.css') }}">
<link rel="stylesheet" href="{{ asset('css/beEntradas.css') }}">
<link rel="stylesheet" href="{{ asset('css/chosen.css') }}">
<!-- bootstrap datepicker -->
<script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">


<script src="{{ asset('plugins/daterangepicker/moment.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">

<!-- Càrrega d'arxius -->
<script type="text/javascript" src="{{ asset('js/dropzone/dropzone.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/backend/dropzoneConfig.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/dropzone/dropzone.css') }}">
<link rel="stylesheet" href="{{ asset('css/image-picker/image-picker.css') }}">

<script src="{{ asset('js/chosen.jquery.js') }}" type="text/javascript"></script>

<script type="text/javascript" src="{{ asset('js/sol.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/EntradasScript.js') }}"></script>
<script src="{{ asset('js/tinymce/tinymce/tinymce.dev.js') }}"></script>
<script src="{{ asset('js/tinymceConfig.js') }}"></script>

<!-- Image gallery -->
<script src="{{ asset('js/image-picker/image-picker.js') }}"></script>
<script src="{{ asset('js/backend/imageGallery.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/imageGallery.css') }}">

<!-- Paginacio -->
<script src="{{ asset('js/bootpag/bootpag.js') }}"></script>

<link rel="stylesheet" href="{{ asset('css/backend/resources.css') }}">
<script src="{{ asset('/js/backend/resources.js') }}"></script>
<!-- Recursos -->
<div class="">
      <!-- Main content -->

      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Gestió d'entrades
        </h1>


        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Entrades</a></li>
          <li class="active">Gestió d'entrades</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
  		<div class="col-md-12 col-lg-9">
        <form id="formulario_entrada">
          <!-- general form elements -->
            <input name="idBD" value="@if (!empty($data[0]->titulo)) {{ $data[0]->id }} @else {{ '0' }} @endif" id="idBD" type="hidden"/>
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

        <!-- INICIO CAJA RESUM llarg  -->

          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">*RESUM</h3>
              <div>&nbspcaracters</div>
              <div id="notificaciones_resumen"></div>
              <div><b>Resum:&nbsp</b></div>
            </div>

            <div class="box-body pad">
              <textarea name="resum" id="resum" onkeyup="validarFormulario()" onchange="validarFormulario()">@if (!empty($data[0]->resumen_largo)) {{ $data[0]->resumen_largo  }} @endif</textarea>
            </div>
          </div>

          <!-- FIN CAJA RESUM llarg -->
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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#resourceSelectionModal">
                    Inserir recursos
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
        				<center class="selector_publicado">
        					<b>OCULT</b>
        					<label class="switch">
        						<input id="visible" name="visible" value="1"  type="checkbox" @if (!empty($data[0]->visible)) {{ "checked='checked'"  }} @endif onchange="intentoPublicar()">
        						<div class="slider round"></div>
        					</label>
        					<b>VISIBLE</b>
        				</center>
                <hr />
        				<div id="div_fecha_publicacion"><center>
                  <p><i class="fa fa-fw fa-calendar-times-o"></i><b>Data de publicació</b>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input name="data_publicacion" type="text" class="form-control pull-right" id="data_publicacion">
                    </div>
                  </p></center>
                  <hr />
                </div>

        				<center>
        					<p>
        						<i class="fa fa-fw fa-smile-o"></i><b>Public</b><br />
        						<select id="publico" name="publico">
        							<option  @if (empty($data[0]->publico)) {{ ""  }} @elseif ($data[0]->publico == '1') {{ "selected=selected"}} @endif  value="1">Alumnes</option>
        							<option  @if (empty($data[0]->publico)) {{ ""  }} @elseif ($data[0]->publico == '2') {{ "selected=selected"}} @endif value="2">Professors </option>
        							<option  @if (empty($data[0]->publico)) {{ "selected=selected"  }} @elseif ($data[0]->publico == '0') {{ "selected=selected"}} @endif  value="0"> Tots </option>
        						</select>
        					</p>
        				</center>
                <hr />
                <center>
                  <p>
                    <i class="fa fa-fw fa-arrows"></i><b>Prioritat</b><br />
                    <select id="prioritat" name="prioritat">
                      <option  @if (empty($data[0]->prioritat)) {{ ""  }} @elseif ($data[0]->prioritat == '1') {{ "selected=selected"}} @endif  value="1">Baixa</option>
                      <option  @if (empty($data[0]->prioritat)) {{ "selected=selected"  }} @elseif ($data[0]->prioritat == '5') {{ "selected=selected"}} @endif value="5">Mitja </option>
                      <option  @if (empty($data[0]->prioritat)) {{ ""  }} @elseif ($data[0]->prioritat == '10') {{ "selected=selected"}} @endif  value="10"> Alta </option>
                    </select>
                  </p>
                </center>
                <hr />
        				<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Vista previa</button>
        				<button type="submit" value="Guardar" class="btn btn-primary pull-right" />Guardar</button>
        			</div>
        		</div>
        	</div>
        </div>


          <!-- FI publicacio-->

          <div class="col-md-12 col-lg-3">
            <div class="example-modal">
              <div class="modal-content box collapsed-box ">
                <div class="modal-header">
                  <h4 class="modal-title">Categories</h4>
                </div>
                <div class="modal-body" style="margin-bottom: 5px;">
                  <div class="form-group ">



                    <div id="dropdown_categorias" class="dropdown-container">
                        <div id="dropdown_button_categorias" class="dropdown-button noselect">
                            <div class="dropdown-label">Selecciona categories</div>
                        </div>
                        <div id="dropdown_list_categorias" tabindex="-1" class="dropdown-list" style="display: none;">
                            <input  id="dropdown_search_categorias" type="search" placeholder="Cerca categories" class="dropdown-search"/>
                            <ul>
                              @foreach($categorias as $categoria)
                                <li >
                                  <input @if ($categoria['seleccionado'])) {{ 'checked'}} @endif name="categorias_seleccionadas[]" value="{{$categoria['id']}}" type="checkbox">
                                  <label for="nombre">{{$categoria['nombre']}}</label>
                                </li>
                              @endforeach
                            </ul>
                        </div>
                    </div>

                    <div>.</div>
                  </div>
                </div>

              </div>

            </div>
          </div>
  	<!-- END Categories -->
      <input type="hidden" value="" id="etiquetasNuevas" class="etiquetasNuevas" name="etiquetasNuevas" />
  	  <div class="col-md-12 col-lg-3">
  		<div class="example-modal">
              <div class="modal-content box">
                <div class="modal-header">
                    <h4 class="modal-title">Etiquetes<div class="boton_ayuda" onclick="notificarAyudaEtiquetas()">(?)</div></h4>
  			  </div>
  			  <div  class="modal-body">
            <div id="dropdown_etiquetas"  class="dropdown-container">

                <select name="etiquetas_seleccionadas[]" id="selector_etiquetas" data-placeholder="Introdueix tags aqui" multiple class="chosen-select" tabindex="8">
                  @foreach($etiquetas as $etiqueta)

                    <option @if ($etiqueta['seleccionado'])) {{ 'selected'}} @endif  value="{{$etiqueta['id']}}">{{$etiqueta['nombre']}}</option>


                  @endforeach

                </select>

            </div>
            <hr />

  			  </div>

              </div>
  	    </div>
        </div>
  	<!-- END ETIQUETAS-->
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


<!-- ***************** ESDEVENIMENTS *****************-->
<div class="modal-content box">
	<div class="modal-header">
		<h4 class="modal-title">
			Esdeveniment
			<label class="switch">
				<input id="evento_activo" name="evento_activo" value="1"  type="checkbox" @if (!empty($data[0]->esdeveniment)) {{ "checked='checked'"  }} @endif onchange="habilitarEvento()">
				<div class="slider round"></div>
			</label>
		</h4>
	</div>
	<div id="opciones_evento">

		<div class="modal-body">
			<center class="selector_publicado">
				<i class="fa fa-fw fa-calendar-times-o"></i><b>Data del esdeveniment</b>
				<div class="input-group date">
					<div class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</div>
  					<input type="text" class="form-control pull-right" name="evento" id="evento" value="@if(!empty($data[0]->fecha1)) {{date("m/d/Y", strtotime($data[0]->fecha1)) - date("m/d/Y", strtotime($data[0]->fecha2))}}@endif">
				</div>
			</center>
			<hr />
		</div>
		<div class="modal-body">
			<center class="selector_publicado">
				<i class="fa fa-fw fa-map-marker"></i><b>Localització</b>
				<input type="text" name="localizacion" value="@if (!empty($data[0]->localizacion)) {{ $data[0]->localizacion }} @endif" id="localizacion" class="form-control" placeholder="Introdueix la localitzacio" />
			</center>
			<hr />
		</div>
	</div>
</div>
<!-- ***************** ENTITATS... ****************** -->
<div class="col-md-12 col-lg-3">
  <div class="example-modal">
    <div class="modal-content box">
      <div class="modal-header">
        <h4 class="modal-title">Entitats</h4>
      </div>
      <div class="modal-body">
        <div class="modal-body">
          <div id="dropdown_entitats" class="dropdown-container">
              <div id="dropdown_button_entitats" class="dropdown-button noselect">
                  <div class="dropdown-label">Selecciona entitats</div>
              </div>
              <div id="dropdown_list_entitats" class="dropdown-list" style="display: none;">
                  <input  id="dropdown_search_entitats" type="search" placeholder="Cerca entitats" class="dropdown-search"/>
                  <ul>
                    @foreach($entitats as $entitat)

                      <li >
                        <input @if ($entitat['seleccionado'])) {{ 'checked'}} @endif name="entitats_seleccionadas[]" value="{{$entitat['id']}}" type="checkbox">
                        <label for="nombre">{{$entitat['nombre']}}</label>
                      </li>
                    @endforeach
                  </ul>
              </div>
          </div>
          <div>.</div>
			  </div>
      </div>
    </div>
  </div>
</div>
<!-- ***************** ...ENTITATS ****************** -->

      </form>

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

<!-- START RESOURCE SELECTION MODAL -->
    <div class="modal fade" id="resourceSelectionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        Gestió de recursos
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="tabbable">
                        <ul class="nav nav-tabs" data-tabs="tabs">
                            <li id="tab1" class="active mytabs">
                                <a href="#resourceSelectionTabOne" data-toggle="tab">
                                    Biblioteca
                                </a>
                            </li>
                            <li id="tab2" class="mytabs">
                                <a href="#resourceSelectionTabTwo" data-toggle="tab">
                                    Pujar recursos
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="resourceSelectionTabOne">
                                <div class="filemanager">
                                    <div class="search">
                                        <input type="search" placeholder="Cerca recursos..." />
                                    </div>

                                    <div class="breadcrumbs"></div>

                                    <ul class="data"></ul>

                                    <div class="nothingfound">
                                        <div class="nofiles"></div>
                                        <span>No s'han trobat recursos.</span>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane" id="resourceSelectionTabTwo">
                                <form class="dropzone" id="resourceSelectionUpload">
                                    <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tancar</button>
                    <button id="insertResource" type="button" class="btn btn-primary">Desar</button>
                </div>
            </div>
        </div>
    </div>
<!-- END RESOURCE SELECTION MODAL -->
</div>
@endsection
