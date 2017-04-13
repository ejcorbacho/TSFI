@extends('layouts.frontend')

@section('content')
<html>
    <head>
      <a href="feHome.blade.php"></a>
          <meta name="viewport" content="width=device-width, user-scalable=no">
          <link rel="stylesheet" href="{{ asset('css/popularposts.css')}}">
          <link href="{{ asset('css/mainGrid.css')}}" rel="stylesheet">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

          <!-- API Google Calendar -->
          <script src="{{ asset('js/frontend/googleCalendar.js')}}"></script>
          <!-- Widget Calendari -->
          <script src="{{ asset('fullcalendar-3.2.0/lib/moment.min.js')}}"></script>
          <script src="{{ asset('fullcalendar-3.2.0/fullcalendar.min.js')}}"></script>
          <script src="{{ asset('fullcalendar-3.2.0/locale/ca.js')}}"></script>
          <script src="{{ asset('js/frontend/calendar.js')}}"></script>
          <script src="{{ asset('js/frontend/twitter.js')}}"></script>
          <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
          <link href="{{ asset('fullcalendar-3.2.0/fullcalendar.min.css')}}" rel='stylesheet' />
          <link href="{{ asset('fullcalendar-3.2.0/fullcalendar.print.min.css')}}" rel='stylesheet' media='print' />
          <link href="{{ asset('/css/calendar.css')}}" rel="stylesheet" >

          <!-- Missatge de cookies -->
      </head>
      <body>
      <div class="col-md-12 col-lg-12 col-lg-offset-0">
      <!-- Portfolio Item Row -->

      <div class="row mainGridContainer">
      @if(!empty($posts[0]))
          <!-- 1 APARTADO PRINCIPAL-->
          <div class="col-md-8 img-relative marginBotForSec">
            @if(!empty($posts[0]))<a href="{{ url('/post/' . $posts[0]->id) }}">@endif
              <img class="img-responsive erc max" src="@if(!empty($posts[0])){{$posts[0]->fotosUrl}}@endif" alt="@if(!empty($posts[0])){{$posts[0]->alt_foto }}@endif">
      <div class="maximolineas">
        <div>
            @if(isset($posts[0]->nombre_categoria[0]) && !empty($posts[0]->nombre_categoria[0]->idCategoria))<a href="{{ url('/category/' . $posts[0]->nombre_categoria[0]->idCategoria) }}"><h4>{{$posts[0]->nombre_categoria[0]->nombre_categoria}} </h4></a>@endif
            @if(!empty($posts[0])) <h3>{{$posts[0]->titulo}} </h3>@endif
        </a>
        </div>
        <div class="icons">
            @if(isset($posts[0]->titulo))
                <a class="twitter-share-button" href="https://twitter.com/intent/tweet?text={{$posts[0]->titulo}} &url=http://localhost/cms/post/{{$posts[0]->id}}&hashtags=TSFI">
                    Tweet
                </a>
            @endif
            @if(isset($posts[0]->data_publicacion))
                <span>•</span> {{Carbon\Carbon::parse($posts[0]->data_publicacion)->format('d-m-Y')}}
            @endif
        </div>
      </div>
    </div>
    @endif
    <!-- 2 APARTADOS DE DERECHA-->
@if(!empty($posts[1]))
    <div class="col-sm-8 col-md-4 marginBotForSec">
      @if(!empty($posts[1]))<a href="{{ url('/post/' . $posts[1]->id) }}">@endif
        <img class="img-responsive erc sec" src="@if(!empty($posts[1])){{$posts[1]->fotosUrl}}@endif" alt="@if(!empty($posts[1])){{$posts[1]->alt_foto }}@endif">
      <div class="maximolineas">
        <div>
            @if(isset($posts[1]->nombre_categoria[0]) && !empty($posts[1]->nombre_categoria[0]->idCategoria))<a href="{{ url('/category/' . $posts[1]->nombre_categoria[0]->idCategoria) }}"><h4>{{$posts[1]->nombre_categoria[0]->nombre_categoria}} </h4></a>@endif
            @if(!empty($posts[1])) <h3>{{$posts[1]->titulo}} </h3>@endif
        </a>
        </div>
        <div class="icons">
            @if(isset($posts[1]->titulo))
                <a class="twitter-share-button" href="https://twitter.com/intent/tweet?text={{$posts[1]->titulo}} &url=http://localhost/cms/post/{{$posts[1]->id}}&hashtags=TSFI">
                    Tweet
                </a>
            @endif
            @if(isset($posts[1]->data_publicacion))
                <span>•</span> {{Carbon\Carbon::parse($posts[1]->data_publicacion)->format('d-m-Y')}}
            @endif
        </div>
      </div>
    </div>
