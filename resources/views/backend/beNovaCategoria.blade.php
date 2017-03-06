@extends('layouts.backend')

@section('content')
<!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Afegir Categoria
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Categoria</a></li>
          <li class="active">Nova Categoria</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="box box-primary">

          <!--<div class="box-header with-border">
            <h3 class="box-title">Quick Example</h3>
          </div>-->
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form">
            <div class="box-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Nom de la categoria</label>
                {{Form::text('nombre', null, array('id' => 'nombre', 'class' => 'form-control', 'placeholder' => 'Inserta el nom de la categoria'))}}
                <!--<input type="text" class="form-control" id="CategoryName" placeholder="Inserta el nom de la categoria">-->
              </div>
              <div class="form-group">
                <label class="parentIDSelectorLabel">ID de categoria pare (opcional)</label>
                <select class="dropdown parentIDSelector">
                  <option value="null"></option>
                  <option value=1>1.Mecànica</option>
                  <option value=8>8.Informàtica</option>
                  <option value=25>25.Integració Social</option>
                </select>

              </div>
              <div class="form-group">

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                {{Form::submit('Guardar', ['class' => 'btn btn-primary']) }}
                <!--<button type="submit" class="btn btn-primary">Guardar</button>-->
              </div>
          </form>
          </div>
      </section>

@endsection
