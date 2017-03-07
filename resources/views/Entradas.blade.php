@extends('layouts.backend')

@section('content')
<link href="{{ asset('css/tinymce.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{ asset('css/sol.css') }}">

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
        {{ $data['mensaje']}}
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
        {{ Form::open(array('url'=>'administracio/entradas/crearEntrada', 'role'=>'form')) }}
          <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Afegir nova entrada</h3>
              </div>
                <div class="box-body">

  				<div class="form-group">
                      <div id="notificaciones_titulo">adfasdf</div>
                      {{Form::text('titulo', null, array('id' => 'titulo', 'class' => 'form-control', 'placeholder' => 'Introdueix el titol aquí', 'onkeyup' => 'validarEnviar()'))}}
                  </div>
  				<div class="form-group">
                    <div id="notificaciones_subtitulo">adfasdf</div>
                    {{Form::text('subtitulo', null, array('id' => 'subtitulo', 'class' => 'form-control', 'placeholder' => 'Introdueix el subtitol aquí', 'onkeyup' => 'validarEnviar()'))}}
                  </div>
                </div>

            </div>

        <!-- INICIO CAJA TWIITER -->

          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">TWITTER</h3>
            </div>
            <div id="notificaciones_twitter">adfasdf</div>
            <div class="box-body pad">
              <button type="submit" class="btn btn-primary">Imatges</button>
              {{ Form::textarea('twitter', null, ['id' => 'twitter', 'onkeyup' => 'validarEnviar()', 'onchange' => 'validarEnviar()']) }}
            </div>
          </div>

        <!-- FIN CAJA TWITTER -->

        <!-- INICIO CAJA RESUM llarg  -->

          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">RESUM</h3>
            </div>
            <div id="notificaciones_resumen">adfasdf</div>
            <div class="box-body pad">
              <button type="submit" class="btn btn-primary">Imatges</button>
              {{ Form::textarea('resum', null, ['id' => 'resum', 'onkeyup' => 'validarEnviar()', 'onchange' => 'validarEnviar()']) }}
            </div>
          </div>

        <!-- FIN CAJA RESUM llarg -->
        <!-- INICIO CAJA CONTINGUT  -->

          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">CONTINGUT</h3>
            </div>
            <div id="notificaciones_contenido">adfasdf</div>
            <div class="box-body pad">
              <button type="submit" class="btn btn-primary">Imatges</button>
              {{ Form::textarea('contenido', null, array('id' => 'editor', 'onkeyup' => 'validarEnviar()')) }}
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
                  {{Form::submit('Guardar', ['class' => 'btn btn-primary pull-right']) }}
                </div>
              </div>
            </div>
          </div>
          <!-- FI publicacio-->

          <div class="col-md-3">
            <div class="example-modal">
              <div class="modal-content box">
                <div class="modal-header">
                  <h4 class="modal-title">Categories</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group ">
                    <label>Totes les categories</label>
                    <select id="my-select" name="character" multiple="multiple">
                      <option value="Peter">Peter Griffin</option>
                      <option value="Lois">Lois Griffin</option>
                      <option value="Chris">Chris Griffin</option>
                      <option value="Meg">Meg Griffin</option>
                      <option value="Stewie">Stewie Griffin</option>
                      <option value="Cleveland">Cleveland Brown</option>
                      <option value="Joe">Joe Swanson</option>
                      <option value="Quagmire">Glenn Quagmire</option>
                      <option value="Evil Monkey">Evil Monkey</option>
                      <option value="Herbert">John Herbert</option>
                    </select>
                  </div>
                </div>
                <div class="box-header with-border">
                  <a type="button" class="btn btn-box-tool" data-widget="collapse">+ Afegir nova categoria</a>

                  <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Introdueix la categoria aquí">
                  </div>
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Afegir Categoria</button>
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
        {{ Form::close() }}

  	<!-- END IMATGE-->
      <!-- ./row -->
      </section>
      <!-- /.content -->
    </div>


</div>
@endsection
