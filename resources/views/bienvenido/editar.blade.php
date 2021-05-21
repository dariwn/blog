
@extends('empresa.inicio1')
@section('contenido')
<script type="text/javascript">

function verificar_uno(){
        var suma = 0;
        var checks = document.getElementsByName('perfil[]');
        for (var i = 0, j = checks.length; i < j; i++) {
            if(checks[i].checked == true){
            suma++;
            }
      }
      
      if(suma == 0){
          alert('Debes seleccionar minimo un perfil requerido');
          return false;
      }
    
    }

</script>

<div class="container">
      <div class="row">
        <div class=" col-sm-9" >

          <div class="panel panel-success"><br>
              <h2 class="panel-title"><center><font size="5">Datos De Los Perfiles</font></center></h2>

            <div class="panel-body">
              <div class="row">
<form action="{{route('bienvenido.update',$hola->id)}}"  method="POST" onsubmit="return verificar_uno()">
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
                                        echo "<span style="."font-size:13.0pt".">".$perfilactual[0]->carrera."</span>"."<br>";
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
                        <span style="font-size:13.0pt"> {{$perfil->carrera}} </span> <br>
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