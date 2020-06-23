<!DOCTYPE html>
<html>
<head>
	<title>Bolsa de trabajo</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
	@section('colores')
	<link rel="stylesheet" type="text/css" href="{{URL::asset('css/hola.css')}}">
	 <link rel="stylesheet" type="text/css" href="{{URL::asset('fonts/style.css')}}">
	@show
</head>
<body>
	<div id="cabecera">
		<a>SISTEMA DE BOLSA DE TRABAJO</a><br>
		<b>INSTITUTO TECNOLOGICO DE TUXTLA GUTIERREZ</b>
	</div>
	@yield('seccion')
</body>
</html>