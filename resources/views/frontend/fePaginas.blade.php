@extends('layouts.frontend')

@section('content')
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('/css/post.css')}}">
    <meta name="viewport" content="width=device-width, user-scalable=no"> </head>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

<body>
    <div class="col-lg-12 col-lg-offset-0 col-sm-12">
        <div class="postTitleContainer">
            <img src="{{$data->fotoUrl}}" alt="image placeholder" class="postTitleImg">
            <h1 class="titol col-sm-6 col-sm-offset-3 col-xs-6 col-xs-offset-3">@if(!empty($data->titulo)) {{$data->titulo}}@endif</h1>
            <h3 class="autor col-sm-4 col-sm-offset-4 col-xs-4 col-xs-offset-4">@if(!empty($data->data_publicacion)) {{$data->data_publicacion}}@endif</h3>
        </div>

        <main class="col-md-12 col-sm-12 Post">
            <article class="col-sm-12 PostContent">
                @if(!empty($data->contenido)) {!!html_entity_decode($data->contenido)!!}@endif
            </article>
        </main>
    </div>
</body>

</html>
@endsection
