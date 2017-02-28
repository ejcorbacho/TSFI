@extends('layouts.backend')

@section('content')
<div class="container">

  Sessió iniciada {{Auth::user()->name }} {{Auth::user()->apellido}}

</div>
@endsection
