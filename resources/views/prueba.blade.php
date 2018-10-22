@extends('layout.master') 
@section('titulo','Prueba')

@section('contenido')
<h1 class="text-danger">
	Bienvenido {{$nombre.' '.$apellido}}
</h1>
@endsection

@section('piepag')
<h3 class="text-success">Pie de página cambiado</h3>
@endsection