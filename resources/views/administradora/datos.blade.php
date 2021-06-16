@extends('administradora.inicio3')
@section('contenido')

<div class="container">      
        <div class="col-sm-10" >

          <div class="panel panel-success"><br>
              <h2 class="panel-title"><center><font size="5"></i>Datos De Los Egresados</font></center></h2>

            <div class="panel-body">              
                <div class=" col-md-12"> 
					<div class="table-responsive">
						<div class="table-responsive">

						   <table class="table table-striped table-bordered table-condensed table-hover">
							<thead>
								<th>Correo</th>
								<th>Usuario</th>
								<th>Nombres</th>
								<th>Apellido Paterno</th>
								<th>Apellido Materno</th>								
								<th>Fecha de Nacimiento</th>
								<th>Número del Celular</th>
								<th>Perfil</th>
								<th>País</th>
								<th>Estado</th>
								<th>Municipio</th>
								<th>Domicilio</th>
								<th>Colonia</th>
							</thead>
						   @foreach ($egresado as $hola)
						 
							<tr>
								<td>{{ $hola->correo}}</td>
								<td>{{ $hola->user->username}}</td>
								<td>{{ $hola->nombres}}</td>
								<td>{{ $hola->apellido_paterno}}</td>
								<td>{{ $hola->apellido_materno}}</td>							
								<td>{{ $hola->fecha_de_nac}}</td>
								<td>{{ $hola->numero_cel}}</td>
								<td>{{ $hola->perfiles->carrera}}</td>
								<td>{{ $hola->pais->nombre}}</td>
								<td>{{ $hola->estado->nombre_estado}}</td>
								<td>{{ $hola->municipio->nombre_localidad}}</td>
								<td>{{ $hola->domicilio}}</td>
								<td>{{ $hola->colonia}}</td>
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
			{!! $egresado->render() !!}
		</div>  
</div>

                      
              
                  
@endsection