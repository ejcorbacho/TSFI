@extends('layouts.frontend')

@section('content')
<script type="text/javascript" src="{{ asset('js/frontend/feContacta.js') }}"></script>
<link href="{{ asset('css/feFormularios.css') }}" rel="stylesheet" type="text/css">

<body>
  <div class="col-md-12">
    <div class="row titulo">
      <div class="col-md-12">
        <h1>Contacta</h1>
      </div>
      <div class="col-md-12">
        <hr />
      </div>
    </div>

    <div class="row contenido">
      <div class="col-md-1"></div>
      <div class="col-md-10">
        <p>
          Si tens qualsevol dubte o curiositat pots preguntar-nos mitjançant el nostre formulari on-line. <br />
          T'atendrem de forma gratuïta i en el menor temps possible.
        </p>
      </div>
      <div class="col-md-1"></div>
    </div>
    <hr />

    <div class="row formulario_nova_entrada">
      <div class="col-md-1"></div>
      <div class="col-md-10">
        <form method="POST" action="{{url('/contactaGuardat')}}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="row">
            <div class="col-md-6">
              <h5>INDICA EL TEU NOM:</h5>
              <h6><div id="notificaciones_nom"></div></h6>
              <input type="text" name="nom" id="nom" class="form-control" placeholder="Introdueix el nom" onkeyup="validarFormulario()" />
            </div>
            <div class="col-md-6">
              <h5>INDICA EL TEU E-MAIL:</h5>
              <h6><div id="notificaciones_email"></div></h6>
              <input type="text" name="email" id="email" class="form-control" placeholder="Introdueix el email" onkeyup="validarFormulario()" />
            </div>
            <div class="col-md-12">
              <h5>ASUMPTE:</h5>
              <h6><div id="notificaciones_titulo"></div></h6>
              <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Introdueix l'asumpte" onkeyup="validarFormulario()" />
            </div>
            <div class="col-md-12">
              <h5>CONTINGUT:</h5>
              <h6><div id="notificaciones_contenido"></div></h6>
              <textarea style="width: 100%;" name="contingut" id="contingut" onkeyup="validarFormulario()" onchange="validarFormulario()"></textarea>
            </div>
            <div class="col-md-12">
              <center><button style="margin-top: 15px;" type="submit" value="Guardar" class="btn btn-primary" />Enviar</button></center>
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-1"></div>
    </div>
  </div>
</body>

@endsection
