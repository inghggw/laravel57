@extends('layout.master') 
@section('titulo','Editar Usuario')
@section('aEditUsu','active')

@section('contenido')
<h3 class="text-primary">Editar Usuario</h3>
<form>
	<div class="form-group">
	    <label for="txtNombre">Nombre</label>
	    <input type="text" class="form-control" id="txtNombre" placeholder="Digite el nombre">
	</div>
  	<div class="form-row">
  	
	<div class="form-group col-md-6">
	      <label for="txtCorreo">Correo electrónico</label>
	      <input type="email" class="form-control" id="txtCorreo" placeholder="Ejm: nombre@midominio.com">
	    </div>
	    <div class="form-group col-md-6">
	      <label for="txtContra">Contraseña</label>
	      <input type="password" class="form-control" id="txtContra" placeholder="Digite su contraseña">
	    </div>
	 </div>
  
  	<button class="btn btn-success">Registrar</button>
</form>
@endsection