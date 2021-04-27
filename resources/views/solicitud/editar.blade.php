
@extends('empresa.inicio1')
@section('contenido')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">

    $(document).ready(function () {
    $('input#puesto')
        .keypress(function (event) {
        if (this.value.length === 45) {
            return false;
        }
        });
    });

    $(document).ready(function () {
    $('input#horario')
        .keypress(function (event) {
        if (this.value.length === 50) {
            return false;
        }
        });
    });

    $(document).ready(function () {
    $('input#descripcionpuesto')
        .keypress(function (event) {
        if (this.value.length === 50) {
            return false;
        }
        });
    });

    $(document).ready(function () {
    $('input#tiempocontratacion')
        .keypress(function (event) {
        if (this.value.length === 50) {
            return false;
        }
        });
    });

    $(document).ready(function () {
    $('input#edad')
        .keypress(function (event) {
        if (this.value.length === 50) {
            return false;
        }
        });
    });

    $(document).ready(function () {
    $('input#estadocivil')
        .keypress(function (event) {
        if (this.value.length === 30) {
            return false;
        }
        });
    });

    $(document).ready(function () {
    $('input#requisitos')
        .keypress(function (event) {
        if (this.value.length === 45) {
            return false;
        }
        });
    });

    $(document).ready(function () {
    $('input#cambioresidencia')
        .keypress(function (event) {
        if (this.value.length === 45) {
            return false;
        }
        });
    });

</script>

<div class="container">
      <div class="row">
        <div class=" col-sm-10" >

          <div class="panel panel-success"><br>
              <h2 class="panel-title"><center><font size="5">Datos De La Vacante</font></center></h2>

            <div class="panel-body">
              <div class="row">
<form action="{{ route('solicitud.update',$solicitudes->idsolicitud) }}"  method="POST">
  @csrf 
  @method('PUT')
   
         
        </div>
                <div class=" col-md-12 col-lg-12 "> 
                  <table class="table table-condensed">
                    <tbody>
						  <tr>
							<td class='col-md-3'>Nombre del Puesto:</td>
							<td><input type="text" id="puesto" class="form-control" placeholder="Nombre del Puesto" name="nombredelpuesto" value="{{ $solicitudes->nombredelpuesto }}"/></td>
                          </tr>
                          
						  <tr>							
							<td class='col-md-3'>Tiempo de Contratación:</td>
							<td><input type="text" id="tiempocontratacion" class="form-control" placeholder="Tiempo de Contratacion" name="tiempo_de_contratacion" value="{{ $solicitudes->tiempo_de_contratacion }}"  /></td>
						  </tr>
						  <tr>
							  <tr>
							<td class='col-md-3'>Salario:</td>
							<td><input type="number" class="form-control" placeholder="Salario" name="salario" value="{{ $solicitudes->salario }}" /></td>
						  </tr>
						  
						  <tr>
							  <tr>
							<td class='col-md-3'>Edad Minima- Edad Maxima</td>
							<td><input type="text" id="edad" class="form-control" placeholder="Edad minima-Edad Maxima" name="edades" value="{{ $solicitudes->edades }}" /></td>
						  </tr>
						  
						  <tr>
							<td>Horario:</td>
							<td><input type="text" id="horario" class="form-control" placeholder="Horario" name="horario" value="{{ $solicitudes->horario }}" /></td>
						  </tr>
						  <tr>
							<td>Estado Civil:</td>
							<td><input type="text" id="estadocivil"  class="form-control" placeholder="Estado Civil" name="estado_civil" value="{{ $solicitudes->estado_civil }}"  /></td>
                          </tr>
                          
						  <tr>
							<td>Sexo:</td>
							<td><select type="text" class="form-control"  placeholder="Sexo" name="idsexo">
                                @foreach($generos as $genero)
                                @if($genero->idgenero==$solicitudes->idsexo)
                                <option value="{{$genero->idgenero}}" selected>{{$genero->sexo}}</option>
                                @else
                                <option value="{{$genero->idgenero}}">{{$genero->sexo}}</option>
                                @endif
                                 @endforeach
                                 </select></td>
						  </tr>
	
						  <tr>
							<td>Requisitos:</td>
							<td><input type="text" id="requisitos" class="form-control" placeholder="Requisitos" name="requisito"  value="{{ $solicitudes->requisito }}" /></td>
						  </tr>

						  <tr>
							<td>Descripción del Puesto:</td>
							<td><input type="text" id="descripcionpuesto" class="form-control"  placeholder="Descripcion del Puesto" name="descripcion_del_puesto" value="{{ $solicitudes->descripcion_del_puesto }}" /></td>
						  </tr>

						  
						  <tr>
							<td>Cambio de Residencia:</td>
							<td><input type="text" id="cambioresidencia" class="form-control" placeholder="Cambio de Resisdencia" name="cambio_de_residencia" value="{{ $solicitudes->cambio_de_residencia }}" />
                                <input type="hidden" name="id_empresa" value="{{ $empresas }}">
                                <input type="hidden" name="estatus" value="Vigente">
                          </tr>
                          
                            <tr>
                                <td>
                                    <input type="submit" class="btn btn-primary"  value="Guardar"/>
                                </td>
                            </tr>                      
                          
                    </tbody>
                  </table>

</form>
@endsection
