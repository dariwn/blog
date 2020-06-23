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
<br>
<div class="table-responsive">
	    <div class="table-responsive">
		   <br>
		   <h3>Datos de los Egresados</a></h3>
		   <br>
	    	<table class="table table-striped table-bordered table-condensed table-hover">
	    		<thead>
	    			<th>Correo</th>
	    			<th>Nombres</th>
	    			<th>Apellido Paterno</th>
	    			<th>Apellido Materno</th>
					<th>Domicilio</th>
                    <th>Colonia</th>
					<th>Fecha de Nacimiento</th>
					<th>Numero del Celular</th>
                    <th>Perfil</th>
					<th>Pais</th>
					<th>Estado</th>
					<th>Municipio</th>
	    		</thead>
               @foreach ($egresado as $hola)
             
	    		<tr>
	    			<td>{{ $hola->correo}}</td>
	    			<td>{{ $hola->nombres}}</td>
                    <td>{{ $hola->apellido_paterno}}</td>
					<td>{{ $hola->apellido_materno}}</td>
					<td>{{ $hola->domicilio}}</td>
                    <td>{{ $hola->colonia}}</td>
					<td>{{ $hola->fecha_de_nac}}</td>
					<td>{{ $hola->numero_cel}}</td>
                    <td>{{ $hola->perfiles->carrera}}</td>
					<td>{{ $hola->pais->nombre}}</td>
					<td>{{ $hola->estado->nombre_estado}}</td>
					<td>{{ $hola->municipio->nombre_localidad}}</td>
	    		</tr>
	    		@endforeach
	    	</table>
	    </div>
	</div>
</div> 
@endsection