@extends('layouts.frontend')

@section('content')
<link href="{{ asset('css/tinymce.css') }}" rel="stylesheet" type="text/css">
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- CAPTCHA -->
<script src='https://www.google.com/recaptcha/api.js'></script>


<!-- Càrrega d'arxius -->
<script type="text/javascript" src="{{ asset('js/dropzone/dropzone.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/backend/dropzoneConfig.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/dropzone/dropzone.css') }}">
<link rel="stylesheet" href="{{ asset('css/image-picker/image-picker.css') }}">


<script type="text/javascript" src="{{ asset('js/frontend/feEntradas.js') }}"></script>
<script src="{{ asset('js/tinymce/tinymce/tinymce.dev.js') }}"></script>
<script src="{{ asset('js/tinymceConfig.js') }}"></script>

<!-- Image gallery -->
<script src="{{ asset('js/image-picker/image-picker.js') }}"></script>
<script src="{{ asset('js/backend/imageGallery.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/imageGallery.css') }}">

<!-- Paginacio -->
<script src="{{ asset('js/bootpag/bootpag.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.min.js"></script> <!-- formulario AJAX -->

<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="">
      <!-- Main content -->

      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Benvingut
        </h1>

      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
  		<div class="col-md-12 col-lg-9">

      <form onsubmit="return enviarFormularioCaptcha()" action="{{url('/informarContenido')}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="col-md-12 col-lg-3">
        	<div class="example-modal">
        		<div class="modal-content box">
        			<div class="modal-header">
        				<div class="box-header">
        					<h4 class="modal-title">PUBLICACIO</h4>
        				</div>

                <div class="g-recaptcha" data-sitekey="6Leo3hsUAAAAANAbZtLYWR-17zXp1oEurbVzOr5z"></div>
        				<button type="submit" value="Enviar" class="btn btn-primary pull-right" />Guardar</button>
        			</div>
        		</div>
        	</div>
        </div>





      </form>

        </div>

        <!-- FECHAS EVENTOS -->


</div>
@endsection
