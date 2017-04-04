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
            <img src="{{$data->fotosUrl}}" alt="image placeholder" class="postTitleImg">
            <h1 class="titol col-sm-6 col-sm-offset-3 col-xs-6 col-xs-offset-3">@if(!empty($data->titulo)) {{$data->titulo}}</h1>@endif
            @if(!empty($data->nombre)) <h2 class="categoria col-sm-2 col-sm-offset-5 col-xs-2 col-xs-offset-5"><a id="link" href="../category/{{$data->idcat}}">{{$data->nombre}}@endif</a></h2>
            <h3 class="autor col-sm-4 col-sm-offset-4 col-xs-4 col-xs-offset-4">@if(!empty($data->data_publicacion)){{ Carbon\Carbon::parse($data->data_publicacion)->format('d-m-Y') }}@endif </h3>
        </div>

        <main class="col-md-9 col-sm-12 Post">
            <article class="col-sm-12 PostContent">
                <p>@if(!empty($data->contenido)) {!!html_entity_decode($data->contenido)!!}@endif</p>
            </article>
        </main>
        <div class="categoryPostsSidebar col-md-3 col-sm-12">                
               <h2>Posts Relacionats</h2>
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
                <h2>Entitats Colaboradores</h3>
                <a href="#"><div class="sidebarLink" ></div></a>
                <a href="#"><div class="sidebarLink" ></div></a>
                <a href="#"><div class="sidebarLink" ></div></a>
        </div>
    </div>
</body>

</html>
@endsection
