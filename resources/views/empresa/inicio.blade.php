<!DOCTYPE html>
<html>
<head>
	<title>Bolsa de trabajo</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
	@section('colores')
	<link rel="stylesheet" type="text/css" href="{{URL::asset('css/hola.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/estilo1.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
	<script type="text/javascript" src="{{asset('js/hola.js')}}"></script>
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
			     @if(Auth::user()->tipo == 1)
                <li><a href="{{route('empresa.nuevo')}}">Registrarse</a></li>
			    <li><a href="#">Perfil</a></li>
                <li><a href="#">Nueva Solicitud</a></li>
				<li><a href="#">Solicitudes</a></li>	
				<li><a href="{{url('/BTEmpresa')}}">Salir</a></li>
                @else
                  @if(Auth::user()->tipo == 0)
                  <li><a href="{{route('empresa.show', $empresas)}}">Perfil</a></li>
                  <li><a href="{{route('solicitud.create')}}">Nueva Solicitud</a></li>
				  <li><a href="{{route('solicitud.index')}}">Solicitudes</a></li>	
				  <li><a href="{{url('/BTEmpresa')}}">Salir</a></li>
                  @endif
                @endif    
			</ul>
		</nav>
    </header>
	@yield('seccion')

	<script src="js/jquery-2.1.0.min.js"></script>
	<script src="js/dropdown.js"></script>
</body>
</html>