
@extends('empresa.inicio1')
@section('contenido')

<div class="container">
      <div class="row">
        <div class=" col-sm-10" >

          <div class="panel panel-success"><br>
              <h2 class="panel-title"><center><font size="5">Datos De Los Perfiles</font></center></h2>

            <div class="panel-body">
              <div class="row">
<form action="{{route('bienvenido.update',$hola->id)}}"  method="POST">
  @csrf 
  @method('PUT')
   
         
        </div>
                <div class=" col-md-12 col-lg-12 "> 
                  <table class="table table-condensed">
                    <tbody>
						  <tr>
							<td class='col-md-3'><h4>Perfiles Seleccionados</h4></td>							
                          </tr>
                          <tr>
                              <td>
                                <label class="radio inline"> 
                                    <?php
                                    $idsoli= DB::table('solicitudperfil')->where('idsolicitud','=',$hola->idsolicitud)->get();
                                    //dd($idsoli);
                                     foreach ($idsoli as $key => $value) {
                                        $perfilactual= DB::table('perfiles')->where('idperfiles','=',$value->idperfiles)->get();
                                        //dd($perfilactual);
                                        echo $perfilactual[0]->carrera."<br>";
                                     }                                                                                                      
                                    ?>   
                              </td>
                          </tr>
                          						                                      
                    </tbody>
                  </table>

                  <br>
                    <h4>Seleccionar Perfiles</h4>
                    <label class="radio inline"> 
                        @foreach($perfiles as $perfil)
                        <input type="checkbox" name="perfil[]" value="{{$perfil->idperfiles}}">
                        <span> {{$perfil->carrera}} </span> <br>
                        @endforeach
                    </label>  

                    <div class="form-group">
                        <input type="hidden" name="idsolicitud" value="{{$sola}}">
                    </div>

                    </div>                                           
                         <input type="submit" class="btn btn-success"  value="Guardar"/>
                    </div>

</form>
@endsection