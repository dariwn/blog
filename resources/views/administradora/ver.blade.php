@extends('administradora.inicio3')
@section('contenido')

<div class="container">      
        <div class="col-sm-10" >

          <div class="panel panel-success"><br>
              <h2 class="panel-title"><center><font size="5"></i>Datos De Contacto En Las Empresas</font></center></h2>

            <div class="panel-body">              
                <div class=" col-md-12"> 
					<div class="table-responsive">
                        <div class="table-responsive">
                           
                            <table class="table table-striped table-bordered table-condensed table-hover">
                                <thead>
                                    <th>Nombre de la Empresa</th>
                                    <th>Usuario</th>
                                    <th>Nombre</th>
                                    <th>Apellido Paterno</th>
                                    <th>Apellido Materno</th>
                                    <th>Cargo</th>
                                    <th>Número de teléfono</th>
                                    <th>Correo</th>
                                </thead>
                               @foreach ($administrador as $perico)
                             
                                <tr>
                                    <td>{{$perico->nombre}}</td>
                                    <td>{{ $perico->user->username}}</td>
                                    <td>{{ $perico->names}}</td>
                                    <td>{{ $perico->apellido_paterno}}</td>
                                    <td>{{ $perico->apellido_materno}}</td>
                                    <td>{{ $perico->cargo}}</td>
                                    <td>{{ $perico->numero_cel}}</td>
                                    <td>{{ $perico->email}}</td>
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
			{!! $administrador->render() !!}
		</div>
        </div>
</div>

                      
                     
                  
@endsection