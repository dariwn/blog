@extends('egresado.inicio')
<link rel="stylesheet" href="{{asset('css/pos.css')}}">
@section('contenido')
	<div class="container">
		<div class="card" style="width: 30rem; margin: 0 auto">
			<h3 class="card-title">Información de la Solicitud</h3>
			<img src="{{asset('imagenes/'.$emprefoto->imagen)}}" class="card-img-top" height="250px" width="250px">
			<div class="card-body">
			<strong>Nombre de la Empresa: </strong> {{ $empresa->nombre }} <br>
			<strong>Nombre del Puesto: </strong> {{ $solicitudes->nombredelpuesto }} <br>
			<strong>Descripción del Puesto: </strong> {{ $solicitudes->descripcion_del_puesto }} <br>
			<strong>Requisitos: </strong> {{ $solicitudes->requisito }} <br>
			<strong>Experiencia: </strong> {{ $solicitudes->experiencia }} <br>
			<strong>Sexo: </strong> {{ $solicitudes->genero->sexo }} <br>
			<strong>Perfil: </strong>
			@foreach ($pefilpos as $item)
				<?php  $p = DB::table('perfiles')->where('idperfiles', $item->idperfiles)->get(); ?>
				{{ $p[0]->carrera }},
			@endforeach
			<br>
			<strong>Salario: </strong> ${{ $solicitudes->salario }} <br>
			<strong>Horario: </strong> {{ $solicitudes->horario }} <br>
			<strong>Edades: </strong> {{ $solicitudes->edades }} <br>
			<strong>Tiempo de Contratación: </strong> {{ $solicitudes->tiempo_de_contratacion }} <br>
			<strong>Cambio de Residencia: </strong> {{ $solicitudes->cambio_de_residencia }} <br>
			</div>
		</div>
	</div>
	
	  <br>
	  <form action="{{ url('postulacion-registrada') }}" method="POST" name="formulario__usuario">
		@csrf
		  <fieldset>
			<legend>Postularse</legend>
			<div class="inputs">
			<input type="hidden" name="idsolicitud" value="{{ $solicitudes->idsolicitud }}" readonly/>
			<input type="hidden" name="idegresado" value="{{ $egresados->idegresado }}" readonly/>
			<input type="hidden" name="idempresa" value="{{ $b->id_empresa }}" readonly/>
			<input type="hidden" name="estatus" value="Postulado" readonly/>
			<!-- <div class="form-group email-box col-md-6 col-sm-6">
			  <label for="email" class=""> Nombre Vacante </label>
			  <input class="form-control" type="email" id="email" />
			</div>
			<div class="form-group ubicacion-box col-md-6 col-sm-6">
			  <label for="ubicacion" class="">Empresa </label>
			  <input class="form-control" type="text" id="ubicacion" />
			</div> -->
		  </div>
		  
		  <label for="" class="form-group col-md-12 col-sm-12 col-xs-12"> Comentario
			<textarea class="form-control" name="comentario" id="" cols="30" rows="3"></textarea>
		  </label>
	
			<div class="form-group btns col-md-12" style="margin: 0 40%">
			  {{-- <label for="file">
				<span class="btn btn-warning">Adjuntar Archivo</span>
				<input type="file" id="file" class="" name="curriculum" />
			  </label> --}}
			<input type="submit" class="btn btn-primary" value="Enviar Postulación" /> 
			</div>
			 
		  </fieldset>
		</form>

	
	
@endsection