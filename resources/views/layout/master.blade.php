<!DOCTYPE html>
<html>
<head>
	<meta name="csrf-token" content="{{csrf_token()}}">
	<title>Laravel - @yield('titulo')</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
	<script>
	window.laravel = {!! 
					json_encode(['url'=>URL::to('/'),
									 'token'=>csrf_token()])	
					!!};
	</script>
</head>
<body>
	<div class="jumbotron jumbotron-fluid mb-0">
	  <div class="container">
	    <h1 class="display-4">Fluid jumbotron</h1>
	    <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
	  </div>
	</div>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-center">
	  <a class="navbar-brand" href="#">Menú</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item">
		    <a class="nav-link @yield('aInicio')" href="{{url('inicio')}}">Inicio</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link @yield('aCreateUsu')" href="{{Route('usuario.create')}}">Crear Usuario</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link @yield('aEditUsu')" href="{{url('editUsu')}}">Editar Usuario</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link @yield('aUsu')" href="{{Route('usuario.index')}}">Listar Usuarios</a>
		  </li>
	    </ul>
	    <form class="form-inline my-2 my-lg-0">
	      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
	      <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Buscar</button>
	    </form>
	  </div>
	</nav>

	<ul class="nav navbar-dark bg-dark justify-content-center">
	  
	</ul>

	<div class="container-fluid">

		<div class="row">
			<div class="col-md-8 pt-3">
				@yield('contenido')
			</div>
			<div class="col-md-4 bg-info">				
			</div>
		</div>

	</div>

	<div class="row">
		<footer class="col-md-12 text-center bg-dark">
		@section('piepag')
			<span class="text-info">Pie de página por defecto</span>
		@show
	</footer>
	</div>
	
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/funciones.js')}}"></script>
</body>
</html>