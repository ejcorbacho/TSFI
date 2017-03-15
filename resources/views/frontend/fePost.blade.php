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
            <img src="http://placehold.it/700x400" alt="image placeholder" class="postTitleImg">
            <h1 class="titol col-sm-6 col-sm-offset-3 col-xs-6 col-xs-offset-3">{!!html_entity_decode($data->titulo)!!}</h1>
            <h2 class="categoria col-sm-2 col-sm-offset-5 col-xs-2 col-xs-offset-5">{!!html_entity_decode($data->nombre)!!}</h2>
            <h3 class="autor col-sm-4 col-sm-offset-4 col-xs-4 col-xs-offset-4">Creat per · Martí</h3>
        </div>

        <main class="col-md-9 col-sm-12 Post">
            <article class="col-sm-12 PostContent">
                {!!html_entity_decode($data->contenido)!!}
            </article>
        </main>
        <div class="PostsSidebar col-md-3 col-sm-12">
            <h2>Related Posts</h2>
            <a href="#">
                <div class="sidebarPost">
                    <img class="sidebarPostImg" src="http://placehold.it/300x150">
                    <div class="sidebarPostTitle">
                        <p>Titulo Del Post relacionado</p>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="sidebarPost">
                    <img class="sidebarPostImg" src="http://placehold.it/300x150">
                    <div class="sidebarPostTitle">
                        <p>Titulo Del Post relacionado</p>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="sidebarPost">
                    <img class="sidebarPostImg" src="http://placehold.it/300x150">
                    <div class="sidebarPostTitle">
                        <p>Titulo Del Post relacionado</p>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="sidebarPost">
                    <img class="sidebarPostImg" src="http://placehold.it/300x150">
                    <div class="sidebarPostTitle">
                        <p>Titulo Del Post relacionado</p>
                    </div>
                </div>
            </a>
            <h3>Mas Cosas</h3>
            <a href="#">
                <div class="sidebarLink" style="background-color: gray"></div>
            </a>
            <a href="#">
                <div class="sidebarLink" style="background-color: gray"></div>
            </a>
            <a href="#">
                <div class="sidebarLink" style="background-color: gray"></div>
            </a>
        </div>
    </div>
</body>

</html>
@endsection
