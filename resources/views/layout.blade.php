{{-- {{ dd(auth()->user()->roles->toArray())}} --}}
<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Home</title>
</head>
<body>
<!-- Añadir esto deespues de precompilar en app.scss -->
<link rel="stylesheet" type="text/css" href="/css/app.css">
<script>
	window.Laravel ={
		csrfToken: "{{ csrf_token()}}"
	}
</script>

<header>



	<?php 
function activeMenu($url){
	return request()->is($url) ? 'active' : '';
}
	?>
	<nav class="navbar navbar-default" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<!--<a class="navbar-brand" href="#">Title</a>-->
			</div>
	
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li><a class="{{ activeMenu('/') }}" href="{{ route('home') }}">Home</a></li>
		<li class="{{ activeMenu('saludos*') }}"><a  href="{{ route('saludos') }}">Saludo</a></li>
		<li class="{{ activeMenu('mensajes/create') }}"><a  href="{{ route('mensajes.create') }}">Contactos</a></li>
      @if(auth()->check())

		<li class="{{ activeMenu('mensajes*') }}"><a  href="{{ route('mensajes.index') }}">Mensajes</a></li>
@if (@auth()->user()->hasRoles(['admin','estudiante']))
<li class="{{ activeMenu('usuarios*') }}"><a  href="{{ route('usuarios.index') }}">Usuarios</a></li>

@endif
         
      @endif

					<!--<li class="active"><a href="#">Link</a></li>
					<li><a href="#">Link</a></li>-->
				</ul>
				<!--<form class="navbar-form navbar-left" role="search">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Search">
					</div>
					<button type="submit" class="btn btn-default">Submit</button>
				</form>-->
				<ul class="nav navbar-nav navbar-right">
					@if(auth()->check())

                       <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ auth()->user()->name}} <b class="caret"></b></a>
						<ul class="dropdown-menu">
							
							<li><a href="/logout">Cerrar sesion </a></li>
							<li><a href="/usuarios/{{ auth()->id() }}/edit">Mi cuenta </a></li>
						</ul>
					</li> 
@endif
@if(auth()->guest())
<li class="{{ activeMenu('login') }}"><a  href="/login">Login</a></li>
@endif
					 
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>
	
</header>



<div class="container">
	@yield('contenido')
	<footer>Copyright {{ date('Y')}}</footer>
</div>
<!-- Archivo generado en el webpack.mix.js luego de un npm run dev -->
<script src="/js/all.js"></script>
<script src="//{{ Request::getHost() }}:6001/socket.io/socket.io.js"></script>
<script src="/js/app.js"></script>

<!--
-->
</body>
</html>