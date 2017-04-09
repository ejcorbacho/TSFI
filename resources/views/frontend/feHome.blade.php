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
          <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
          <link href="{{ asset('fullcalendar-3.2.0/fullcalendar.min.css')}}" rel='stylesheet' />
          <link href="{{ asset('fullcalendar-3.2.0/fullcalendar.print.min.css')}}" rel='stylesheet' media='print' />
          <link href="{{ asset('/css/calendar.css')}}" rel="stylesheet" >
      </head>
      <body>
      <div class="col-md-12 col-lg-12 col-lg-offset-0">
      <!-- Portfolio Item Row -->

      <div class="row mainGridContainer">
          <!-- 1 APARTADO PRINCIPAL-->
          <div class="col-md-8 img-relative marginBotForSec">
            @if(!empty($posts[0]))<a href="{{ url('/post/' . $posts[0]->id) }}">@endif
              <img class="img-responsive erc max" src="@if(!empty($posts[0])){{$posts[0]->fotosUrl}}@endif" alt="@if(!empty($posts[0])){{$posts[0]->alt_foto }}@endif">
      <div class="maximolineas">
        <div>
                <h4>@if(!empty($posts[0]))
                    @if(isset($posts[0]->nombre_categoria[0])){{$posts[0]->nombre_categoria[0]->nombre_categoria}} @endif
                @endif</h4>
                <h3>@if(!empty($posts[0])) {{$posts[0]->titulo}} @endif</h3>
            </a>
        </div>
        <div class="icons">
            <i style="font-size:20px" href="https://twitter.com/krabitzSDS" class="fa">&#xf099;</i>@if(isset($posts[0]->data_publicacion)) <span>•</span> {{Carbon\Carbon::parse($posts[0]->data_publicacion)->format('d-m-Y')}}@endif
        </div>
      </div>
    </div>
    <!-- 2 APARTADOS DE DERECHA-->
    <div class="col-sm-8 col-md-4 marginBotForSec">
      @if(!empty($posts[1]))<a href="{{ url('/post/' . $posts[1]->id) }}">@endif
        <img class="img-responsive erc sec" src="@if(!empty($posts[1])){{$posts[1]->fotosUrl}}@endif" alt="@if(!empty($posts[1])){{$posts[1]->alt_foto }}@endif">
      <div class="maximolineas">
        <div>
            <h4>@if(!empty($posts[1]))
                @if(isset($posts[1]->nombre_categoria[0])){{$posts[1]->nombre_categoria[0]->nombre_categoria}} @endif
            @endif</h4>
            <h3>@if(!empty($posts[1])) {{$posts[1]->titulo}} @endif</h3>
        </a>
        </div>
        <div class="icons">
            <i style="font-size:20px" href="https://twitter.com/krabitzSDS" class="fa">&#xf099;</i>@if(isset($posts[1]->data_publicacion)) <span>•</span> {{Carbon\Carbon::parse($posts[1]->data_publicacion)->format('d-m-Y')}}@endif
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 marginBotForSec">
                         @if(!empty($posts[2]))<a href="{{ url('/post/' . $posts[2]->id) }}">@endif
        <img class="img-responsive erc sec" src="@if(!empty($posts[2])){{$posts[2]->fotosUrl}}@endif" alt="@if(!empty($posts[2])){{$posts[2]->alt_foto }}@endif">
      <div class="maximolineas">
        <div>
            <h4>@if(!empty($posts[2]))
                @if(isset($posts[2]->nombre_categoria[0])){{$posts[2]->nombre_categoria[0]->nombre_categoria}} @endif
            @endif</h4>
            <h3>@if(!empty($posts[2])) {{$posts[2]->titulo}} @endif</h3>
        </a>
        </div>
        <div class="icons">
            <i style="font-size:20px" href="https://twitter.com/krabitzSDS" class="fa">&#xf099;</i> @if(isset($posts[2]->data_publicacion)) <span>•</span> {{Carbon\Carbon::parse($posts[2]->data_publicacion)->format('d-m-Y')}}@endif
        </div>
      </div>
    </div>
      <!--</div>
      <div class="row mainGridContainer">-->
          <!-- 3 APARTADOS DE ABAJO-->
     <div class="col-sm-4 rango">
                @if(!empty($posts[3]))<a href="{{ url('/post/' . $posts[3]->id) }}">@endif
            <img class="img-responsive erc terc" src="@if(!empty($posts[3])){{$posts[3]->fotosUrl}}@endif" alt="@if(!empty($posts[3])){{$posts[3]->alt_foto }}@endif">
        <div class="maximolineas">
            <div>
                <h4>@if(!empty($posts[3]))
                    @if(isset($posts[3]->nombre_categoria[0])){{$posts[3]->nombre_categoria[0]->nombre_categoria}} @endif
                @endif</h4>
                <h3>@if(!empty($posts[3])) {{$posts[3]->titulo}} @endif</h3>
                </a>
            </div>
            <div class="icons">
                <i style="font-size:20px" href="https://twitter.com/krabitzSDS" class="fa">&#xf099;</i> @if(isset($posts[3]->data_publicacion)) <span>•</span> {{Carbon\Carbon::parse($posts[3]->data_publicacion)->format('d-m-Y')}}@endif
            </div>
       </div>
    </div>

    <div class="col-sm-4 rango">
                @if(!empty($posts[4]))<a href="{{ url('/post/' . $posts[4]->id) }}">@endif
            <img class="img-responsive erc terc" src="@if(!empty($posts[4])){{$posts[4]->fotosUrl}}@endif" alt="@if(!empty($posts[4])){{$posts[4]->alt_foto }}@endif">
        <div class="maximolineas">
            <div>
                <h4>@if(!empty($posts[4]))
                    @if(isset($posts[4]->nombre_categoria[0])){{$posts[4]->nombre_categoria[0]->nombre_categoria}} @endif
                @endif</h4>
                <h3>@if(!empty($posts[4])) {{$posts[4]->titulo}} @endif</h3>
            </a>
            </div>
        
            <div class="icons">
                <i style="font-size:20px" href="https://twitter.com/krabitzSDS" class="fa">&#xf099;</i> @if(isset($posts[4]->data_publicacion)) <span>•</span> {{Carbon\Carbon::parse($posts[4]->data_publicacion)->format('d-m-Y')}}@endif
            </div>
        </div>
    </div>

              <div class="col-sm-4 rango">
                @if(!empty($posts[5]))<a href="{{ url('/post/' . $posts[5]->id) }}">@endif
            <img class="img-responsive erc terc" src="@if(!empty($posts[5])){{$posts[5]->fotosUrl}}@endif" alt="@if(!empty($posts[5])){{$posts[5]->alt_foto }}@endif">
        <div class="maximolineas">
            <div>
                <h4>@if(!empty($posts[5]))
                    @if(isset($posts[5]->nombre_categoria[0])){{$posts[5]->nombre_categoria[0]->nombre_categoria}} @endif
                @endif</h4>
                <h3>@if(!empty($posts[5])) {{$posts[5]->titulo}} @endif</h3>
            </a>
            </div>
            <div class="icons">
                <i style="font-size:20px" href="https://twitter.com/krabitzSDS" class="fa">&#xf099;</i>@if(isset($posts[5]->data_publicacion)) <span>•</span> {{Carbon\Carbon::parse($posts[5]->data_publicacion)->format('d-m-Y')}}@endif
            </div>
      </div>
    </div>
      </div>
  </div>
