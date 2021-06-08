@extends('administradora.inicio3')
<link rel="stylesheet" href="{{asset('css/pos.css')}}">
@section('contenido')
<h3>Información de Solicitudes De La Empresa</h3>	

<div class="row">
    @foreach($solicitudeslist as $solicitud)
    <div class="col-md-4">
        <div class="card border-primary mb-3" style="width: 20rem; word-wrap: break-word; border-style: groove; border-width: 1px; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;">
          <div class="card-body" style="padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;">            
            <?php 
                $obtnombremp = DB::table('empresas')->where('idempresa', $solicitud->id_empresa)->first();
                $perfil = DB::table('solicitudperfil')->where('idsolicitud', $solicitud->idsolicitud)->get();
            ?>					
			<strong>Nombre de la Empresa: </strong> {{ $obtnombremp->nombre }} <br>
			<strong>Nombre del Puesto: </strong> {{ $solicitud->nombredelpuesto }} <br>
			<strong>Descripción del Puesto: </strong> {{ $solicitud->descripcion_del_puesto }} <br>
			<strong>Requisitos: </strong> {{ $solicitud->requisito }} <br>
			<strong>Experiencia: </strong> {{ $solicitud->experiencia }} <br>
            <?php $sexo = DB::table('sexo')->where('idgenero', $solicitud->idsexo)->first(); ?>
			<strong>Sexo: </strong> {{ $sexo->sexo }} <br>
			<strong>Perfil: </strong>
			@foreach ($perfil as $item)
				<?php  $p = DB::table('perfiles')->where('idperfiles', $item->idperfiles)->get(); ?>
				{{ $p[0]->carrera }},
			@endforeach
			<br>
			<strong>Salario: </strong> ${{ $solicitud->salario }} <br>
			<strong>Horario: </strong> {{ $solicitud->horario }} <br>
			<strong>Edades: </strong> {{ $solicitud->edades }} <br>
			<strong>Tiempo de Contratación: </strong> {{ $solicitud->tiempo_de_contratacion }} <br>
			<strong>Cambio de Residencia: </strong> {{ $solicitud->cambio_de_residencia }} <br>          
            </div>
        </div>
    </div> 
    @endforeach
</div>	
@endsection