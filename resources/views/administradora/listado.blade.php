
@extends('administradora.inicio3')
@section('contenido')

<div class="container">      
        <div class="col-sm-10" >

          <div class="panel panel-success"><br>
              <h2 class="panel-title"><center><font size="5"></i>Datos De Las Empresas</font></center></h2>

            <div class="panel-body">              
                <div class=" col-md-12"> 
					<div class="table-responsive">
						<div class="table-responsive">
						   
							<table class="table table-striped table-bordered table-condensed table-hover">
								<thead>
									<th>Número de Solicitudes</th>
									<th>Nombre</th>
									<th>Usuario</th>
									<th>RFC</th>
									<th>Descripcion</th>
									<th>Colonia</th>
									<th>Calle</th>
									<th>Número Exterior</th>
									<th>Código Postal</th>
									<th>Teléfono</th>
									<th>Estado</th>
									<th>Municipio</th>
								</thead>
							   @foreach ($empresa as $bienvenido)
								<?php 
									$solici = DB::table('solicitud')->where('id_empresa', $bienvenido->idempresa)->count();

								?>
								<tr>
									<td><span style="font-size: 16px">{{ $solici }}  </span><a href="{{ url('verlistasolicitudes/'.$bienvenido->idempresa) }}" class="btn btn-primary">Ver</a>
									</td>
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
							</table>
						</div>
					</div>
				</div>      
                          
                </div>
            </div>
          </div>
        </div>
		<br>
		<div class="row justify-content-center">
			{!! $empresa->render() !!}
		</div>  
</div>

                      
                     
                  
@endsection