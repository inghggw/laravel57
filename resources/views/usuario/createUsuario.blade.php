@extends('layout.master') 
@section('titulo','Crear Usuario')
@section('aCreateUsu','active')

@section('contenido')
<h3 class="text-primary">Crear Usuario</h3>

<form method="POST" action="{{Route('usuario.store')}}">
	
	@csrf

	<div class="form-row">
		<div class="form-group col-md-6">
	      	<label for="txtPrimerNombre">Primer Nombre</label>
	    	<input type="text" class="form-control" id="txtPrimerNombre" name="primernombre" placeholder="Digite el primer nombre" required> 
	    </div>
	    <div class="form-group col-md-6">
		    <label for="txtSegundoNombre">Segundo Nombre</label>
	    	<input type="text" class="form-control" id="txtSegundoNombre" name="segundonombre" placeholder="Digite el segundo nombre"> 
	    </div>
	</div>

	<div class="form-row">
		<div class="form-group col-md-6">
	      	<label for="txtPrimerApellido">Primer Apellido</label>
	    	<input type="text" class="form-control" id="txtPrimerApellido" name="primerapellido" placeholder="Digite el primer apellido" required> 
	    </div >
	    <div class="form-group col-md-6">
		    <label for="txtSegundoApellido">Segundo Apellido</label>
	    	<input type="text" class="form-control" id="txtSegundoApellido" name="segundoapellido" placeholder="Digite el segundo apellido"> 
	    </div>
	</div>
	
  	<div class="form-row">
		<div class="form-group col-md-6">
		    <label for="txtCorreo">Correo electrónico</label>
		    <input type="email" class="form-control" id="txtCorreo" name="correo" placeholder="Ejm: nombre@midominio.com" required>
	    </div>
	    <div class="form-group col-md-6">
		    <label for="txtContra">Contraseña</label>
		    <input type="password" class="form-control" id="txtContra" name="contrasena" placeholder="Digite su contraseña" required>
	    </div>
	</div>

	<div class="form-row">
		<div class="form-group col-md-6">
		    <label for="txtFecha">Fecha de Nacimiento</label>
		    <input type="date" class="form-control" id="txtFecha" name="fecha">
	    </div>
	    <div class="form-group col-md-6">
		    <label for="selEstado">Estado</label>
		    <select name="estado" id="selEstado" class="form-control" required>
		    	<option value="">Seleccione...</option>
		    	@foreach($estados as $row)
		    		<option value="{{$row->id}}">{{$row->nombre}}</option>
		    	@endforeach
		    </select>
	    </div>
	</div>
  
  	<button class="btn btn-success">Registrar</button>
</form>
@endsection