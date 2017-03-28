@extends('layouts.backend')

@section('content')

<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<!-- fullCalendar 2.2.5-->
<link rel="stylesheet" href="../../plugins/fullcalendar/fullcalendar.min.css">
<link rel="stylesheet" href="../../plugins/fullcalendar/fullcalendar.print.css" media="print">

<link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

<link rel="stylesheet" href="../../plugins/iCheck/flat/blue.css">
<!--DATA TABLES-->
<link rel="stylesheet" href="{{asset('css/backend/jquery.dataTables.css')}}">
<link rel="stylesheet" href="{{asset('css/backend/dataTables.bootstrap.css')}}">
<script src="{{asset('js/backend/jquery.dataTables.js')}}"></script>
<script src="{{asset('js/backend/dataTables.bootstrap.min.js')}}"></script>
<!--DATA TABLES-->
<script src="{{asset('js/backend/beCategories.js')}}"></script>

<body class="hold-transition skin-blue sidebar-mini">

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <!-- /.col -->
            <div class="col-md-12">
                <div class="col-md-12 box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Categories</h3>
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body no-padding dataTableContainer">

                        <div class="">
                            <div class="mailbox-controls">
                                <!-- Check all button -->
                                <!--<button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>-->

                                <div class="btn-group">
                                    <button type="button" id="botoEsborrarCategories" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                                </div>
                                <div id="modalEliminacioCategoria" class="modal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span></button>
                                                <h4 class="modal-title">Atenció! Aquesta categoria conté entrades</h4>
                                            </div>
                                            <div id="modalEliminacioCategoriaContent" class="modal-body">
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel·la</button>
                                                <button type="button" id="botoMourePostsCategoria" class="btn btn-warning">Transferir entrades a una altre categoria</button>
                                                <button type="button" class="btn btn-danger botoEliminarCategoriaIntern">Eliminar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="modalConfirmacioEliminacioCategoria" class="modal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span></button>
                                                <h4 class="modal-title">Atenció!</h4>
                                            </div>
                                            <div id="modalConfirmacioEliminacioCategoriaContent" class="modal-body">
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel·la</button>
                                                <button type="button" class="btn btn-danger botoEliminarCategoriaIntern">Eliminar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="modalMoureEntradesCategoria" class="modal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span></button>
                                                <h4 class="modal-title">Selecciona la categoria a la que vols migrar les entrades</h4>
                                            </div>
                                            <div id="modalMoureEntradesCategoriaContent" class="modal-body">
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel·la</button>
                                                <button type="button" id="botoMourePostsCategoriaAra" class="btn btn-warning">Transferir entrades</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.pull-right -->
                            </div>
                            <table id="taulaDeCategories" class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Nom</th>
                                        <th>Categoria Pare</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $dato)
                                    <tr class="filaDeDadesCategoria" categoryId="{{ $dato->id }}">
                                        <td><input type="radio" name="categoryRadio" value="{{ $dato->id }}"></td>
                                        <td class="nomCategoria">{{ $dato->nombre }}</td>
                                        <td class="pareCategoria">{{ $dato->id_padre }}</td>
                                        <td><a href="{{ url('administracio/categoria/editar/' . $dato->id) }}">EDITAR</a></td>
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