@endif
@if(!empty($posts[2]))
    <div class="col-sm-4 col-md-4 marginBotForSec">
        @if(!empty($posts[2]))<a href="{{ url('/post/' . $posts[2]->id) }}">@endif
        <img class="img-responsive erc sec" src="@if(!empty($posts[2])){{$posts[2]->fotosUrl}}@endif" alt="@if(!empty($posts[2])){{$posts[2]->alt_foto }}@endif">
      <div class="maximolineas">
        <div>
            @if(isset($posts[2]->nombre_categoria[0]) && !empty($posts[2]->nombre_categoria[0]->idCategoria))<a href="{{ url('/category/' . $posts[2]->nombre_categoria[0]->idCategoria) }}"><h4>{{$posts[2]->nombre_categoria[0]->nombre_categoria}} </h4></a>@endif
            @if(!empty($posts[2])) <h3>{{$posts[2]->titulo}} </h3>@endif
        </a>
        </div>
        <div class="icons">
            @if(isset($posts[2]->titulo))
                <a class="twitter-share-button" href="https://twitter.com/intent/tweet?text={{$posts[2]->titulo}} &url=http://localhost/cms/post/{{$posts[2]->id}}&hashtags=TSFI">
                    Tweet
                </a>
            @endif
            @if(isset($posts[2]->data_publicacion))
                <span>•</span> {{Carbon\Carbon::parse($posts[2]->data_publicacion)->format('d-m-Y')}}
            @endif
        </div>
      </div>
    </div>
      <!--</div>
      <div class="row mainGridContainer">-->
          <!-- 3 APARTADOS DE ABAJO-->
@endif
@if(!empty($posts[3]))
     <div class="col-sm-4 rango">
                @if(!empty($posts[3]))<a href="{{ url('/post/' . $posts[3]->id) }}">@endif
            <img class="img-responsive erc terc" src="@if(!empty($posts[3])){{$posts[3]->fotosUrl}}@endif" alt="@if(!empty($posts[3])){{$posts[3]->alt_foto }}@endif">
        <div class="maximolineas">
            <div>
                @if(isset($posts[3]->nombre_categoria[0]) && !empty($posts[3]->nombre_categoria[0]->idCategoria))<a href="{{ url('/category/' . $posts[3]->nombre_categoria[0]->idCategoria) }}"><h4>{{$posts[3]->nombre_categoria[0]->nombre_categoria}} </h4></a>@endif
                @if(!empty($posts[3])) <h3>{{$posts[3]->titulo}} </h3>@endif
                </a>
            </div>
            <div class="icons">
                @if(isset($posts[3]->titulo))
                    <a class="twitter-share-button" href="https://twitter.com/intent/tweet?text={{$posts[3]->titulo}} &url=http://localhost/cms/post/{{$posts[3]->id}}&hashtags=TSFI">
                        Tweet
                    </a>
                @endif
                @if(isset($posts[3]->data_publicacion))
                    <span>•</span> {{Carbon\Carbon::parse($posts[3]->data_publicacion)->format('d-m-Y')}}
                @endif
            </div>
       </div>
    </div>
@endif
@if(!empty($posts[4]))
    <div class="col-sm-4 rango">
                @if(!empty($posts[4]))<a href="{{ url('/post/' . $posts[4]->id) }}">@endif
            <img class="img-responsive erc terc" src="@if(!empty($posts[4])){{$posts[4]->fotosUrl}}@endif" alt="@if(!empty($posts[4])){{$posts[4]->alt_foto }}@endif">
        <div class="maximolineas">
            <div>
                @if(isset($posts[4]->nombre_categoria[0]) && !empty($posts[4]->nombre_categoria[0]->idCategoria))<a href="{{ url('/category/' . $posts[4]->nombre_categoria[0]->idCategoria) }}"><h4>{{$posts[4]->nombre_categoria[0]->nombre_categoria}} </h4></a>@endif
                @if(!empty($posts[4])) <h3>{{$posts[4]->titulo}} </h3>@endif
            </a>
            </div>
            <div class="icons">
                @if(isset($posts[4]->titulo))
                    <a class="twitter-share-button" href="https://twitter.com/intent/tweet?text={{$posts[4]->titulo}} &url=http://localhost/cms/post/{{$posts[4]->id}}&hashtags=TSFI">
                        Tweet
                    </a>
                @endif
                @if(isset($posts[4]->data_publicacion))
                    <span>•</span> {{Carbon\Carbon::parse($posts[4]->data_publicacion)->format('d-m-Y')}}
                @endif
            </div>
        </div>
    </div>
