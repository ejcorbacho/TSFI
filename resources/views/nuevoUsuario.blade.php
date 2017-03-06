@extends('layouts.backend')

@section('content')
<body class="hold-transition skin-blue sidebar-mini">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        SATANAS COR PETIT SENSEI TEACH ME
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-7">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Afegir Usuari</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
				 <div class="form-group">
                  <label>NOM</label>
                  <input type="text" class="form-control" placeholder="...">
                </div>
				 <div class="form-group">
                  <label>COGNOMS</label>
                  <input type="text" class="form-control" placeholder="...">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">EMAIL</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">PASSWORD</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
				 <div class="form-group">
                  <label>Select Rol</label>
                  <select multiple class="form-control">
                    <option>DembOooOoU</option>
					<option>reggetonero</option>
                    <option>bachatero</option>
                    <option>salsero</option>
                    <option>twerkingero</option>
                    <option>hardcorero</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" id="exampleInputFile">

                  <p class="help-block">Example block-level help text here.</p>
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>

		 <div class="col-md-5">
          <!-- LLISTAT DE ALUMNES CREATS -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Llistat Usuaris</h3>
            </div>
            <form role="form">
              <div class="box-body">

				<table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>NOM</th>
                  <th>COGNOM</th>
                  <th>EMAIL</th>
                  <th>IMATGE</th>

                </tr>
                </thead>
                <tbody>
				<tr>
                  <td>Marti</td>
                  <td>Gregori</td>
                  <td>Martins@gmail.com</td>
                  <td>FOTO</td>
                </tr>
				<tr>
                  <td>Marti</td>
                  <td>Gregori</td>
                  <td>Martins@gmail.com</td>
                  <td>FOTO</td>
                </tr>
				<tr>
                  <td>Marti</td>
                  <td>Gregori</td>
                  <td>Martins@gmail.com</td>
                  <td>FOTO</td>
                </tr>
				<tr>
                  <td>Marti</td>
                  <td>Gregori</td>
                  <td>Martins@gmail.com</td>
                  <td>FOTO</td>
                </tr>
				<tr>
                  <td>Marti</td>
                  <td>Gregori</td>
                  <td>Martins@gmail.com</td>
                  <td>FOTO</td>
                </tr>
				<tr>
                  <td>Marti</td>
                  <td>Gregori</td>
                  <td>Martins@gmail.com</td>
                  <td>FOTO</td>
                </tr>
				<tr>
                  <td>Marti</td>
                  <td>Gregori</td>
                  <td>Martins@gmail.com</td>
                  <td>FOTO</td>
                </tr>
				<tr>
                  <td>Marti</td>
                  <td>Gregori</td>
                  <td>Martins@gmail.com</td>
                  <td>FOTO</td>
                </tr>
                <tr>
                  <td>Marti</td>
                  <td>Gregori</td>
                  <td>Martins@gmail.com</td>
                  <td>FOTO</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Rumano</td>
                  <td>Win90@hotmail.com</td>
                  <td>FOTO</td>
                </tr>
				<tr>
                  <td>Marti</td>
                  <td>Gregori</td>
                  <td>Martins@gmail.com</td>
                  <td>FOTO</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Firefox 1.5</td>
                  <td>Win 98+ / OSX.2+</td>
                  <td>FOTO</td>
                </tr>
				<tr>
                  <td>Marti</td>
                  <td>Gregori</td>
                  <td>Martins@gmail.com</td>
                  <td>FOTO</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Firefox 1.5</td>
                  <td>Win 98+ / OSX.2+</td>
                  <td>FOTO</td>
                </tr>


                </tbody>
                <tfoot>
                <tr>
                  <th>NOM</th>
                  <th>COGNOM</th>
                  <th>EMAIL</th>
                  <th>IMATGE</th>
                </tr>
                </tfoot>
              </table>
              </div>
            </form>
          </div>
        </div>


        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>


   <!-- FOOTER -->
  <footer class="main-footer">

  </footer>


<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>

</body>
@endsection
