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
      <th scope="col">Primer Nombre</th>
      <th scope="col">Segundo Nombre</th>
      <th scope="col">Primer Apellido</th>
      <th scope="col">Segundo Apellido</th>
      <th scope="col">Correo</th>
      <th scope="col">Fecha Nacimiento</th>
      <th scope="col">Estado</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($usuarios as $row)
  		<tr id="fila{{$row->id}}">
  			<td>
  				<a href="{{Route('usuario.edit',$row->id)}}">
  				<img src="{{asset('svg/edit.svg')}}" class="h-25"></a>
          <img src="{{asset('svg/delete.svg')}}" class="h-75 remove" 
                onclick="deleteFila({{$row->id}})" style="cursor:pointer;">
  			</td>
  			<td>{{$loop->iteration}}</td>
  			<td>{{$row->primer_nombre}}</td>
  			<td>{{$row->segundo_nombre}}</td>
        <td>{{$row->primer_nombre}}</td>
        <td>{{$row->segundo_nombre}}</td>
        <td>{{$row->correo}}</td>
        <td>{{$row->fecha_nacimiento}}</td>
        <td>{{$row->estado->nombre}}</td>
  		</tr>
  	@endforeach
  </tbody>
</table>
@endsection