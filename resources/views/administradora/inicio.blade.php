<!DOCTYPE html>
<html>
<head>
	<title>Bolsa de trabajo</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
	@section('colores')
	<link rel="stylesheet" type="text/css" href="{{URL::asset('css/hola.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::asset('fonts/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/estilo.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	@show
</head>
<body>
	<div id="cabecera">
		<a>SISTEMA DE BOLSA DE TRABAJO</a><br>
		<b>INSTITUTO TECNOLOGICO DE TUXTLA GUTIERREZ</b>
	</div>
	<header>
		<nav class="navegacion">
			<ul class="menu">
				<li><a href="{{url('usuarios-sistema')}}">Administrar Usuarios</a>					
				</li>
				<li><a href="#">Empresas</a>
					<ul class="submenu">
					   <li><a href="{{route('nuevo.create')}}">Crear usuario</a></li>
					   <li><a href="{{url('usuarios-empresa')}}">Administrar Usuarios</a></li>
					   <li><a href="{{route('nuevo.index')}}">Mostrar los datos</a></li>
					   <li><a href="{{route('administradora.ver')}}">Mostrar los datos del contacto</a></li>	
					</ul>
				</li>
				<li><a href="#">Egresados</a>
					<ul class="submenu">
					<li><a href="{{url('usuarios-egresados')}}">Administrar Usuarios</a></li>
						<li><a href="{{route('usuario.create')}}">Crear un usuario</a></li>
						<li><a href="{{route('usuario.index')}}">Mostrar los datos</a></li>
					</ul>
				</li>
				<li><a href="#">Estadistica</a>
				 	<ul class="submenu">
					 <li><a href="{{route('graficabarra')}}">Grafica de Barra</a></li>
					 {{-- <li><a href="{{route('graficapastel')}}">Grafica de Pastel - Carrera mas Solicitada</a></li> --}}
					 {{-- <li><a href="{{route('graficaalumnosp')}}">Grafica de Pastel - Alumnos Contratados</a></li> --}}
					 {{-- <li><a href="{{route('graficaalumnosb')}}">Grafica de Barra - Alumnos Contratados</a></li> --}}
					 <li><a href="{{route('ver_reporte') }}">Reporte</a></li>
                    </ul>	 
			    </li>
				<li><a href="{{ url('/BTAdministradora') }}">Salir</a></li>
			</ul>
		</nav>
    </header>
	@yield('seccion')
	
</body>
</html>