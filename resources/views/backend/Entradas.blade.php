@extends('layouts.backend')

@section('content')
<link href="{{ asset('css/tinymce.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{ asset('css/sol.css') }}">


<script type="text/javascript" src="{{ asset('js/dropzone/dropzone.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/backend/dropzoneConfig.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/dropzone/dropzone.css') }}">

<script type="text/javascript" src="{{ asset('js/sol.js') }}"></script>
<!--<script src="{{ asset('js/tinymce/tinymce/tinymce.dev.js') }}"></script>
<script src="{{ asset('js/tinymceConfig.js') }}"></script>-->
<script type="text/javascript" src="{{ asset('js/EntradasScript.js') }}"></script>

<div class="container">
      <!-- Main content -->

      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Entrada
        </h1>


        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Forms</a></li>
          <li class="active">Editors</li>
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
                <h3 class="box-title">Afegir nova entrada</h3>
              </div>
                <div class="box-body">

  				<div class="form-group">
                      <div id="notificaciones_titulo"></div>
                      <input type="text" name="titulo" value="@if (!empty($data[0]->titulo)) {{ $data[0]->titulo }} @endif" id="titulo" class="form-control" placeholder="Introdueix el titol" onkeyup="validarEnviar()" />

                  </div>
  				<div class="form-group">
                    <div id="notificaciones_subtitulo">adfasdf</div>
                    <input type="text" name="subtitulo" value="@if (!empty($data[0]->subtitulo)) {{ $data[0]->subtitulo  }} @endif" id="subtitulo" class="form-control" placeholder="Introdueix el subtitol" onkeyup="validarEnviar()" />
                  </div>
                </div>

            </div>

        <!-- INICIO CAJA TWIITER -->

          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">TWITTER</h3>
            </div>
            <div id="notificaciones_twitter"></div>
            <div class="box-body pad">
              <button type="submit" class="btn btn-primary">Imatges</button>
              <textarea name="twitter" id="twitter" onkeyup="validarEnviar()" onchange="validarEnviar()">@if (!empty($data[0]->resumen_corto)) {{ $data[0]->resumen_corto  }} @endif</textarea>
            </div>
          </div>

        <!-- FIN CAJA TWITTER -->

        <!-- INICIO CAJA RESUM llarg  -->

          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">RESUM</h3>
            </div>
            <div id="notificaciones_resumen"></div>
            <div class="box-body pad">
              <button type="submit" class="btn btn-primary">Imatges</button>
              <textarea name="resum" id="resum" onkeyup="validarEnviar()" onchange="validarEnviar()"> @if (!empty($data[0]->resumen_largo)) {{ $data[0]->resumen_largo  }} @endif </textarea>
            </div>
          </div>

        <!-- FIN CAJA RESUM llarg -->
        <!-- INICIO CAJA CONTINGUT  -->

          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">CONTINGUT</h3>
            </div>
            <div id="notificaciones_contenido"></div>
            <div class="box-body pad">
              <button type="submit" class="btn btn-primary">Imatges</button>
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
                <h4 class="modal-title">PUBLICACIO</h4>
              </div>
              <div class="modal-body">
                <p><i class="fa fa-fw fa-eye"></i><b>Visibilidad:</b> Público Editar <a>Editar</a></p>
                <p><i class="fa fa-fw fa-calendar"></i><b>Publicar</b> inmediatamente <a>Editar</a></p>
                <p><i class="fa fa-fw fa-smile-o"></i><b>Dirigit</b> per als seguents

                    <div class="checkbox">
                      <label><input id="prof" type="checkbox" value="">Professors</label>
                    </div>
                    <div class="checkbox">
                      <label><input id="alum"  type="checkbox" value="">Alumnes</label>
                    </div></p>
                </div>
                <div class="box-footer">
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
                <div class="modal-body">
                  <div class="form-group ">
                    <label>Totes les categories</label>
                    <div id="selector_categorias">
                        <select id='selectcategorias' multiple='multiple' name='categorias_seleccionadas[]'></select>
                  </div>
                  </div>
                </div>
                <div class="box-header with-border">
                  <a type="button" class="btn btn-box-tool" data-widget="collapse">+ Afegir nova categoria</a>

                  <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div   class="box-body" style="display: none;">
                  <div class="form-group">
                    <input id="nombrecategoria" type="text" class="form-control" placeholder="Introdueix la categoria aquí">
                  </div>
                  <button type="button" class="btn btn-default pull-left" onclick="guardarCategoria()" data-dismiss="modal">Afegir Categoria</button>
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
  			  <div class="modal-body">
  				<div class="form-group ">
                    <label>Afegir nova etiqueta</label>
  				  <div class="form-group">
  					<input type="text" class="form-control" placeholder="Introdueix la nova etiqueta ">
                   </div>
  				</div>
  			  </div>
              <div class="box-body">
  				<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Afegir</button>
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
            <form action="/tsfi/public/administracio/uploadFile" class="dropzone" id="dropzone-upload">
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