<!-- /**************************************OTROS POSTS NO DESTACADOS****************************************************/-->

      <div id="popularPostsSection" class="col-lg-12 col-lg-offset-0 col-md-12">
          <div id="popularPostsContainer" class="col-md-9 col-sm-12">
              @for($i = 6 ; $i < count($posts) ; $i++)
              <div class="popularPost">
                  <div class="popularPostImage col-md-4 col-sm-4 col-xs-12">
                      <a href="{{ url('/post/' . $posts[$i]->id) }}">
                          <img src="@if(!empty($posts[$i])){{$posts[$i]->fotosUrl}}@endif" alt="@if(!empty($posts[$i])){{$posts[$i]->alt_foto }}@endif">
                      </a>
                  </div>
                  <div class="popularPostInfo col-md-8 col-sm-8 col-xs-12">
                      <a class="popularPostLink" href="{{ url('/post/' . $posts[$i]->id) }}">
                      <h5 class="popularPostCategory">
                        @if(!empty($posts[$i]))
                            @if(isset($posts[$i]->nombre_categoria[0])){{$posts[$i]->nombre_categoria[0]->nombre_categoria}} @endif
                        @endif</h4>
                      </h5>
                      <h1>@if(!empty($posts[$i])) {{$posts[$i]->titulo}} @endif</h1>
                      </a>
                      <p>@if(!empty($posts[$i])){!!html_entity_decode($posts[$i]->contenido)!!} @endif</p>

                      <div class="popularPostData">
                          <p class="col-md-2 col-sm-2 col-xs-2 popularPostDate">19/02/16</p>
                          <span class="popularPostDataSeparator">•</span>
                          <!--<a href="#"><i class="fa fa-facebook-official popularPostSocialIcon" aria-hidden="true"></i></a>-->
                          <a href="#"><i class="fa fa-twitter popularPostSocialIcon" aria-hidden="true"></i></a>
                      </div>
                  </div>
              </div>
             <hr class="popularPostSeparator">
              @endfor             
          </div>
          <div id="popularPostsSidebar" class="col-md-3 col-sm-12">
              <h2>Calendari</h2>
<!-- INICI CALENDARI -->
              <!--ANTIC
              <iframe src="https://calendar.google.com/calendar/embed?src=kravitz.sds%40gmail.com&ctz=Europe/Madrid" style="border: 0" width="100%" height="250px" frameborder="0" scrolling="no"></iframe>
              -->

              <div id='calendar'></div>

              <script async defer src="https://apis.google.com/js/api.js"
                      onload="this.onload=function(){};handleClientLoad()"
                      onreadystatechange="if (this.readyState === 'complete') this.onload()">
              </script>

<!-- FI CALENDARI -->
<!-- Entitats colaboradres -->
              <h2>Twitter</h2>
              <iframe id="twitter-widget-0" scrolling="no" frameborder="0" allowtransparency="true" allowfullscreen="true" class="twitter-timeline twitter-timeline-rendered" style="position: static; visibility: visible; display: inline-block; width: 400px; height: 400px; padding: 0px; border: none; max-width: 100%; min-width: 180px; margin-top: 0px; margin-bottom: 0px; min-height: 300px;" data-widget-id="585734069557792768" title="Twitter Timeline"></iframe>
              <h2>Entitats Colaboradores</h2>
              <a href="#"><div class="sidebarLink" ></div></a>
              <a href="#"><div class="sidebarLink" ></div></a>
              <a href="#"><div class="sidebarLink" ></div></a>

          </div>
      </div>
  </body>
</html>
@endsection
