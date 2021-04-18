<!DOCTYPE html>
<html>
<head>
	<title>Bolsa de trabajo</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
	@section('colores')
	<link rel="stylesheet" type="text/css" href="{{URL::asset('css/hola.css')}}">
	 <link rel="stylesheet" type="text/css" href="{{URL::asset('fonts/style.css')}}">
	@show

	<style>
		header{
            width: 100%;
            background:  #1b5583;
            color: #fff;
            padding: 1em;
            text-color: white;
        }
	</style>
</head>
<body>
	<header>
		<div class="row">
			<div class="col-sm-3">
				<img style="float: right;" src="/img/tecnm2.png" alt="" width="210" height="100">				
			</div>
			<div class="col-sm-6 text-center" >
				<h3 style="color: gold">SISTEMA DE BOLSA DE TRABAJO</h3><br>
				<h4>INSTITUTO TECNOLOGICO DE TUXTLA GUTIERREZ</h4>
			</div>
			<div class="col-sm-3">
				<img src="/img/teclogoittg.png" alt="" width="112" height="112" >				
			</div>
			
		</div>

	</header>
	@yield('seccion')	
</body>
</html>