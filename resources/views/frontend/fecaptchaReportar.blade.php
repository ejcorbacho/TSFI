@extends('layouts.frontend')

@section('content')
<link href="{{ asset('css/feFormularios.css') }}" rel="stylesheet" type="text/css">

<!-- CAPTCHA -->
<script src='https://www.google.com/recaptcha/api.js'></script>

<script type="text/javascript" src="{{ asset('js/frontend/feEntradas.js') }}"></script>

<!-- Paginacio -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.min.js"></script> <!-- formulario AJAX -->

<body>

  <div class="row titulo">
    <div class="col-md-12">
      <h1>Reportar un post</h1>
    </div>
    <div class="col-md-12">
      <hr />
    </div>
  </div>

  <div class="row contenido">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <p>
        Si has detectar un error en la entrada o consideres que és inapropiada pots enviar-nos un REPORT i la revisarem.<br />
        Amb la finalitat d’oferir informació de qualitat i evitar atacs al nostre sistema informàtic hem de verificar que no ets un robot, per fer-ho únicament hauràs de validar el CAPTCHA que apareix justament a sota.
      </p>
    </div>
    <div class="col-md-1"></div>
  </div>
  <hr />
  <div class="row formulario_captcha">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <form onsubmit="return enviarFormularioCaptcha()" action="{{url('/informarReporte')}}" method="POST"><form onsubmit="return enviarFormularioCaptcha()" action="{{url('/informarContenido')}}" method="POST">
        <input type="hidden" name="id_post" id="id_post" value="{{$id_post}}" />
        <center><div style="margin-bottom: 15px;" class="g-recaptcha" data-sitekey="6Leo3hsUAAAAANAbZtLYWR-17zXp1oEurbVzOr5z"></div></center>
        <button type="submit" value="Enviar" class="btn btn-primary" />Validar</button>
      </form>
    </div>
    <div class="col-md-1"></div>
  </div>

</body>
@endsection
