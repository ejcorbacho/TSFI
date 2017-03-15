@extends('layouts.backend')

@section('content')
<!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Editar Categoria
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Categoria</a></li>
          <li class="active">Editar Categoria</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Selecciona una categoria per editar:</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form">
            <div class="box-body">
              <div class="form-group">
                <select class="selectpicker" data-live-search="true">
                  <option>Hot Dog</option>
                  <option>Burger</option>
                  <option>Sugar</option>
                  <option>Hot Dog</option>
                  <option>Burger</option>
                  <option>Sugar</option>
                  <option>Burger</option>
                  <option>Sugar</option>
                  <option>Hot Dog</option>
                  <option>Burger</option>
                  <option>Sugar</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Nom de la categoria</label>
                <input type="text" class="form-control" id="CategoryName" placeholder="Inserta el nom de la categoria">
              </div>
              <div class="form-group">
                <label class="parentIDSelectorLabel">ID de categoria pare (opcional)</label>
                <select class="dropdown parentIDSelector">
                  <option value="null"></option>
                  
                </select>



                <div class="deleteCategoryModal">
                  <div id="myModal" class="modal modal-danger">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title">Eliminar categoria</h4>
                        </div>
                        <div class="modal-body">
                          <p>Estes segur de que vols eliminar la categoria seleccionada?</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-default btn-primary">Save changes</button>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
                </div>
              </div>


              </div>
              <div class="form-group">

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="categoryButtons btn btn-primary">Guardar</button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Eliminar</button>
              </div>
          </form>
          </div>
      </section>




@endsection
