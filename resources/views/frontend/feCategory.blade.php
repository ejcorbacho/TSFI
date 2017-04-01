@extends('layouts.frontend')

@section('content')
<html>
    <head>
        <link rel="stylesheet" href="{{ asset('css/categoryposts.css')}}">
        <link rel="stylesheet" href="{{ asset('css/pagination.css')}}">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Paytone+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Archivo+Black" rel="stylesheet">
        <meta name="viewport" content="width=device-width, user-scalable=no">
    </head>
    <body>
        <div id="categoryPostsSection" class="col-lg-12 col-lg-offset-0 col-md-12">
            <h2>{{($categoria->nombre)}}</h2>
            <div id="categoryPostsContainer" class="col-md-9 col-sm-12">
                @foreach($posts as $unpost)
                <div class="categoryPost">
                    <div class="categoryPostImage col-md-4 col-sm-4 col-xs-12">
                        <a href="../post/{{$unpost->id}}">
                            <img src="{{$unpost->fotosUrl}}" alt="image placeholder">
                        </a>
                    </div>
                    <div class="categoryPostInfo col-md-8 col-sm-8 col-xs-12">
                        <a class="categoryPostLink" href="../post/{{$unpost->id}}">
                        <h5 class="categoryPostCategory">
                          {{$categoria->nombre}}
                        </h5>
                        <h1 class="titulo">{{$unpost->titulo}}</h1>
                        <p class="categoryPostText">{{$unpost->resumen_largo}} </p>
                        </a>
                        <div class="categoryPostData">
                            <p class="col-md-3 col-sm-3 col-xs-3 categoryPostDate">{{$unpost->data_publicacion}}</p>
                            <span class="categoryPostDataSeparator">•</span>
                            <a href="https://facebook.com"><i class="fa fa-facebook-official categoryPostSocialIcon" aria-hidden="true"></i></a>
                            <a href="https://twitter.com/krabitzSDS"><i class="fa fa-twitter categoryPostSocialIcon" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <hr class="categoryPostSeparator">
                @endforeach
                <?php echo $posts->render(); ?>
                <!-- final del bucle de posts -->
            </div>
            <div class="categoryPostsSidebar col-md-3 col-sm-12">                
               @foreach($related as $info)
                <h2>Related Posts</h2>
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
