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
		Ingrese los siguientes datos para graficar.
    </center>
</h2>
<form action="{{ url('/grafica') }}" method="POST">
	@csrf
	<div>
    <center>	
		<div class="col-md-3">
            <label>Tipo de Grafica:</label>
            <select name="tipo" class="form-control" required>
                <option value="">Selecciona una opción</option>
                <option value="1">Carrera Más Solicitada</option>
                <option value="2">Puestos Ocupados Por Alumnos</option>
            </select>
            <br>
			<label>Fecha de inicio del periodo:</label>
			<input class="form-control" type="date" name="periodo">
            <br>
			<label>Fecha final del periodo:</label>
			<input class="form-control" type="date" name="hasta">			
		</div>
		</div>
        </center>
	</div>
	<br>
    <center>
	<div class="col-xs-12 col-md-6">		
		<input type="submit" name="enviar" value="Ver Grafica" class="btn-primary btn-lg">
	</div>	
    </center>
</form>

@endsection
