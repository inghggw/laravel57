@extends('layout.master') 
@section('titulo','Editar Usuario')
@section('aEditUsu','active')

@section('contenido')
{{-- var_dump($u) --}}
<h3 class="text-primary">Editar Usuario</h3>

<!-- Para la ruta update, es necesario enviar el id, como se indica en el Route() 
	La ruta es PUT, pero se envía con method POST∫-->
<form method="POST" action="{{Route('usuario.update',$u->id)}}">
	
	@csrf
	@method('PUT') <!-- Como la ruta es PUT, laravel espera este input oculto con el valor PUT -->

	<div class="form-row">
		<div class="form-group col-md-6">
	      	<label for="txtPrimerNombre">Primer Nombre</label>
	    	<input type="text" class="form-control" id="txtPrimerNombre" name="primernombre" value="{{$u->primer_nombre}}" required> 
	    </div>
	    <div class="form-group col-md-6">
		    <label for="txtSegundoNombre">Segundo Nombre</label>
	    	<input type="text" class="form-control" id="txtSegundoNombre" name="segundonombre" value="{{$u->segundo_nombre}}"> 
	    </div>
	</div>

	<div class="form-row">
		<div class="form-group col-md-6">
	      	<label for="txtPrimerApellido">Primer Apellido</label>
	    	<input type="text" class="form-control" id="txtPrimerApellido" name="primerapellido" value="{{$u->primer_apellido}}" required> 
	    </div >
	    <div class="form-group col-md-6">
		    <label for="txtSegundoApellido">Segundo Apellido</label>
	    	<input type="text" class="form-control" id="txtSegundoApellido" name="segundoapellido" value="{{$u->segundo_apellido}}"> 
	    </div>
	</div>

  	<div class="form-row">
		<div class="form-group col-md-6">
		    <label for="txtCorreo">Correo electrónico</label>
		    <input type="email" class="form-control" id="txtCorreo" name="correo" value="{{$u->correo}}" required>
	    </div>
	    <div class="form-group col-md-6">
		    <label for="txtContra">Contraseña</label>
		    <input type="password" class="form-control" id="txtContra" name="contrasena" placeholder="Si desea cambiar la contraseña, digitela">
	    </div>
	</div>

	<div class="form-row">
		<div class="form-group col-md-6">
		    <label for="txtFecha">Fecha de Nacimiento</label>
		    <input type="date" class="form-control" id="txtFecha" name="fecha" value="{{$u->fecha_nacimiento}}">
	    </div>
	    <div class="form-group col-md-6">
		    <label for="selEstado">Estado</label>
		    <select name="estado" id="selEstado" class="form-control" required>
		    	@foreach($estados as $row)
		    		<option {{$row->id==$u->estado_id ? 'selected' : ''}} 
		    				value="{{$row->id}}" > {{$row->nombre}}</option>
		    	@endforeach
		    </select>
	    </div>
	</div>

	<div class="form-row">
		<div class="form-group col-md-6 text-center">
			<button class="btn btn-success">Actualizar</button>
	    </div>
	    <div class="form-group col-md-6 text-center">
	    	<a href="{{Route('usuario.index')}}">
	    	<input type="button" class="btn btn-info" value="Volver"></a>
	    </div>
	</div>
  	
</form>
@endsection