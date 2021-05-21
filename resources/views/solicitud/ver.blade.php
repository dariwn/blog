@extends('empresa.inicio1')
@section('contenido')

<div class="container">
      <div class="row">
        <div class=" col-sm-9" >

          <div class="panel panel-success"><br>
              <h2 class="panel-title"><center><font size="5">Listado de Solicitudes</font></center></h2>

            <div class="panel-body">
              <div class="row">
        
        </div>
                <div class=" table-responsive col-md-12 col-lg-12 "> 
                  <table class="table table-condensed">
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
								
								@if($solicitud->estatus == 'Vigente')						
								{{-- @if($solicitud->estatus == 'Vigente                  ') --}}
									<button type="submit" class="btn-wide btn btn-success">{{ $solicitud->estatus }}</button>
								@elseif($solicitud->estatus == 'No Vigente')
								{{-- @elseif($solicitud->estatus == 'No Vigente               ') --}}
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

@endsection
