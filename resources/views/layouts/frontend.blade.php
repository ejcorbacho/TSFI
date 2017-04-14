<html>
  <head>
    <title>Inicio </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- URL DE ACCESO CON AJAX -->
  <script src="{{asset('js/globales.js')}}"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Oxygen|Poppins" rel="stylesheet">
    <link href="{{ asset('css/layout.css') }}" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/menu_superior.js') }}"></script>
    <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('js/frontend/feGeneral.js') }}"></script>
    <link rel="stylesheet" href="{{asset('css/backend/backendUtil.css')}}">
    <script src="{{asset('js/backend/backendUtil.js')}}"></script>
  </head>
  <body>

   <div id="topSuccessMessage" class="alert alert-success alerta">
   </div>
   <div id="topErrorMessage" class="alert alert-danger alerta">
   </div>
   <div id="topWarningMessage" class="alert alert-warning alerta">
   </div>

      <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
        ga('require', 'displayfeatures');
        ga('create', 'UA-93043973-1', 'auto');
        ga('send', 'pageview');
      </script>
    <!-- **************************************** MENU GRAN **********************************************-->
      <div class="container-fluid">
        <div class="row" id="cabecera_superior"></div>
        <div class="row">
          <nav class = "col-md-12 col-sm-12 col-lg-12 hidden-xs" id="menu_superior">
            <div class="rowDeNavbar">
                <a href="{{url('/')}}">
                <div class="" id="logotipo">
                    TSFI
                </div>
                </a>
                <div class="aluProfContainer">
                  <ul class="ULaluProf">
                    <li class="LIaluProf" id="changeCookieAlumnos">>Alumnos</li>
                    <li class="LIaluProf" id="changeCookieProfesores">>Profesores</li>
                    <li class="LIaluProf" id="changeCookieTodos">>Todos</li>
                  </ul>
                </div>
                <ul class="" id="items_principales">
                   
                       @if(isset($categories))
                         @foreach($categories as $categoria)
                         <li class="dropdown">
                           <a href = "{{url('/category/'.$categoria->id)}}" >
                              {{ $categoria->nombre }}
                           </a>
                         </li>
                         @endforeach
                       @endif
                       <li class="dropdown"><a href = "{{url('/enviaentrada')}}" >Envia una entrada</a></li>
                       <li class="dropdown"><a href = "{{url('/contacta')}}" >Contacta</a></li>
                </ul>
                <div class="col-lg-3 col-md-3 col-sm-3 item" id="buscador">

                  <div id="componentes_buscador">

                    <!--<ul id="desplegable_buscador"><li class="dropdown">
                       <a href = "#" class="dropdown-toggle" data-toggle = "dropdown">
                         CATEGOR.
                       </a>
                       <div class = "dropdown-menu">
                           <a href="#"><div class="item-submenu">item 1 </div></a>
                           <a href="#"><div class="item-submenu">item 1 </div></a>
                           <a href="#"><div class="item-submenu">item 1 </div></a>
                           <a href="#"><div class="item-submenu">item 1 </div></a>
                           <a href="#"><div class="item-submenu">item 1 </div></a>

                       </div>
                    </li></ul>-->
                    <input type="text" id="caja_buscador" placeholder="Cerca"/>
                    <div class="resultadosDeBusqueda">
                        <div class="resultadoDeBusqueda">
                            <h5 style="position:absolute">No hem trobat res que coincideixi amb els paràmetres de cerca especificats... :( </h5>
                        </div>
                        <hr class="hrBuscador">
                        <!--<div class="resultadoDeBusqueda">
                          
                            <h5 style="position:absolute">La taula sectorial amplia la seva llista de membres</h5>
                          
                            <ul class="tags tagsBuscador" style="width: 100%;">
                                <li><a href="#" class="tag tagBuscador">hey</a></li>
                                <li><a href="#" class="tag tagBuscador">ho</a></li>
                                <li><a href="#" class="tag tagBuscador">lets</a></li>
                                <li><a href="#" class="tag tagBuscador">go</a></li>
                                <li><a href="#" class="tag tagBuscador">lets</a></li>
                                <li><a href="#" class="tag tagBuscador">go</a></li>
                            </ul>
                        </div>
                        <hr class="hrBuscador">
                        <div class="resultadoDeBusqueda">
                            <h5 style="position:absolute">La taula sectorial amplia la seva llista de membres</h5>
                            <ul class="tags tagsBuscador" style="width: 100%;">
                                <li><a href="#" class="tag tagBuscador">hey</a></li>
                                <li><a href="#" class="tag tagBuscador">ho</a></li>
                                <li><a href="#" class="tag tagBuscador">lets</a></li>
                                <li><a href="#" class="tag tagBuscador">go</a></li>
                            </ul>
                        </div>
                        <hr class="hrBuscador">
                        <div class="resultadoDeBusqueda">
                            <h5 style="position:absolute">La taula sectorial amplia la seva llista de membres</h5>
                            <ul class="tags tagsBuscador" style="width: 100%;">
                                <li><a href="#" class="tag tagBuscador">hey</a></li>
                                <li><a href="#" class="tag tagBuscador">ho</a></li>
                                <li><a href="#" class="tag tagBuscador">lets</a></li>
                                <li><a href="#" class="tag tagBuscador">go</a></li>
                            </ul>
                        </div>
                        <hr class="hrBuscador">
                        <div class="resultadoDeBusqueda">
                            <h5 style="position:absolute">La taula sectorial amplia la seva llista de membres</h5>
                            <ul class="tags tagsBuscador" style="width: 100%;">
                                <li><a href="#" class="tag tagBuscador">hey</a></li>
                                <li><a href="#" class="tag tagBuscador">ho</a></li>
                                <li><a href="#" class="tag tagBuscador">lets</a></li>
                                <li><a href="#" class="tag tagBuscador">go</a></li>
                            </ul>
                        </div>
                        <hr class="hrBuscador">
                        <div class="resultadoDeBusqueda">
                            <h5 style="position:absolute">La taula sectorial amplia la seva llista de membres</h5>
                            <ul class="tags tagsBuscador" style="width: 100%;">
                                <li><a href="#" class="tag tagBuscador">hey</a></li>
                                <li><a href="#" class="tag tagBuscador">ho</a></li>
                                <li><a href="#" class="tag tagBuscador">lets</a></li>
                                <li><a href="#" class="tag tagBuscador">go</a></li>
                            </ul>
                        </div>
                        <hr class="hrBuscador">
                        <div class="resultadoDeBusqueda">
                            <h5 style="position:absolute">La taula sectorial amplia la seva llista de membres</h5>
                            <ul class="tags tagsBuscador" style="width: 100%;">
                                <li><a href="#" class="tag tagBuscador">hey</a></li>
                                <li><a href="#" class="tag tagBuscador">ho</a></li>
                                <li><a href="#" class="tag tagBuscador">lets</a></li>
                                <li><a href="#" class="tag tagBuscador">go</a></li>
                            </ul>
                        </div>
                        <hr class="hrBuscador">
                        <div class="resultadoDeBusqueda">
                            <h5 style="position:absolute">La taula sectorial amplia la seva llista de membres</h5>
                            <ul class="tags tagsBuscador" style="width: 100%;">
                                <li><a href="#" class="tag tagBuscador">hey</a></li>
                                <li><a href="#" class="tag tagBuscador">ho</a></li>
                                <li><a href="#" class="tag tagBuscador">lets</a></li>
                                <li><a href="#" class="tag tagBuscador">go</a></li>
                            </ul>
                        </div>
                        <hr class="hrBuscador">
                        <div class="resultadoDeBusqueda">
                            <h5 style="position:absolute">La taula sectorial amplia la seva llista de membres</h5>
                            <ul class="tags tagsBuscador" style="width: 100%;">
                                <li><a href="#" class="tag tagBuscador">hey</a></li>
                                <li><a href="#" class="tag tagBuscador">ho</a></li>
                                <li><a href="#" class="tag tagBuscador">lets</a></li>
                                <li><a href="#" class="tag tagBuscador">go</a></li>
                            </ul>
                        </div>
                        <hr class="hrBuscador">-->
                    </div>
                  </div>
                  <div id="boton_bucador">
                    <i class="fa fa-search" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
          </nav>
        </div>
      </div>
    <!-- ************************************* FI MENU GRAN **********************************************-->
    <!-- **************************************** MENU RESPONSIVE **********************************************-->
      <div class="container-fluid">

        <div class="row">
          <nav class = "hidden-md hidden-sm hidden-lg col-xs-12" id="menu_superior">
            <div class="row">
                <div class="col-xs-3 item" id="logotipo">
                  TSFI
                </div>
                <ul class = "col-xs-6 item" id="">

                </ul>

                <div class="col-xs-3 item" id="buscador">
                  <div id="boton_menu">
                    <i id="boton_desplegar_menu" class="fa fa-bars" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
          </nav>
        </div>
        <div class="row">
          <div class="col-xs-12 hidden-md hidden-sm hidden-lg col-xs-12 "id="contenido_menu_responsive">
            <div id="buscador_responsive">
              <input type="text" placeholder="Cerca"/>
              <select>
                <option> item</option>
                <option> item</option>
                <option> item</option>
                <option> item</option>
                <option> item</option>
                <option> item</option>
                <option> item</option>
              </select>
            </div>
            <div class="items_menu_responsive">
              <div class="item_menu_responsive"> item </div>
              <div class="item_menu_responsive"> item </div>
              <div class="item_menu_responsive"> item </div>
              <div class="item_menu_responsive"> item </div>
              <div class="item_menu_responsive"> item </div>
              <div class="item_menu_responsive"> item </div>
              <div class="item_menu_responsive"> item </div>
              <div class="item_menu_responsive"> item </div>
              <div class="item_menu_responsive"> item </div>
              <div class="item_menu_responsive"> item </div>
              <div class="item_menu_responsive"> item </div>
              <div class="item_menu_responsive"> item </div>
              <div class="item_menu_responsive"> item </div>
              <div class="item_menu_responsive"> item </div>
              <div class="item_menu_responsive"> item </div>
              <div class="item_menu_responsive"> item </div>
              <div class="item_menu_responsive"> item </div>
              <div class="item_menu_responsive"> item </div>
              <div class="item_menu_responsive"> item </div>
              <div class="item_menu_responsive"> item </div>
              <div class="item_menu_responsive"> item </div>
              <div class="item_menu_responsive"> item </div>
              <div class="item_menu_responsive"> item </div>
              <div class="item_menu_responsive"> item </div>
              <div class="item_menu_responsive"> item </div>
              <div class="item_menu_responsive"> item </div>
              <div class="item_menu_responsive"> item </div>
              <div class="item_menu_responsive"> item </div>
              <div class="item_menu_responsive"> item </div>
              <div class="item_menu_responsive"> item </div>
              <div class="item_menu_responsive"> item </div>
              <div class="item_menu_responsive"> item </div>
              <div class="item_menu_responsive"> item </div>
              <div class="item_menu_responsive"> item </div>
              <div class="item_menu_responsive"> item </div>
              <div class="item_menu_responsive"> item </div>
              <div class="item_menu_responsive"> item </div>
              <div class="item_menu_responsive"> item </div>
              <div class="item_menu_responsive"> item </div>
              <div class="item_menu_responsive"> item </div>
              <div class="item_menu_responsive"> item </div>
              <div class="item_menu_responsive"> item </div>
              <div style="clear: both"></div>
            </div>

          </div>
        </div>

      </div>

    <!-- ************************************* FI MENU GRAN **********************************************-->
    @yield('content')

    <!-- ************************************** FOOTER ***************************************************-->
    <footer>
      <div id="contenido_pie">
        @if(isset($paginas))
          @foreach($paginas as $pagina)
            <a href="{{url('/pagines/'.$pagina->id)}}">{{ $pagina->titulo }}</a>
          @endforeach
        @endif
      </div>
      <hr />
      <ul id="items_menu_cms">
        <a></a>
      </ul>
      <div style="clear: both"></div>
      <div id="redes_sociales_footer">
        <i class="fa fa-facebook-official" aria-hidden="true"></i>
        <i class="fa fa-twitter" aria-hidden="true"></i>
        <i class="fa fa-envelope-o" aria-hidden="true"></i>
        <i class="fa fa-rss" aria-hidden="true"></i>
      </div>
    </footer>
  </body>
</html>
