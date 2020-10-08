@extends('administradora.inicio2')
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
		   <h3>Datos de la Empresa</a></h3>
		   <br>
	    	<table class="table table-striped table-bordered table-condensed table-hover">
	    		<thead>
	    			<th>Nombre</th>
					<th>Usuario</th>
	    			<th>RFC</th>
	    			<th>Descripcion</th>
	    			<th>Colonia</th>
					<th>Calle</th>
					<th>Numero Exterior</th>
					<th>Codigo Postal</th>
					<th>Telefono</th>
					<th>Estado</th>
					<th>Municipio</th>
	    		</thead>
               @foreach ($empresa as $bienvenido)
             
	    		<tr>
	    			<td>{{ $bienvenido->nombre}}</td>
					<td>{{$bienvenido->user->username}}</td>
	    			<td>{{ $bienvenido->rfc}}</td>
                    <td>{{ $bienvenido->descripcion}}</td>
					<td>{{ $bienvenido->colonia}}</td>
					<td>{{ $bienvenido->calle}}</td>
					<td>{{ $bienvenido->numeroexterior}}</td>
					<td>{{ $bienvenido->codigo_postal}}</td>
					<td>{{ $bienvenido->telefono}}</td>
					<td>{{ $bienvenido->estado->nombre_estado}}</td>
					<td>{{ $bienvenido->municipio->nombre_localidad}}</td>
	    		</tr>
	    		@endforeach
				{{$empresa->render()}}
	    	</table>
	    </div>
	</div>
</div> 
@endsection