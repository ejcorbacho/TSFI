@extends('layouts.frontend')

@section('content')
<!-- FUNCIONES  VALIDACION -->

<link href="{{ asset('css/feFormularios.css') }}" rel="stylesheet" type="text/css">

<body>
  <div class="col-md-12">
    <div class="row titulo">
      <div class="col-md-12">
        <h1>Error</h1>
      </div>
      <div class="col-md-12">
        <hr />
      </div>
    </div>

    <div class="row contenido">
      <div class="col-md-1"></div>
      <div class="col-md-10">
        <p>
          S'ha produït un en el sistema informàtic. Pots tornar a intentar-ho més tard.<br />
          <b>Disculpa les molèsties!</b>
        </p>
      </div>
      <div class="col-md-1"></div>
    </div>

</body>
@endsection
