
@extends('administradora.inicio3')
@section('contenido')

<div class="container">      
        <div class="col-sm-10" >

          <div class="panel panel-success"><br>
              <h2 class="panel-title"><center><font size="5"></i>Todas Las Vacantes Registradas</font></center></h2>

            <div class="panel-body">              
                <div class=" col-md-12">                                                             
                          <br>
                            <div class="card-body">	                               					                        	
                                <table class="table table-hover" style="table-layout: fixed; border-collapse: collapse;">
                                    <thead>
                                        <th>Nombre De La Empresa</th>                                
                                        <th>Nombre Del Puesto</th>
                                        <th>Descripción Del Puesto</th>
                                        <th>Perfiles Solicitados</th>
                                        <th>Acción</th>
                                    </thead>
                                    <tbody>
                                        @foreach($todasVacantes as $vacantes)
                                        <?php 
                                            $empresa = DB::table('empresas')->where('idempresa',$vacantes->id_empresa)->first();
                                            $perfiles = DB::table('solicitudperfil')->where('idsolicitud',$vacantes->idsolicitud)->get();                                            
                                        ?>
                                            <tr>
                                                <td>{{ $empresa->nombre }}</td>        
                                                <td>{{ $vacantes->nombredelpuesto}}</td>
                                                <td>{{ $vacantes->descripcion_del_puesto}}</td>
                                                <td>
                                                    @foreach ($perfiles as $perfil)
                                                        <?php  $p = DB::table('perfiles')->where('idperfiles', $perfil->idperfiles)->get(); ?>
                                                        {{ $p[0]->carrera }},
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <a href="{{url('ver_todos_postulados/'.$vacantes->idsolicitud)}}" class="btn btn-primary">Ver Postulados</a>
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

<br>
<div class="row justify-content-center">
    {!! $todasVacantes->render() !!}
</div>               
                     
                  
@endsection