@endif
@if(!empty($posts[5]))
              <div class="col-sm-4 rango">
                @if(!empty($posts[5]))<a href="{{ url('/post/' . $posts[5]->id) }}">@endif
            <img class="img-responsive erc terc" src="@if(!empty($posts[5])){{$posts[5]->fotosUrl}}@endif" alt="@if(!empty($posts[5])){{$posts[5]->alt_foto }}@endif">
        <div class="maximolineas">
            <div>
                @if(isset($posts[5]->nombre_categoria[0]) && !empty($posts[5]->nombre_categoria[0]->idCategoria))<a href="{{ url('/category/' . $posts[5]->nombre_categoria[0]->idCategoria) }}"><h4>{{$posts[5]->nombre_categoria[0]->nombre_categoria}} </h4></a>@endif
                @if(!empty($posts[5])) <h3>{{$posts[5]->titulo}} </h3>@endif
            </a>
            </div>
            <div class="icons">
                @if(isset($posts[5]->titulo))
                    <a class="twitter-share-button" href="https://twitter.com/intent/tweet?text={{$posts[5]->titulo}} &url=http://localhost/cms/post/{{$posts[5]->id}}&hashtags=TSFI">
                        Tweet
                    </a>
                @endif
                @if(isset($posts[5]->data_publicacion))
                    <span>•</span> {{Carbon\Carbon::parse($posts[5]->data_publicacion)->format('d-m-Y')}}
                @endif
            </div>
      </div>
    </div>
      </div>
  </div>
@endif
<!-- /**************************************OTROS POSTS NO DESTACADOS****************************************************/-->

      <div id="popularPostsSection" class="col-lg-12 col-lg-offset-0 col-md-12">
          <div id="popularPostsContainer" class="col-md-9 col-sm-12">
              @for($i = 6 ; $i < count($posts) ; $i++)
              @if(!empty($posts[$i]))
              <div class="popularPost">
                  <div class="popularPostImage col-md-4 col-sm-4 col-xs-12">
                      <a href="{{ url('/post/' . $posts[$i]->id) }}">
                          <img src="@if(!empty($posts[$i])){{$posts[$i]->fotosUrl}}@endif" alt="@if(!empty($posts[$i])){{$posts[$i]->alt_foto }}@endif">
                      </a>
                  </div>
                  <div class="popularPostInfo col-md-8 col-sm-8 col-xs-12">
                      
                     
                        @if(isset($posts[$i]->nombre_categoria[0]))
                         <a href="{{ url('/category/' . $posts[$i]->nombre_categoria[0]->idCategoria) }}">
                         <h5 class="popularPostCategory">
                            {{$posts[$i]->nombre_categoria[0]->nombre_categoria}} 
                        </h5>
                        </a>
                        @endif
                      <a class="popularPostLink" href="{{ url('/post/' . $posts[$i]->id) }}">
                      <h1>@if(!empty($posts[$i]->titulo)) {{$posts[$i]->titulo}} @endif</h1>
                      
                      <p>@if(!empty($posts[$i]->resumen_largo)){!!html_entity_decode($posts[$i]->resumen_largo)!!} @endif</p>
                      </a>
                      <div class="popularPostData">
                          <p class="col-md-2 col-sm-2 col-xs-2 popularPostDate"> {{Carbon\Carbon::parse($posts[$i]->data_publicacion)->format('d-m-Y')}}</p>
                          <span class="popularPostDataSeparator">•</span>
                          <!--<a href="#"><i class="fa fa-facebook-official popularPostSocialIcon" aria-hidden="true"></i></a>-->
                          <a class="twitter-share-button" href="https://twitter.com/intent/tweet?text={{$posts[$i]->titulo}} &url=http://localhost/cms/post/{{$posts[$i]->id}}&hashtags=TSFI">
                              Tweet
                          </a>
                      </div>
                  </div>
              </div>
             <hr class="popularPostSeparator">
             @endif
            @endfor             
          </div>
          <div id="popularPostsSidebar" class="col-md-3 col-sm-12">

<!-- INICI CALENDARI -->
  <h2>Calendari</h2>
  <div id='calendar'></div>

  <script async defer src="https://apis.google.com/js/api.js"
          onload="this.onload=function(){};handleClientLoad()"
          onreadystatechange="if (this.readyState === 'complete') this.onload()">
  </script>
<!-- FI CALENDARI -->

<!-- INICI TWITTER -->
<h2>Twitter</h2>
<div id="twitter">
    <a class="twitter-timeline" href="https://twitter.com/fundacioBCNfp" data-height="100%">Tweets by fundacioBCNfp</a>
    <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
</div>
<!-- FI TWTTTER -->

              <div id="entitatsColaboradores">
                
              </div>
          </div>
          
      </div>

  </body>
</html>
@endsection
