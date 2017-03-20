@extends('layouts.backend')

@section('content')
<script src="{{asset('js/backend/beEntitats.js')}}"></script>
<!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Afegir Entitat
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Categoria</a></li>
          <li class="active">Nova Entiat</li>
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
          <form id="formulariNovaEntitat">
            <div class="box-body">
              <div class="form-group">
                <label>Nom de l'entitat</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Inserta el nom de l'entitat">
              </div>
              <div class="checkbox">
				        <label><input id="colab" type="checkbox" name="colab">Son Colaboradors</label>
			        </div>
              <div class="form-group">
                <label>Apartat per afegir LOGO </label>
              </div>
              <div class="form-group">

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Desar</button>
              </div>
          </form>
          </div>
      </section>

@endsection