@extends('layouts.backend')

@section('content')
<div class="container">
    Beinvenido {{Auth::user()->name }}!
</div>
@endsection
