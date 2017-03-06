@extends('layouts.frontend')

@section('content')

@section ('title')
	Mostrar datos formulario
@stop
@section('sidebar')
     @parent
@stop

@section('content')
	<h2>Mostrar clientes:</h2>
	< table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Email</th>
                <th>Ciudad</th>
            </tr>
        </thead>

        <tfoot>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Email</th>
                <th>Ciudad</th>
            </tr>
        </tfoot>

        <tbody>
        	@foreach($datos as $dato)
            <tr>
                <td>{{ $dato->id}}</td>
                <td>{{ $dato->nombre}}</td>
                <td>{{ $dato->apellido1}} {{ $dato->apellido2}}</td>
                <td><a href="mailto:{{ $dato->email}}">{{ $dato->email}}</a></td>
	     <td>{{ $dato->ciudad}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop
@endsection
