@extends('administradora.inicio')
@section('colores')
<link rel="stylesheet" type="text/css" href="{{URL::asset('css/hola.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::asset('fonts/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/estilo.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
@stop

@section('seccion')

<h2>
   <center>
		Ingrese los siguientes datos para el reporte.
        </center>
</h2>
<form action="{{ url('/imprimiendo-reporte') }}" method="POST">
	@csrf
	<div>
    <center>
		<div class="col-md-3">
			<label>Dirigido:</label>
			<input class="form-control" type="text" name="dirigido">

			<label>Cargo:</label>
			<input class="form-control" type="text" name="cargo">

			<label>Numero de reporte:</label>
			<input class="form-control" type="text" name="numero">	
		</div>
		<div class="col-md-3">
			<label>Fecha de inicio del periodo:</label>
			<input class="form-control" type="date" name="periodo">

			<label>Fecha final del periodo:</label>
			<input class="form-control" type="date" name="hasta">

			<label>Fecha de extension:</label>
			<input class="form-control" type="date" name="extiende">
		</div>
		</div>
        </center>
	</div>
	<br>
    <center>
	<div class="col-xs-12 col-md-6">
		<button class="btn-primary btn-lg">
			Imprimir
		</button>
	</div>
    </center>
	<!-- <div class="col-xs-12 col-md-6">
		<a class="btn btn-primary btn-lg" type="submit">Imprmir</a>
	</div> -->
</form>
@endsection
