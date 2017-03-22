@extends('layouts.frontend')

@section('content')
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('/css/post.css')}}">
    <meta name="viewport" content="width=device-width, user-scalable=no"> </head>

<body>
    <div class="col-lg-10 col-lg-offset-1 col-sm-12">
        <div class="postTitleContainer">
            <img src="{{$data->fotosUrl}}" alt="image placeholder" class="postTitleImg">
            <h1 class="titol col-sm-6 col-sm-offset-3 col-xs-6 col-xs-offset-3">{!!html_entity_decode($data->titulo)!!}</h1>
            <h2 class="categoria col-sm-2 col-sm-offset-5 col-xs-2 col-xs-offset-5"><a id="link" href="../category/{{$data->idcat}}">{!!html_entity_decode($data->nombre)!!}</a></h2>
            <h3 class="autor col-sm-4 col-sm-offset-4 col-xs-4 col-xs-offset-4">{!!html_entity_decode($data->data_publicacion)!!}</h3>
        </div>

        <main class="col-md-9 col-sm-12 Post">
            <article class="col-sm-12 PostContent">
                {!!html_entity_decode($data->contenido)!!}
            </article>
        </main>
        <div class="categoryPostsSidebar col-md-3 col-sm-12">                
                <h2>Related Posts</h2>
                @foreach($related as $info)
                <a href="../post/{{$info->id}}">
                    <div class="sidebarPost">
                        <img class="sidebarPostImg" src="{{$info->fotosUrl}}">
                        <div class="sidebarPostTitle">
                            <p>{{$info->titulo}}</p>
                        </div>
                    </div>
                </a>
                 @endforeach
                <h3>Entitats Colaboradores</h3>
                <a href="#"><div class="sidebarLink" ></div></a>
                <a href="#"><div class="sidebarLink" ></div></a>
                <a href="#"><div class="sidebarLink" ></div></a>
        </div>
    </div>
</body>

</html>
@endsection
