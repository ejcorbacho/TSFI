@extends('layouts.frontend')

@section('content')
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('/css/post.css')}}">
    <meta name="viewport" content="width=device-width, user-scalable=no"> </head>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC8C2NIInthjdKLVEX0nrwh9OjmCd1JfOk&libraries=places" async defer></script>
    <script src="{{ asset('js/frontend/map.js')}}"></script>

    <style>
        #map {
            height: 400px;
        }
    </style>

<body>
    <div class="col-lg-12 col-lg-offset-0 col-sm-12">
        <div class="postTitleContainer">
            <img src="{{$data->fotosUrl}}" alt="image placeholder" class="postTitleImg">
            <div class="titol col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
            @if(!empty($data->titulo))<h1> {{$data->titulo}}</h1>@endif
            @if(!empty($data->nombre)) <h2 class="categoria"><a id="link" href="../category/{{$data->idcat}}">{{$data->nombre}}</a></h2>@endif
            @if(!empty($data->data_publicacion))<div class="autorContainer"><h3 class="autor">{{ Carbon\Carbon::parse($data->data_publicacion)->format('d-m-Y') }}</h3><span style="font-size:20px;margin:5px;"> • </span><i class="iconoXXSS fa" href="https://twitter.com/krabitzSDS">&#xf099;</i></div>@endif 
            </div>
        </div>

        <main class="col-md-9 col-sm-12 Post">
            <article class="col-sm-12 PostContent">
                <p>@if(!empty($data->contenido)) {!!html_entity_decode($data->contenido)!!}@endif</p>
            </article>
        <hr/>
            <div id="map" class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">

            </div>
        </main>
        <div class="categoryPostsSidebar col-md-3 col-sm-12">                
               @if(count($related)!=0)<h2>Posts Relacionats</h2> @endif
                @foreach($related as $info)              
                <a href="../post/{{$info->id}}">
                    <div class="sidebarPost">
                        <img class="sidebarPostImg" src="{{$info->fotosUrl}}">
                        <div class="sidebarPostTitle">
                            <p>@if(!empty($info->titulo)) {{$info->titulo}} @endif</p>
                        </div>
                    </div>
                </a>
                 @endforeach
                <div id="entitatsColaboradores">
                
                </div>
        </div>
    </div>
</body>

<script>
    var data = {!! json_encode($data) !!};
</script>

</html>
@endsection
