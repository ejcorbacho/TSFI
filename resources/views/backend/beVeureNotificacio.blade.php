@extends('layouts.backend')

@section('content')

<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">



<!--DATA TABLES-->
<script src="{{asset('js/backend/beNotificacions.js')}}"></script>

<body class="hold-transition skin-blue sidebar-mini">

<!-- Main content -->
<section class="content">
  <div class="row">

    <!-- /.col -->
    <div class="col-md-12">
      <div class="col-md-12 box box-primary">
        <div class="box-header with-border">

          <h3 class="box-title">
            @if($dato->titulo == '@reportePost')
              Report d'un post
            @else
              Contacte
            @endif
          </h3>
        </div>
        <!-- /.box-header -->

        <div class="box-body no-padding dataTableContainer">

          <div class="col-md-1"></div>
          <div style="margin-top: 15px; margin-bottom: 15px;" class="col-md-10">
            @if($dato->titulo == '@reportePost')
              {{$dato->contenido}} <br />
              <a href="{{url('/administracio/entrada/nova/' . $dato->id_relacion)}}"> Accedeix a la edició del post </a>
            @else
              {{$dato->contenido}}
            @endif
          </div>
          <div class="col-md-1"></div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /. box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->



</body>
</html>
@endsection
