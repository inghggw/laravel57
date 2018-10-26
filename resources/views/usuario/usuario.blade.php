@extends('layout.master') 
@section('titulo','Listar Usuarios')
@section('aUsu','active')

@section('contenido')
<h3 class="text-primary">Listar Usuarios</h3>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Editar</th>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Correo</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($usuarios as $row)
  		<tr>
  			<td>
  				<a href="{{Route('usuario.edit',$row['id'])}}">
  				<img src="{{asset('svg/edit.svg')}}" class="h-25"></a>
  			</td>
  			<td>{{$row['id']}}</td>
  			<td>{{$row['nombre']}}</td>
  			<td>{{$row['correo']}}</td>
  		</tr>
  	@endforeach
  </tbody>
</table>
@endsection