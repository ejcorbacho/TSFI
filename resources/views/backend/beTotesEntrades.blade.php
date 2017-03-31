@extends('layouts.backend')

@section('content')

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- fullCalendar 2.2.5-->
  <link rel="stylesheet" href="../../plugins/fullcalendar/fullcalendar.min.css">
  <link rel="stylesheet" href="../../plugins/fullcalendar/fullcalendar.print.css" media="print">

  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

  <link rel="stylesheet" href="../../plugins/iCheck/flat/blue.css">
  <link rel="stylesheet" href="{{asset('css/backend/jquery.dataTables.css')}}">
  <link rel="stylesheet" href="{{asset('css/backend/dataTables.bootstrap.css')}}">
  <script src="{{asset('js/backend/jquery.dataTables.js')}}"></script>
  <script src="{{asset('js/backend/dataTables.bootstrap.min.js')}}"></script>
  <!--DATA TABLES-->
  <script src="{{asset('js/backend/beTotesEntrades.js')}}"></script>

<body class="hold-transition skin-blue sidebar-mini">

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <!-- /.col -->
        <div class="col-md-12">
          <div class="box box-primary">
              <div class="box-header with-border">
                  <h3 class="box-title">Entrades</h3>
              </div>
              <!-- /.box-header -->
              <div id="modalPublicacionTwitter" class="modal">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                              <h4 class="modal-title">Publicació a Twitter</h4>
                          </div>
                          <div id="modalPublicacionTwitterContent" class="modal-body">
                              <input type="text"class="inputTwitter"></input>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel·la</button>
                              <button type="button" class="btn btn-primary botoPublicarTwitterIntern">Publica</button>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="box-body no-padding">

                  <div class="col-md-12 table-responsive">
                      <div class="mailbox-controls">
                          <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>

                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                </div>
                <!-- /.pull-right -->
              </div>
                  <table id="taulaDePosts" class="table table-hover table-striped">
                      <thead>
                          <tr>
                              <th></th>
                              <th>Títol</th>
                              <th>Resum</th>
                              <th>Categories</th>
                              <th>Data de publicació</th>
                              <th>Publicar a Twitter</th>
                              <th></th>
                          </tr>
                      </thead>

                      <tbody>
                  @foreach($data as $dato)
                  <tr>
                      <td><input type="checkbox"></td>
                      <td>{{ $dato->titulo }}</td>
                      <td>{{ $dato->resumen_largo }}</td>
                      <td>{{ $dato->categoriasDePost }}</td>
                      <td>{{ Carbon\Carbon::parse($dato->data_publicacion)->format('d-m-Y') }}</td>
                      <td><i class="twitterIconDataTable fa fa-fw fa-twitter-square"></i></td>
                      <td><a href="{{ url('administracio/entrada/nova/' . $dato->id) }}">EDITAR</a></td>
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
