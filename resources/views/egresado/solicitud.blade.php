@extends('egresado.inicio')
@section('contenido')
@foreach($solicitudes as $solicitud)
	<div class="col-md-6 mb-3 card" style="width: 25rem;">
	  <div class="card-body">
		 
		 <?php
			$solicitud1 = DB::table('solicitud')->where('idsolicitud',$solicitud->idsolicitud)->get();					
		 ?>

		@if ($solicitud1[0]->estatus == 'No Vigente')
		{{-- @if ($solicitud1[0]->estatus == 'No Vigente               ') --}}
			
		@elseif($solicitud1[0]->estatus == 'Vigente')
		{{-- @elseif($solicitud1[0]->estatus == 'Vigente                  ') --}}
	    <h4 class="card-title">Puesto: {{ $solicitud1[0]->nombredelpuesto }}</h4>
	    <h6 class="card-subtitle mb-2 text-muted">Estado de la Vacante: {{ $solicitud1[0]->estatus }}</h6>
	    {{-- <p class="card-text">Descripci&oacute;n: {{ $solicitud1[0]->descripcion_del_puesto }}.</p> --}}
	    <h6 class="card-subtitle mb-2 text-muted">Horario: {{ $solicitud1[0]->horario }}</h6>
	    <h6 class="card-subtitle mb-2 text-muted">Salario: ${{$solicitud1[0]->salario }}</h6>
	    <!--<h6 class="card-subtitle mb-2 text-muted">Sexo: {{ $solicitud1[0]->idsexo }}</h6>-->
	    {{-- <h6 class="card-subtitle mb-2 text-muted">Edades: {{ $solicitud1[0]->edades }}</h6> --}}
	    <h6 class="card-subtitle mb-2 text-muted">Tiempo de Contrataci&oacute;n: {{ $solicitud1[0]->tiempo_de_contratacion }}</h6>
		<a class="btn-wide btn btn-primary" href="{{ url('postulacion',$solicitud1[0]->idsolicitud) }}" class="card-link">Detalles</a>
		@endif
	  </div>
	</div>
@endforeach
@endsection