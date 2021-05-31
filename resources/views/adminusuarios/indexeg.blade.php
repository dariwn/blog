
@extends('administradora.inicio3')
@section('contenido')

<div class="container">      
        <div class="col-sm-10" >

          <div class="panel panel-success"><br>
              <h2 class="panel-title"><center><font size="5"></i>Lista De Usuarios Egresados</font></center></h2>

            <div class="panel-body">              
                <div class=" col-md-12"> 
                         <center>
                            <form class="form-inline my-2" method="get" action="{{ route ('usuarios-egresados.index') }}">	
                                <input class="form-control mr-sm-2" type="search" name="username" placeholder="User Name" aria-label="Search" >
                                
                                <button class="btn btn-success my-2 my-sm-0" type="submit">Buscar</button>
                              </form>
                        </center>           
                          <br>
                          <br>
                            <div class="card-body">	
                                						                        	
                                <table class="table table-hover" style="table-layout: fixed; border-collapse: collapse;">
                                    <thead>
                                        <th>Usuario</th>                                
                                        <th>Acciones</th>
                                    </thead>
                                    <tbody>
                                        @foreach($usuarios as $user)
                                            <tr>
                                                <td>{{ $user->username }}</td>
        
                                                <td>
                                                    <a href="{{ url('/usuarios-egresados/'.$user->id.'/edit') }}" class="btn btn-primary">Editar</a>
                                                    @include('administradora.deleteuseregre',['usuario' => $user])
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