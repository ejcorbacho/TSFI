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
            <h1 class="titol col-sm-6 col-sm-offset-3 col-xs-6 col-xs-offset-3">TÍTOL DEL POST</h1>
            <h2 class="categoria col-sm-2 col-sm-offset-5 col-xs-2 col-xs-offset-5">CATEGORIA</h2>
            <h3 class="autor col-sm-4 col-sm-offset-4 col-xs-4 col-xs-offset-4">Creat per · Martí</h3>
        </div>

        <main class="col-md-9 col-sm-12 Post">
            <article class="col-sm-12 PostContent"> Lorem fistrum no puedor pupita diodeno de la pradera de la pradera jarl a peich me cago en tus muelas al ataquerl.
                Me cago en tus muelas ahorarr no puedor tiene musho peligro tiene musho peligro pecador. Amatomaa a peich
                ahorarr a peich ese que llega. Caballo blanco caballo negroorl al ataquerl te va a hasé pupitaa caballo blanco
                caballo negroorl fistro hasta luego Lucas pecador mamaar de la pradera. Qué dise usteer me cago en tus muelas
                va usté muy cargadoo benemeritaar fistro amatomaa. <br/><br/> Está la cosa muy malar ahorarr por la gloria
                de mi madre te va a hasé pupitaa llevame al sircoo te va a hasé pupitaa llevame al sircoo ese hombree diodenoo
                amatomaa. Fistro mamaar benemeritaar diodenoo. A gramenawer sexuarl papaar papaar torpedo llevame al sircoo
                torpedo condemor no puedor pupita diodeno qué dise usteer. Ahorarr ese que llega a peich qué dise usteer
                la caidita te voy a borrar el cerito. Mamaar qué dise usteer caballo blanco caballo negroorl caballo blanco
                caballo negroorl al ataquerl te va a hasé pupitaa pecador benemeritaar está la cosa muy malar tiene musho
                peligro. La caidita está la cosa muy malar se calle ustée jarl ese que llega por la gloria de mi madre papaar
                papaar apetecan va usté muy cargadoo. Pupita llevame al sircoo al ataquerl no puedor torpedo está la cosa
                muy malar. <br/><br/> Papaar papaar ese pedazo de condemor te voy a borrar el cerito. La caidita amatomaa
                está la cosa muy malar benemeritaar a wan de la pradera apetecan amatomaa ese pedazo de. No puedor benemeritaar
                torpedo ese hombree a peich la caidita ese que llega a peich no puedor ese que llega sexuarl. Diodeno tiene
                musho peligro benemeritaar a gramenawer me cago en tus muelas la caidita. Fistro ese pedazo de apetecan torpedo
                papaar papaar fistro ese que llega apetecan. Va usté muy cargadoo por la gloria de mi madre amatomaa ese
                pedazo de va usté muy cargadoo. </article>
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
