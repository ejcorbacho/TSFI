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
                              <textarea type="text" class="inputTwitter" type="text" maxlength="140"></textarea>
                              <p class="charactersLeftTwitter"></p>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel·la</button>
                              <button type="button" class="btn btn-primary botoPublicarTwitterIntern">Publica</button>
                          </div>
                      </div>
                  </div>
              </div>
              <div id="modalConfirmacioEliminarEntrada" class="modal">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                              <h4 class="modal-title">Atenció!</h4>
                          </div>
                          <div id="modalConfirmacioEliminarEntradaContent" class="modal-body">

                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel·la</button>
                              <button type="button" class="btn btn-danger botoEliminarEntradaIntern">Eliminar</button>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="box-body no-padding">

                  <div class="col-md-12 table-responsive">
                      <div class="mailbox-controls">



                <div class="btn-group">
                  <a href="{{url('administracio/entrada/paperera')}}"><button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i> Paperera</button></a>
                </div>
                <!-- /.pull-right -->
              </div>
                  <table id="taulaDePosts"  class="table table-hover table-striped">
                      <thead>
                          <tr>
                              <th>Títol</th>
                              <!--<th style="max-width:100px;">Resum</th>-->
                              <th>Categories</th>
                              <th>Data de publicació</th>
                              <th>Visites</th>
                              <th>Publicar a Twitter</th>
                              <th></th>
                              <th></th>
                          </tr>
                      </thead>

                      <tbody>
                  @foreach($data as $dato)
                  <tr entradaId="{{ $dato->id }}">
                      <!--<td><input type="checkbox"></td>-->
                      <td class="nomEntrada">{{ $dato->titulo }}</td>
                      <!--<td style="max-width:100px;" class="campoResumenTablaPosts">{{ $dato->resumen_largo }}</td>-->
                      <td>{{ $dato->categoriasDePost }}</td>
                      <td>{{ Carbon\Carbon::parse($dato->data_publicacion)->format('d-m-Y') }}</td>
                      <td>{{ $dato->visitas }}</td>
                      <td><i class="twitterIconDataTable fa fa-fw fa-twitter-square"></i></td>
                      <td><a href="{{ url('administracio/entrada/nova/' . $dato->id) }}">EDITAR</a></td>
                      <td><button type="button" class="btn btn-default btn-sm botoEsborrarEntrades"><i class="fa fa-trash-o"></i></button></td>
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

</body>

@endsection
