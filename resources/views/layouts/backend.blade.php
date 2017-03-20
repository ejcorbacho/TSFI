<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TSFI ADMIN</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

  <!-- IMPORTANTE -->
  <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">

  <!-- jQuery 3.3.1 -->
	<script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.min.js"></script> <!-- formulario AJAX -->
<!-- Desplegable notificaciones (tuerca) -->
	<script src="{{asset('dist/js/app.min.js')}}"></script>
<!-- UTILIDADES GENERALES -->
     <link rel="stylesheet" href="{{asset('css/backend/backendUtil.css')}}">
     <link rel="stylesheet" href="{{asset('css/backend/bootstrap-select.css')}}">
     
<!-- CONTROL DE SESION -->
<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.1.0/jquery.form.js"></script>
  <script>
      window.Laravel = {!! json_encode([
          'csrfToken' => csrf_token(),
      ]) !!};
  </script>
  <!-- CSRF Token -->
  <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
  <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <div id="topSuccessMessage" class="alert alert-success alerta">
    </div>
    <div id="topErrorMessage" class="alert alert-danger alerta">
    </div>
    <div id="topWarningMessage" class="alert alert-warning alerta">
    </div>
  <header class="main-header">

    <!-- Logo -->
    <a href="./administracio" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>TSFI</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- USUARIO PERFIL MENU -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">{{Auth::user()->name }} {{ Auth::user()->apellido }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  {{Auth::user()->name }} {{ Auth::user()->apellido }}
                  <small>{{ $email_usuarios }}</small>
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Sign out</a>
                  <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>

    </nav>
  </header>

 <!-- MMMMMENU IZQUIERDAAAAAA -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">

 <!-- APARTADO ESTADISTICAS --->
        <li class="active treeview">
          <a href="{{ url('administracio') }}">
            <i class="fa fa-dashboard"></i> <span>ESTADISTICAS</span>
            <span class="pull-right-container">
            </span>
          </a>

        </li>

 <!-- APARTADO ENTRADAS --->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>ENTRADAS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('administracio/entrada/nova') }}"><i class="fa fa-circle-o"></i> Nova Entrada</a></li>
            <li><a href="{{ url('administracio/entrada/llistat') }}"><i class="fa fa-circle-o"></i> Entradas </a></li>
          </ul>
        </li>
 <!-- APARTADO CATEGORIAS --->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>CATEGORIAS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/administracio/categoria/nova') }}"><i class="fa fa-circle-o"></i> Nova Categoria</a></li>
            <!--<li><a href="{{ url('/administracio/categoria/editar') }}"><i class="fa fa-circle-o"></i> Editar Categoria </a></li>-->
            <li><a href="{{ url('/administracio/categoria/llistat') }}"><i class="fa fa-circle-o"></i> Totes Les Categories</a></li>
          </ul>
        </li>

 <!-- APARTADO PAGINAS --->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>PAGINAS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> Nueva Pagina</a></li>
            <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Todas las Paginas</a></li>
          </ul>
        </li>
 <!-- APARTADO MENUS --->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>MENUS</span>
          </a>
        </li>
 <!-- APARTADO USUARIOS --->
        <li class="treeview">
          <a>
            <i class="fa  fa-users"></i> <span>USUARIOS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> Añadir Usuarios</a></li>
            <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Mi Perfil</a></li>
          </ul>
        </li>

	 <!-- APARTADO CALENDARIO
        <li>
          <a href="pages/calendar.html">
            <i class="fa fa-calendar"></i> <span>Calendar</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
          </a>
        </li>--->

	 <!-- APARTADO CONFIGURACION --->
        <li>
          <a href="pages/mailbox/mailbox.html">
            <i class="fa fa-book"></i> <span>CONFIGURACION</span>
          </a>
        </li>

      </ul>
    </section>
  </aside>

  <!-- ******************************CONTENIDO DE LA PAGINA*************************************** ------>
  <div class="content-wrapper">
    @yield('content')
  </div>

<!-- FOOOTER -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.8
    </div>
    <strong>Copyright &copy; 2015-2017 <a href="http://g1s2aw.sdslab.cat">Kravitz Group</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">

  </aside>

  <div class="control-sidebar-bg"></div>

</div>


    <!--  SCRIPTS  -->
    <!--  SCRIPT GENERAL  -->
    <script src="{{asset('js/backend/backendUtil.js')}}"></script>
    <script src="{{asset('js/backend/bootstrap-select.js')}}"></script>

</body>
</html>
