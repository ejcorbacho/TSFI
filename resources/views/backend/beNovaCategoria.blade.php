@extends('layouts.backend')

@section('content')
<script src="{{asset('js/backend/beCategories.js')}}"></script>
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
            </h1>
          <!--<div class="box-header with-border">
            <h3 class="box-title">Quick Example</h3>
          </div>-->
          <!-- /.box-header -->
          <!-- form start -->
          <form id="formulariNovaCategoria">
            <div class="box-body">
              <div class="form-group">
                <label>Nom de la categoria</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Inserta el nom de la categoria">
              </div>
              <div class="form-group">
                <label class="parentIDSelectorLabel">ID de categoria pare (opcional)</label>
                
                <select id="idPare" name="idPare" class="selectpicker" data-live-search="true">
                    <option></option>
                    @foreach($data as $categoria)
                        <option value={{ $categoria->id  }}>{{$categoria->nombre}}</option>
                    @endforeach
                </select>

              </div>
              <div class="form-group">

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
          </form>
          </div>
      </section>

@endsection
