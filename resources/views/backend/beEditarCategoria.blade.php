@extends('layouts.backend')

@section('content')
<script src="{{asset('js/backend/beCategories.js')}}"></script>
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
            </h1>
          <!--<div class="box-header with-border">
            <h3 class="box-title">Quick Example</h3>
          </div>-->
          <!-- /.box-header -->
          <!-- form start -->
          <form id="formulariEditarCategoria">
            <div class="box-body">
              <div class="form-group">
                <input type="hidden" class="form-control" id="id" name="id" value="{{ $data[0]->id }}">
                <label>Nom de la categoria</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Inserta el nom de la categoria" value="@if (!empty($data[0]->nombre)){{$data[0]->nombre}}@endif">
                
              </div>
              
              <div class="form-group">

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                  <button id="submitEditCategory" class="btn btn-primary">Guardar</button>
              </div>
          </form>
          </div>
      </section>

@endsection
