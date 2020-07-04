@extends('empresa.inicio')

@section('colores')
<link rel="stylesheet" type="text/css" href="{{URL::asset('css/hola.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL::asset('css/estilo.css')}}">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
@stop
@section('seccion')
<br>
<div class="table-responsive">
	<div class="table-responsive">
		<br>
		<h3>Listado de Solicitudes</h3>
		<table class="table table-striped table-bored table-condensed table-hover">
			<thead>
				<th>Fecha y Hora</th>
				<th>Descripci&oacute;n</th>
				<th>Cambiar Estatus</th>
				<th>Numero de Postulados</th>
				<th>Ver Postulados</th>
				<th>Modificar Solicitud</th>
				<th>Perfil Seleccionado</th>
			</thead>
			@foreach($solicitudes as $solicitud)
				@php
					$var=0;
				@endphp
				@foreach($egresolicitados as $egresolicitado)
					@if($solicitud->idsolicitud == $egresolicitado->idsolicitud)
					        @php
								$var = $var+1;
							@endphp
						@if($egresolicitado->egresado->estatus == 'Postulado')
						@endif
					@endif
				@endforeach
			<tr>
				<td>{{ $solicitud->created_at }}</td>
				<td>{{ $solicitud->descripcion_del_puesto }}</td>
				<td>
					<form action="{{ url('cambio-estatus',$solicitud) }}" method="POST">
						@csrf
						<?php 
							echo $solicitud->estatus;
						?>
						@if(strcmp($solicitud->estatus,"Vigente") == 0)
							<button type="submit" value="vigente" class="btn-wide btn btn-success">{{ $solicitud->estatus }}</button>
						@elseif(strcmp($solicitud->estatus,"Vigente") !== 0)
							<button type="submit" class="btn-wide btn btn-danger">{{ $solicitud->estatus }}</button>
						@endif
					</form>
				</td>
				<td class="text-center">{{ $var }}</td>
				@if($var == 0)
				<td>
					<a class="btn-wide btn btn-primary" href="#">Ver</a>
				</td>
				@elseif($var >=1)
				<td>
				<a class="btn-wide btn btn-primary" href="{{url('postulado',$solicitud)}}">Ver</a>
				</td>
				@endif
				<td>
					<a class="btn-wide btn btn-success" href="{{ route('solicitud.edit',$solicitud) }}">Editar</a>
				</td>
				<td>
					<a class="btn-wide btn btn-success" href="{{ route('bienvenido.edit',$solicitud) }}">Editar</a>
				</td>
			</tr>
		@endforeach
		</table>
	</div>
</div>
@endsection