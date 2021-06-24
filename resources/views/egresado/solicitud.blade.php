@extends('egresado.inicio')
@section('contenido')
<div class="row">
	
@foreach($solicitudes as $solicitud)
<div class="col-sm-6">
	<div class="card" style="width: 20rem; word-wrap: break-word">
	  <div class="card-body">
		 
		 <?php
			$solicitud1 = DB::table('solicitud')->where('idsolicitud',$solicitud->idsolicitud)->get();
			
			$soli = DB::table('egresadosolicitud')->where('idegresado',$egresados->idegresado)->exists();
			//dd($soli);
			if($soli == true){
			$soli1 = DB::table('egresadosolicitud')->select('idsolicitud')->where('idegresado',$egresados->idegresado)->get();
			
				
				foreach ($soli1 as $solici1) {
					//echo $solici1->idsolicitud;
					$array [] = $solici1->idsolicitud;
				}
			
			
			}else {
				$array = [];
			}

			//dd($array);			
			//$unir = implode(",", $array);
			// if (in_array($solicitud->idsolicitud, $array)) {
			// 	echo "Existe";
			// }			
			// dd($unir);
			 
		 ?>

		@if ($solicitud1[0]->estatus == 'No Vigente')
		{{-- @if ($solicitud1[0]->estatus == 'No Vigente               ') --}}
			
		@elseif($solicitud1[0]->estatus == 'Vigente')
		{{-- @elseif($solicitud1[0]->estatus == 'Vigente                  ') --}}
	    <h4 class="card-title">Puesto: {{ $solicitud1[0]->nombredelpuesto }}</p>
	    <h6 class="card-subtitle mb-2 text-muted">Estado de la Vacante: {{ $solicitud1[0]->estatus }}</h6>
	    {{-- <p class="card-text">Descripci&oacute;n: {{ $solicitud1[0]->descripcion_del_puesto }}.</p> --}}
	    <h6 class="card-subtitle mb-2 text-muted">Horario: {{ $solicitud1[0]->horario }}</h6>
	    <h6 class="card-subtitle mb-2 text-muted">Salario: ${{$solicitud1[0]->salario }}</h6>
	    <!--<h6 class="card-subtitle mb-2 text-muted">Sexo: {{ $solicitud1[0]->idsexo }}</h6>-->
	    {{-- <h6 class="card-subtitle mb-2 text-muted">Edades: {{ $solicitud1[0]->edades }}</h6> --}}
	    <h6 class="card-subtitle mb-2 text-muted">Tiempo de Contrataci&oacute;n: {{ $solicitud1[0]->tiempo_de_contratacion }}</h6>
		@if (in_array($solicitud->idsolicitud, $array))
			<span style="font-size:13.0pt; background-color: rgb(83, 255, 83)">Postulado</span>
		@else
			<a class="btn-wide btn btn-primary" href="{{ url('postulacion',Crypt::encrypt($solicitud1[0]->idsolicitud)) }}" class="card-link">Detalles</a>			
		@endif
		<span></span>
		@endif
	  </div>
	</div>
</div>

@endforeach
</div>

@endsection