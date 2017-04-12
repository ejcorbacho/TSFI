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
        <script src="{{ asset('js/frontend/twitter.js')}}"></script>
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
                          @if(!empty($categoria->nombre))  {{$categoria->nombre}} @endif
                        </h5>
                        <h1 class="titulo">@if(!empty($unpost->titulo))  {{$unpost->titulo}} @endif</h1>
                        <p class="categoryPostText">@if(!empty($unpost->resumen_largo)){{$unpost->resumen_largo}} @endif</p>
                        </a>
                        <div class="categoryPostData">
                            <p class="col-md-3 col-sm-3 col-xs-3 categoryPostDate">{{ Carbon\Carbon::parse($unpost->data_publicacion)->format('d-m-Y') }}</p>
                            <span class="categoryPostDataSeparator">•</span>
                            @if(isset($unpost->titulo))
                                <a class="twitter-share-button" href="https://twitter.com/intent/tweet?text={{$unpost->titulo}} &url=http://localhost/cms/post/{{$unpost->id}}&hashtags=TSFI">
                                    Tweet
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                <hr class="categoryPostSeparator">
                @endforeach
                <?php echo $posts->render(); ?>
                <!-- final del bucle de posts -->
            </div>
            <div class="categoryPostsSidebar col-md-3 col-sm-12">                
              <h2>Posts Relacionats</h2>
               @foreach($related as $info)                
                <a href="../post/{{$info->id}}">
                    <div class="sidebarPost">
                        <img class="sidebarPostImg" src="{{$info->fotosUrl}}">
                        <div class="sidebarPostTitle">
                            <p>@if(!empty($info->titulo)){{$info->titulo}} @endif </p>
                        </div>
                    </div>
                </a>
                 @endforeach
                <div id="entitatsColaboradores">
                
                </div>
            </div>
        </div>
    </body>
</html>
@endsection
