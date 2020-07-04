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
<div class="table-responsive">
	<div class="table-responsive">
		<h3>Listado de Postulados</h3>
		<table class="table table-striped table-bored table-condensed table-hover">
			<thead>
				<th>Nombre</th>
				<th>Apellido Paterno</th>
				<th>Apellido Materno</th>
				<th>Comentario</th>
				<th>Estatus</th>
				<th>CV</th>
			</thead>
			@foreach($postulados as $postulado)
			<tr>
				<td>{{ $postulado->egresado->nombres }}</td>
				<td>{{ $postulado->egresado->apellido_paterno }}</td>
				<td>{{ $postulado->egresado->apellido_materno }}</td>
				<td>{{ $postulado->comentario }}</td>

				@if($postulado->estatus = 'Postulado')
				<td><span style="background: #7aff33;">{{ $postulado->estatus}}</span></td>
				@elseif($postulado->estatus = 'No Postulado')
				<td><span style="background: #ff4633;">{{ $postulado->estatus}}</span></td>
				@endif

				<td>
					@if($postulado->estatus = 'Postulado')
						<a href="{{url('/curriculopdf/'.$postulado->egresado->idegresado) }}" class="btn-descargar" target="_blank">
							ver
						  </a>
					
					@elseif($postulado->estatus = 'No Postulado')
						<a>No disponible</a>
					
					@endif
					
				</td>
				
			</tr>
			@endforeach
		</table>
	</div>
</div>
@endsection