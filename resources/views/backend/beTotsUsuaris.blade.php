@extends('layouts.backend')

@section('content')

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="{{asset('css/backend/jquery.dataTables.css')}}">
  <link rel="stylesheet" href="{{asset('css/backend/dataTables.bootstrap.css')}}">
  <script src="{{asset('js/backend/jquery.dataTables.js')}}"></script>
  <script src="{{asset('js/backend/dataTables.bootstrap.min.js')}}"></script>
  <!--DATA TABLES-->
  <script src="{{asset('js/backend/beTotsUsuaris.js')}}"></script>

<body class="hold-transition skin-blue sidebar-mini">

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <!-- /.col -->
        <div class="col-md-12">
          <div class="box box-primary">
              <div id="modalConfirmacioEliminarEntrada" class="modal">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                              <h4 class="modal-title">Eliminar un usuari</h4>
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



                <!--<div class="btn-group">
                  <a href="{{url('administracio/entrada/llistat')}}"><button type="button" class="btn btn-default btn-sm"><i class="fa fa-arrow-left"></i> Torna entrades</button></a>
                </div>-->
                <!-- /.pull-right -->
              </div>
                  <table id="taulaDePosts" class="table table-hover table-striped">
                      <thead>
                          <tr>
                              <th>Nom</th>
                              <th>Email</th>

                              <th></th>
                          </tr>
                      </thead>

                      <tbody>
                  @foreach($data as $dato)
                  <tr entradaId="{{ $dato->id }}">
                      <!--<td><input type="checkbox"></td>-->
                      <td class="nomEntrada">{{ $dato->name }}</td>
                      <td class="nomEntrada">{{ $dato->email }}</td>
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
