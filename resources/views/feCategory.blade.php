@extends('layouts.frontend')

@section('content')
<html>
    <head>
        <link rel="stylesheet" href="{{ asset('css/categoryposts.css')}}">
        <link rel="stylesheet" href="{{ asset('css/pagination.css')}}">
        <meta name="viewport" content="width=device-width, user-scalable=no">
    </head>
    <body>
        <div id="categoryPostsSection" class="col-lg-10 col-lg-offset-1 col-md-12">
            <h2>{{($categoria->nombre)}}</h2>
            <div id="categoryPostsContainer" class="col-md-9 col-sm-12">
                @foreach($posts as $unpost)
                <div class="categoryPost">
                    <div class="categoryPostImage col-md-4 col-sm-4 col-xs-12">
                        <a href="/TSFI/public/post/{{$unpost->id}}">
                            <img src="http://placehold.it/700x400" alt="image placeholder">
                        </a>
                    </div>
                    <div class="categoryPostInfo col-md-8 col-sm-8 col-xs-12">
                        <a class="categoryPostLink" href="/TSFI/public/post/{{$unpost->id}}">
                        <h5 class="categoryPostCategory">
                          {{$categoria->nombre}}
                        </h5>
                        <h1>{{$unpost->titulo}}</h1>
                        <p class="categoryPostText">{{$unpost->resumen_largo}} </p>
                        </a>
                        <div class="categoryPostData">
                            <p class="col-md-2 col-sm-2 col-xs-2 categoryPostDate">19/02/16</p>
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
                <a href="#"><div class="sidebarLink" style="background-color: gray"></div></a>
                <a href="#"><div class="sidebarLink" style="background-color: gray"></div></a>
                <a href="#"><div class="sidebarLink" style="background-color: gray"></div></a>
            </div>
        </div>
    </body>
</html>
@endsection
