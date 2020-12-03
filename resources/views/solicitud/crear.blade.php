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
<form action="{{ route('solicitud.store') }}" method="POST">
  @csrf 
   
         
        </div>
                <div class=" col-md-12 col-lg-12 "> 
                  <table class="table table-condensed">
                    <tbody>
						  <tr>
							<td class='col-md-3'>Nombre del Puesto:</td>
							<td><input type="text" id="puesto" class="form-control" placeholder="Nombre del Puesto" name="nombredelpuesto" /></td>
                          </tr>
                          
						  <tr>							
							<td class='col-md-3'>Tiempo de Contratación:</td>
							<td><input type="text" id="tiempocontratacion" class="form-control" placeholder="Tiempo de Contratacion" name="tiempo_de_contratacion" /></td>
						  </tr>
						  <tr>
							  <tr>
							<td class='col-md-3'>Salario:</td>
							<td><input type="number" class="form-control" placeholder="Salario" name="salario" /></td>
						  </tr>
						  
						  <tr>
							  <tr>
							<td class='col-md-3'>Edad Minima- Edad Maxima</td>
							<td><input type="text" id="edad" class="form-control" placeholder="Edad minima-Edad Maxima" name="edades" /></td>
						  </tr>
						  
						  <tr>
							<td>Horario:</td>
							<td><input type="text" id="horario" class="form-control" placeholder="Horario" name="horario" /></td>
						  </tr>
						  <tr>
							<td>Estado Civil:</td>
							<td><input type="text" id="estadocivil"  class="form-control" placeholder="Estado Civil" name="estado_civil" /></td>
                          </tr>
                          
						  <tr>
							<td>Sexo:</td>
							<td><select type="text" class="form-control"  placeholder="Sexo" name="idsexo" >
                                @foreach($generos as $genero)
                                <option value="{{$genero->idgenero}}">{{$genero->sexo}}</option>
                                @endforeach
                                </select></td>
						  </tr>
	
						  <tr>
							<td>Requisitos:</td>
							<td><input type="text" id="requisitos" class="form-control" placeholder="Requisitos" name="requisito"/></td>
						  </tr>

						  <tr>
							<td>Descripcion del Puesto:</td>
							<td><input type="text" id="descripcionpuesto" class="form-control"  placeholder="Descripcion del Puesto" name="descripcion_del_puesto" /></td>
						  </tr>

						  
						  <tr>
							<td>Cambio de Residencia:</td>
							<td><input type="text" id="cambioresidencia" class="form-control" placeholder="Cambio de Resisdencia" name="cambio_de_residencia" />
                                <input type="hidden" name="id_empresa" value="{{$empresas}}">
                                <input type="hidden" name="estatus" value="Vigente"></td>
                          </tr>
                          
                                                  
						
                    </tbody>
                  </table>

                  <label> Perfiles Requeridos: </label>
                  <div>
                    @foreach($perfiles as $perfil)
                    <input type="checkbox" name="perfil[]" value="{{$perfil->idperfiles}}">
                    <span> {{$perfil->carrera}} </span> <br>
                    @endforeach
                  </div>

                  <input type="hidden" name="estatus" value="Vigente">
                <input type="hidden" name="id_empresa" value="{{$empresas}}">
                  <br>
                  <input type="submit" class="btn btn-success" value="Publicar Vacante"/>
</form>
@endsection
