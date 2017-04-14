@extends('layouts.frontend')

@section('content')
<script type="text/javascript" src="{{ asset('js/frontend/feReport.js') }}"></script>
<link href="{{ asset('css/feFormularios.css') }}" rel="stylesheet" type="text/css">

<body>
  <div class="col-md-12">
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
          Si us plau, indica quin es el motiu pel que vols reportar aquest post. El revisarem en el menor temps possible. Indica'ns el teu nom i e-mail per poder mantenir-te informat del progrès del report.<br />
          Agraim el teu interes.
        </p>
      </div>
      <div class="col-md-1"></div>
    </div>
    <hr />

    <div class="row formulario_nova_entrada">
      <div class="col-md-1"></div>
      <div class="col-md-10">
        <form method="POST" action="{{url('/reportGuardar')}}">
          <input type="hidden" name="id_post" id="id_post" value="{{$id_post}}" />
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
              <h5>EXPLICACIÓ:</h5>
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
