@extends('layouts.frontend')

@section('content')
<!-- FUNCIONES  VALIDACION -->

<link href="{{ asset('css/feFormularios.css') }}" rel="stylesheet" type="text/css">

<body>
  <div class="col-md-12">
    <div class="row titulo">
      <div class="col-md-12">
        <h1>Gràcies</h1>
      </div>
      <div class="col-md-12">
        <hr />
      </div>
    </div>

    <div class="row contenido">
      <div class="col-md-1"></div>
      <div class="col-md-10">
        <p>
          Hem rebut correctament la teva petició. L'atendrem en el menor temps possible.
          Anirem informan-te per correu electrònic de l'estat de la mateixa.<br />
          <b>Gràcies!</b>
        </p>
      </div>
      <div class="col-md-1"></div>
    </div>

</body>

@endsection
