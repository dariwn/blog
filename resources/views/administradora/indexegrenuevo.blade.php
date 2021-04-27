
@extends('administradora.inicio3')
@section('contenido')

<div class="container">      
        <div class="col-sm-10" >

          <div class="panel panel-success"><br>
              <h2 class="panel-title"><center><font size="5"></i>Lista De Usuarios Registrados</font></center></h2>

            <div class="panel-body">              
                <div class=" col-md-12">                                 
                          <br>
                          <br>
                            <div class="table-responsive">	
                                						                        	
                                <table class="table">
                                    <thead>
                                        <th>Número de Control</th>                                
                                        <th>Nombre</th>
                                        <th>Apellido Paterno</th>
                                        <th>Apellido Materno</th>
                                        <th>Correo</th>
                                        <th>Acción</th>
                                    </thead>
                                    <tbody>
                                        @foreach($nuevoegre as $nuevos)
                                            <tr>
                                                <td>{{ $nuevos->numero_control }}</td>
                                                <td>{{ $nuevos->nombres }}</td>
                                                <td>{{ $nuevos->apellido_paterno }}</td>
                                                <td>{{ $nuevos->apellido_materno }}</td>
                                                <td>{{ $nuevos->email }}</td>
                                                
                                                <td>
                                                    <a href="{{ url('/nuevoegresado/'.$nuevos->id.'/edit') }}" class="btn btn-primary">Validar</a>
                                                    @include('administradora.deleteegre',['usuario' => $nuevos])
                                                </td>
                                                
                                                    
                                                
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                </div>
            </div>
          </div>
        </div>
</div>

<div class="container">      
    <div class="col-sm-10" >

      <div class="panel panel-success"><br>
          <h2 class="panel-title"><center><font size="5"></i>Lista De Usuarios Rechazados</font></center></h2>

        <div class="panel-body">              
            <div class=" col-md-12">                                 
                      <br>
                      <br>
                        <div class="table-responsive">	
                                                                                
                            <table class="table">
                                <thead>
                                    <th>Número de Control</th>                                
                                    <th>Nombre</th>
                                    <th>Apellido Paterno</th>
                                    <th>Apellido Materno</th>
                                    <th>Correo</th>
                                    <th>Acción</th>
                                </thead>
                                <tbody>
                                    @foreach($rechazoegre as $nuevos)
                                        <tr>
                                            <td>{{ $nuevos->numero_control }}</td>
                                            <td>{{ $nuevos->nombres }}</td>
                                            <td>{{ $nuevos->apellido_paterno }}</td>
                                            <td>{{ $nuevos->apellido_materno }}</td>
                                            <td>{{ $nuevos->email }}</td>
                                            
                                            <td>
                                                <a href="{{ url('editardatosrechazo/'.$nuevos->id.'/registroegresado') }}" class="btn btn-primary">Editar Y Validar</a>
                                                @include('administradora.deleteegre',['usuario' => $nuevos])
                                            </td>
                                            
                                                
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
            </div>
        </div>
      </div>
    </div>
</div>
                      
                     
                  
@endsection