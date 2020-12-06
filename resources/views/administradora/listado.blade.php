
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
									<th>Nombre</th>
									<th>Usuario</th>
									<th>RFC</th>
									<th>Descripcion</th>
									<th>Colonia</th>
									<th>Calle</th>
									<th>Numero Exterior</th>
									<th>Codigo Postal</th>
									<th>Telefono</th>
									<th>Estado</th>
									<th>Municipio</th>
								</thead>
							   @foreach ($empresa as $bienvenido)
							 
								<tr>
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
								{{$empresa->render()}}
							</table>
						</div>
					</div>
				</div>      
                          
                </div>
            </div>
          </div>
        </div>
</div>

                      
                     
                  
@endsection