
@extends('empresa.inicio1')
@section('contenido')

<div class="container">
      <div class="row">
        <div class=" col-sm-10" >

          <div class="panel panel-success"><br>
              <h2 class="panel-title"><center><font size="5">Listado de Postulados</font></center></h2>

            <div class="panel-body">
              <div class="row">
        
        </div>
                <div class=" table-responsive col-md-12 col-lg-12 "> 
                  <table class="table table-condensed">
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
		
						@if($postulado->estatus == 'Postulado')
						{{-- @if($postulado->estatus == 'Postulado                     ') --}}
						<td><span style="background: #7aff33;">{{ $postulado->estatus}}</span></td>
						@elseif($postulado->estatus == 'No Postulado')
						{{-- @elseif($postulado->estatus == 'No Postulado                  ') --}}
						<td><span style="background: #ff4633;">{{ $postulado->estatus}}</span></td>
						@endif
		
						<td>
							@if($postulado->estatus == 'Postulado')
							{{-- @if($postulado->estatus == 'Postulado                     ') --}}
								<a href="{{url('/curriculopdf/'.$postulado->egresado->idegresado) }}" class="btn-descargar" target="_blank">
									ver
								  </a>
							
							@elseif($postulado->estatus == 'No Postulado')
							{{-- @elseif($postulado->estatus == 'No Postulado                  ') --}}
								<a>No disponible</a>
							
							@endif
							
						</td>
						
					</tr>
					@endforeach
                  </table>

@endsection
