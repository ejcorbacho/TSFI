@extends('layouts.backend')

@section('content')

<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">


<link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

<link rel="stylesheet" href="../../plugins/iCheck/flat/blue.css">
<!--DATA TABLES-->
<link rel="stylesheet" href="{{asset('css/backend/jquery.dataTables.css')}}">
<link rel="stylesheet" href="{{asset('css/backend/dataTables.bootstrap.css')}}">
<script src="{{asset('js/backend/jquery.dataTables.js')}}"></script>
<script src="{{asset('js/backend/dataTables.bootstrap.min.js')}}"></script>
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
                        <h3 class="box-title">Notificacions</h3>
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body no-padding dataTableContainer">

                        <div class="">

                            <table id="taulaDeCategories" class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Data</th>
                                        <th>Tipus</th>
                                        <th>Persona de contacte</th>
                                        <th>E-mail de contacte</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $dato)
                                    <tr class="filaDeDadesCategoria" categoryId="{{ $dato->id }}">
                                        <td class="nomCategoria">{{ Carbon\Carbon::parse($dato->fecha)->format('d-m-Y H:i') }}</td>
                                        <td class="nomCategoria">
                                          @if($dato->titulo == '@reportePost')
                                            Report d'un post
                                          @elseif($dato->contenido == '@novaentrada')
                                            Nova entrada
                                          @else
                                            Contacte · {{ $dato->titulo }}
                                          @endif
                                        </td>
                                        <td class="nomCategoria">{{ $dato->nombre }}</td>
                                        <td class="nomCategoria">{{ $dato->mail }}</td>
                                        <td>
                                          @if($dato->titulo == '@reportePost')
                                              <a href="{{url('/administracio/notificacio/' . $dato->id)}}">ACCEDEIX</a>
                                          @elseif($dato->contenido == '@novaentrada')
                                              <a href="{{url('/administracio/entrada/nova/' . $dato->id_relacion)}}">ACCEDEIX</a>
                                          @else
                                              <a href="{{url('/administracio/notificacio/' . $dato->id)}}">ACCEDEIX</a>
                                          @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- /.table -->
                        </div>
                        <!-- /.mail-box-messages -->
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







    <!-- Slimscroll -->
    <script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../../plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js"></script>
    <!-- iCheck -->
    <script src="../../plugins/iCheck/icheck.min.js"></script>
    <!-- Page Script -->
    <script>
$(function () {
    //Enable iCheck plugin for checkboxes
    //iCheck for checkbox and radio inputs
    $('.mailbox-messages input[type="checkbox"]').iCheck({
        checkboxClass: 'icheckbox_flat-blue',
        radioClass: 'iradio_flat-blue'
    });

    //Enable check and uncheck all functionality
    $(".checkbox-toggle").click(function () {
        var clicks = $(this).data('clicks');
        if (clicks) {
            //Uncheck all checkboxes
            $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
            $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
        } else {
            //Check all checkboxes
            $(".mailbox-messages input[type='checkbox']").iCheck("check");
            $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
        }
        $(this).data("clicks", !clicks);
    });

    //Handle starring for glyphicon and font awesome
    $(".mailbox-star").click(function (e) {
        e.preventDefault();
        //detect type
        var $this = $(this).find("a > i");
        var glyph = $this.hasClass("glyphicon");
        var fa = $this.hasClass("fa");

        //Switch states
        if (glyph) {
            $this.toggleClass("glyphicon-star");
            $this.toggleClass("glyphicon-star-empty");
        }

        if (fa) {
            $this.toggleClass("fa-star");
            $this.toggleClass("fa-star-o");
        }
    });
});
    </script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
</body>
</html>
@endsection
