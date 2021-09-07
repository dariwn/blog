
@extends('administradora.inicio3')
@section('contenido')

<div class="container">      
        <div class="col-sm-10" >

          <div class="panel panel-success"><br>
              <h2 class="panel-title"><center><font size="5"></i>Egresados Postulados A La Vacante</font></center></h2>

            <div class="panel-body">              
                <div class=" col-md-12">                                                             
                          <br>
                            <div class="card-body">	                               					                        	
                                <table class="table table-hover" style="table-layout: fixed; border-collapse: collapse;">
                                    <thead>
                                        <th>Nombre Del Alumno</th>                                
                                        <th>Apellido Paterno</th>
                                        <th>Apellido Materno</th>
                                        <th>Correo Electronico</th>
                                        <th>Licenciatura</th>
                                    </thead>
                                    <tbody>
                                        @foreach($todosPostulados as $postulados)
                                        <?php 
                                            $egresado = DB::table('egresado')->where('idegresado',$postulados->idegresado)->first();
                                            $perfil = DB::table('perfiles')->where('idperfiles',$egresado->perfiles_id)->first();
                                        ?>
                                            <tr>
                                                <td>{{ $egresado->nombres }}</td>        
                                                <td>{{ $egresado->apellido_paterno}}</td>
                                                <td>{{ $egresado->apellido_materno}}</td>
                                                <td>{{ $egresado->correo}}</td>
                                                <td>{{ $perfil->carrera}}</td>
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

<br>
<div class="row justify-content-center">
    {!! $todosPostulados->render() !!}
</div>               
                     
                  
@endsection