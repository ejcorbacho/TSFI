@extends('layouts.backend')

@section('content')
<link href="{{ asset('css/tinymce.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{ asset('css/sol.css') }}">
<link rel="stylesheet" href="{{ asset('css/beEntradas.css') }}">
<!-- bootstrap datepicker -->
<script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">


<script type="text/javascript" src="{{ asset('js/dropzone/dropzone.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/backend/dropzoneConfig.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/dropzone/dropzone.css') }}">

<script type="text/javascript" src="{{ asset('js/sol.js') }}"></script>
<script src="{{ asset('js/tinymce/tinymce/tinymce.dev.js') }}"></script>
<script src="{{ asset('js/tinymceConfig.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/EntradasScript.js') }}"></script>

<div class="container">
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
  		<div class="col-md-9">
        <form id="formulario_entrada">
          <!-- general form elements -->
            <input name="idBD" value="@if (!empty($data[0]->titulo)) {{ $data[0]->id }} @else {{ '0' }} @endif" id="idBD" type="hidden" value='0' />
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">TITOL I SUBTITOL</h3>
                <div>&nbspcaracters</div>
                <div id="notificaciones_subtitulo"></div>
                <div>&nbspcaracters&nbsp<b>· Subtitol:&nbsp</b></div>
                <div id="notificaciones_titulo"></div>
                <div><b>Titol:&nbsp</b></div>
              </div>
                <div class="box-body">

  				<div class="form-group">

                      <input type="text" name="titulo" value="@if (!empty($data[0]->titulo)) {{ $data[0]->titulo }} @endif" id="titulo" class="form-control" placeholder="Introdueix el titol" onkeyup="validarEnviar()" />

                  </div>
  				<div class="form-group">

                    <input type="text" name="subtitulo" value="@if (!empty($data[0]->subtitulo)) {{ $data[0]->subtitulo  }} @endif" id="subtitulo" class="form-control" placeholder="Introdueix el subtitol" onkeyup="validarEnviar()" />
                  </div>
                </div>

            </div>

        <!-- INICIO CAJA TWIITER -->

          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">TWITTER</h3>
              <div>&nbspcaracters</div>
              <div id="notificaciones_twitter"></div>
              <div><b>Twitter:&nbsp</b></div>
            </div>

            <div class="box-body pad">
              <textarea name="twitter" id="twitter" onkeyup="validarEnviar()" onchange="validarEnviar()">@if (!empty($data[0]->resumen_corto)) {{ $data[0]->resumen_corto  }} @endif</textarea> <br /><br />
              <button class="btn btn-primary">Tweet</button>
            </div>
          </div>

        <!-- FIN CAJA TWITTER -->

        <!-- INICIO CAJA RESUM llarg  -->

          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">RESUM</h3>
              <div>&nbspcaracters</div>
              <div id="notificaciones_resumen"></div>
              <div><b>Resum:&nbsp</b></div>
            </div>

            <div class="box-body pad">
              <textarea name="resum" id="resum" onkeyup="validarEnviar()" onchange="validarEnviar()"> @if (!empty($data[0]->resumen_largo)) {{ $data[0]->resumen_largo  }} @endif </textarea>
            </div>
          </div>

        <!-- FIN CAJA RESUM llarg -->
        <!-- INICIO CAJA CONTINGUT  -->

          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">CONTINGUT</h3>
              <div id="notificaciones_contenido"></div>
            </div>

            <div class="box-body pad">

              <button class="btn btn-primary">Imatges</button><br /><br />
              <textarea name="contingut" id="contingut" onkeyup="validarEnviar()" onchange="validarEnviar()">@if (!empty($data[0]->contenido)) {{ $data[0]->contenido }} @endif</textarea>
            </div>
          </div>

        <!-- FIN CAJA CONTINGUT -->

        </div>

        <!-- INICI PUBLICACIO -->
        <div class="col-md-3">
        	<div class="example-modal">
        		<div class="modal-content box">
        			<div class="modal-header">
        				<div class="box-header">
        					<h4 class="modal-title">PUBLICACIO</h4>
        				</div>
        				<center class="selector_publicado">
        					<b>OCULT</b>
        					<label class="switch">
        						<input id="visible" name="visible" value="1"  type="checkbox" @if (!empty($data[0]->visible)) {{ "checked='checked'"  }} @endif onchange="habilitarFechas()">
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
        				<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Vista previa</button>
        				<button type="submit" value="Guardar" class="btn btn-primary pull-right" />Guardar</button>
        			</div>
        		</div>
        	</div>
        </div>


          <!-- FI publicacio-->

          <div class="col-md-3">
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
                        <div id="dropdown_list_categorias" class="dropdown-list" style="display: none;">
                            <input  id="dropdown_search_categorias" type="search" placeholder="Cerca categories" class="dropdown-search"/>
                            <ul>
                              @foreach($categoriesSensePare as $categoria)
                                <li >
                                  <input name="categorias_seleccionadas[]" value="{{$categoria->id}}" type="checkbox">
                                  <label for="nombre">{{$categoria->nombre}}</label>
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

  	  <div class="col-md-3">
  		<div class="example-modal">
              <div class="modal-content box">
                <div class="modal-header">
                  <h4 class="modal-title">Etiquetes</h4>
  			  </div>
  			  <div  class="modal-body">
            <div id="dropdown_etiquetas" class="dropdown-container">
                <div id="dropdown_button_etiquetas" class="dropdown-button noselect">
                    <div class="dropdown-label"><input type="search" id="dropdown_search_etiquetes" autocomplete="off" placeholder="Cerca etiquetes" class="dropdown-search"/></div>
                </div>
                <div id="dropdown_list_etiquetas" class="dropdown-list" style="display: none;">

                    <ul >
                      @foreach($etiquetas as $etiqueta)
                        <li >
                          <input name="etiquetas_seleccionadas[]" value="{{$etiqueta->id}}" type="checkbox">
                          <label for="nombre">{{$etiqueta->nombre}}</label>
                        </li>
                      @endforeach

                    </ul>
                </div>
            </div>
            <hr />

  			  </div>

              </div>
  	    </div>
        </div>
  	<!-- END ETIQUETAS-->
  		  <div class="col-md-3">
  		<div class="example-modal">
              <div class="modal-content box">
                <div class="modal-header">
                  <h4 class="modal-title">Imatge</h4>
  			  </div>
  			  <div class="modal-body">
  				<div class="form-group ">
  					<a type="button" class="btn">+ Afegir imatge destacada</a>
  				</div>
  			  </div>
              </div>
  	    </div>
        </div>

        <!-- FECHAS EVENTOS -->
<div class="col-md-3">
  <div class="example-modal">
    <div class="modal-content box">
      <div class="modal-header">
        <h4 class="modal-title">Esdeveniment</h4>
      </div>
      <div class="modal-body">
        <div class="form-group ">
          <a type="button" class="btn">+ Afegir imatge destacada</a>
        </div>
      </div>
    </div>
  </div>
</div>
      </form>

      <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#uploadsModal">
        Imatges
      </button>

  	<!-- END IMATGE-->
      <!-- ./row -->
      </section>
      <!-- /.content -->
    </div>


    <!-- IMAGE UPLOADING MODAL -->
    <div class="modal fade" id="uploadsModal" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Modal title</h4>
          </div>
          <div class="modal-body">
            <form action="/TSFI/public/administracio/uploadFile" class="dropzone" id="dropzone-upload">
              <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- END IMAGE UPLOADING MODAL -->
   <img id="adsffsfsa" src="C:\wamp64\www\TSFI\public\uploads\409A.jpg">

</div>
@endsection
