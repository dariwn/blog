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
		   <h3>Datos del Contacto</a></h3>
		   <br>
	    	<table class="table table-striped table-bordered table-condensed table-hover">
	    		<thead>
                    <th>Nombre de la Empresa</th>
	    			<th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Cargo</th>
                    <th>Numero de telefono</th>
                    <th>Correo</th>
	    		</thead>
               @foreach ($administrador as $perico)
             
	    		<tr>
                    <td>{{$perico->nombre}}</td>
	    			<td>{{ $perico->names}}</td>
                    <td>{{ $perico->apellido_paterno}}</td>
                    <td>{{ $perico->apellido_materno}}</td>
                    <td>{{ $perico->cargo}}</td>
                    <td>{{ $perico->numero_cel}}</td>
                    <td>{{ $perico->email}}</td>
	    		</tr>
	    		@endforeach
	    	</table>
	    </div>
	</div>
</div> 
@endsection