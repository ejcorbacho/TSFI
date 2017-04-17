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
    <script src="{{ asset('js/frontend/twitter.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('css/backend/resources.css') }}">

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
            @if(!empty($categoriesDePost[0]))
                <h2 class="categoria">
                @for ($i = 0; $i < count($categoriesDePost); $i++)
                    <a id="link" href="../category/{{$categoriesDePost[$i]->idcat}}">{{$categoriesDePost[$i]->nombre}}@if($i != (count($categoriesDePost)-1)) |@endif</a>
                @endfor
                @foreach($categoriesDePost as $categoria)
                    
                @endforeach
                </h2>
             @endif
            @if(!empty($data->data_publicacion))
                <div class="autorContainer"><h3 class="autor">{{ Carbon\Carbon::parse($data->data_publicacion)->format('d-m-Y') }} • </h3>
                @if(isset($data->titulo))
                    <a style="margin-top:5px;" class="twitter-share-button" href="https://twitter.com/intent/tweet?text={{$data->titulo}} &url=http://localhost/cms/post/{{$data->id}}&hashtags=TSFI">
                        Tweet
                    </a>
                @endif
                @if($data->esdeveniment==1 && !is_null($data->fecha1) && !is_null($data->fecha2))
                <h3 class="autor"> • Esdeveniment del {{Carbon\Carbon::parse($data->fecha1)->format('d-m-Y')}} al {{Carbon\Carbon::parse($data->fecha2)->format('d-m-Y')}}</h3>
                @endif
                </div>
            @endif
            </div>
        </div>

        <main class="col-md-9 col-sm-12 Post">
            <article class="col-sm-12 PostContent">
                <p>@if(!empty($data->contenido)) {!!html_entity_decode($data->contenido)!!}@endif</p>
            </article>
        <hr/>
        @if(!empty($data->esdeveniment))
          @if($data->esdeveniment == 1)
            @if($data->localizacion != NULL)
              <div id="map" class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1"></div>
            @endif
          @endif
        @endif

            <div class="col-md-9">
              <a href="{{url('/reportarPost/' . $data->id)}}">Reportar aquest post per ser incorrecte o inapropiat</a>
            </div>
        </main>
        <div class="categoryPostsSidebar col-md-3 col-sm-12">
            @if(count($etiquetas)>0 && !is_null($etiquetas[0]->nombre))
            <div>
                <h2>Etiquetes</h2>
                <ul class="tags" style="width: 100%;">
                    @foreach($etiquetas as $etiqueta)
                    <li><a href="#" class="tag">{{$etiqueta->nombre}}</a></li>
                    @endforeach
                </ul>
            </div>
            @endif
              @if(isset($related))
               @if(count($related)>0)<h2>Entrades relacionades</h2> @endif
                @foreach($related as $info)
                  @if($info->id_entrada != $data->id_entrada_m)
                    <a href="{{$info->id_entrada}}">
                        <div class="sidebarPost">
                            <img class="sidebarPostImg" src="@if(!empty($info->fotosUrl)){{$info->fotosUrl}}@endif">
                            <div class="sidebarPostTitle">
                                <p>@if(!empty($info->titulo)) {{$info->titulo}} @endif</p>
                            </div>
                        </div>
                    </a>
                    @endif
                 @endforeach
                @endif
                 @if(isset($entitats_col))
                   @if(count($entitats_col)>0 && !is_null($entitats_col[0]->nombre))<h2>Entitats col·laboradores</h2> @endif
                    @foreach($entitats_col as $entitat_col)
                    <a href="{{ $entitat_col->url}}">
                        <div class="sidebarPost">
                            <img class="sidebarPostImg" alt="{{$entitat_col->fotoALT}}" src="{{$entitat_col->fotoURL}}">
                            <div class="sidebarPostTitle">
                                <p>@if(!empty($entitat_col->nombre)) {{$entitat_col->nombre}} @endif</p>
                            </div>
                        </div>
                    </a>
                 @endforeach
                @endif
        </div>
    </div>
</body>

<script>
    var data = {!! json_encode($data) !!};
</script>

</html>
@endsection
