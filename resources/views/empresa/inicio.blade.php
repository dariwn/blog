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
		<img style="float: left;" src="/img/tecnm2.png" alt="" width="210" height="100">				
		<a>SISTEMA DE BOLSA DE TRABAJO</a>		
		<img style="float: right;" src="/img/teclogoittg.png" alt="" width="112" height="112" >
		<br>		
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
	@include('sesionstatus')
	@yield('seccion')
	

	<script src="js/jquery-2.1.0.min.js"></script>
	<script src="js/dropdown.js"></script>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>