@extends('egresado.inicio')
@section('contenido')
<script type="text/javascript">

  Filevalidation = () => { 
		const fi = document.getElementById('file'); 
		// Check if any file is selected. 
		if (fi.files.length > 0) { 
			for (const i = 0; i <= fi.files.length - 1; i++) { 

				const fsize = fi.files.item(i).size; 
				const file = Math.round((fsize / 1024)); 
				// The size of the file. 
				if (file >= 2000) { 
					alert( 
					"El archivo que intenta subir es demasiado grande, seleccione un archivo menor a 2 Mb (2048 Kilobytes)"); 
				} else { 
					document.getElementById('size').innerHTML = '<b>'
					+ file + '</b> KB'; 
				} 
			} 
		} 
	} 

  
  $(document).ready(function () {
    $('input#numero_cel')
        .keypress(function (event) {
        if (event.which < 48 || event.which > 57 || this.value.length === 10) {
            return false;
        }
        });
    });

    $(document).ready(function () {
    $('input#domicilio')
        .keypress(function (event) {
        if (this.value.length === 50) {
            return false;
        }
        });
    });

    $(document).ready(function () {
    $('input#colonia')
        .keypress(function (event) {
        if (this.value.length === 40) {
            return false;
        }
        });
    });

    $(document).ready(function () {
    $('input#nombres')
        .keypress(function (event) {
        if (this.value.length === 100) {
            return false;
        }
        });
    });

    $(document).ready(function () {
    $('input#apellidos')
        .keypress(function (event) {
        if (this.value.length === 60){
            return false;
        }
        });
    });
</script>

<div class="container">
      <div class="row">
        <div class="col-md-9" >

          <div class="panel panel-success"><br>
              <h2 class="panel-title"><center><font size="5"></i>PERFIL</font></center></h2>

            <div class="panel-body">
              <div class="row">
<form action="{{ route('egresado.update',$egresado->idegresado) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')
          
                <div class="col-md-3 col-lg-3 " align="center"> 
        <div id="load_img">
          <img class="img-responsive" src="{{asset('img/'.$egresado->imagen)}}" height="150px" width="150px">
        </div>

        <div class="form-row">
          <div class="col">
              <div class="input-group-prepend">
                  <label class="input-group-text">Subir Imagen: </label>
                  <input accept="image/*" type="file" id="file" name="file" onchange="Filevalidation();">
              </div> 
          </div>                               
        </div>

        <br>        
          <div class="row">
              <div class="col-md-12">
              
            </div>
            
          </div>
        </div>
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-condensed">
                    <tbody>
                      <tr>
                        <td class='col-md-3'>Nombre(S):</td>
                        <td><input type="text" class="form-control input-sm" id="nombres" name="nombres" value="{{$egresado->nombres}}" required></td>
                      </tr>
                      <tr>
                        <tr>
                        <td class='col-md-3'>Apellido Paterno</td>
                        <td><input type="text" class="form-control input-sm" id="apellidos" name="apellido_paterno" value="{{$egresado->apellido_paterno}}" required></td>
                      </tr>
                      <tr>
                        <tr>
                        <td class='col-md-3'>Apellido Materno:</td>
                        <td><input type="text" class="form-control input-sm" id="apellidos" name="apellido_materno" value="{{$egresado->apellido_materno}}" required></td>
                      </tr>

                      <tr>
                        <tr>
                        <td class='col-md-3'>Domicilio</td>
                        <td><input type="text" class="form-control input-sm"  maxlength="49" name="domicilio" value="{{$egresado->domicilio}}" required></td>
                      </tr>
                      <tr>
                        <td>Fecha de Nacimiento:</td>
                        <td><input type="date" class="form-control input-sm" name="fecha_de_nac" value="{{$egresado->fecha_de_nac}}" required></td>
                      </tr>
                      <tr>
                        <td>Correo electrónico:</td>
                        <td><input type="email" class="form-control input-sm" name="correo" value="{{$egresado->correo}}" readonly ></td>
                      </tr>
            <tr>
                        <td>Telefono:</td>
                        <td><input type="number" id="numero_cel" class="form-control input-sm" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" required name="numero_cel" value="{{$egresado->numero_cel}}"></td>
                      </tr>

                      <tr>
                        <td>Sexo:</td>
                        <td><select name="genero_id" class="form-control input-sm" required>
                        @foreach($generos as $genero)
                            @if($genero->idgenero==$egresado->genero_id)
                              <option value="{{$genero->idgenero}}" selected>{{$genero->sexo}}</option>
                              @else
                              <option value="{{$genero->idgenero}}">{{$genero->sexo}}</option>
                              @endif
                              @endforeach
                        </select>
                        </td>
                      </tr>
                      
            <tr>
                        <td>Carrera:</td>
                        <td><select name="perfiles_id" class="form-control input-sm" required>
                          @foreach($perfiles as $perfil)
                            @if($perfil->idperfiles==$egresado->perfiles_id)
                                <option value="{{$perfil->idperfiles}}" selected>{{$perfil->carrera}}</option>
                                @else
                                <option value="{{$perfil->idperfiles}}">{{$perfil->carrera}}</option>
                                @endif
                          @endforeach  
                        </select>
                        </td>
                      </tr>
            <tr>
                        <td>Pais:</td>
                        <td><input type="text" class="form-control input-sm" name="Pais" value="{{$egresado->pais->nombre}}" required></td>
                      </tr>
            <tr>
                        <td>Estado:</td>
                        <td><select name="estado_id" id="estado" class="form-control input-sm" required>
                          @foreach($estados as $estado)
                            @if($estado->idestado==$egresado->estado_id)
                                <option value="{{$estado->idestado}}" selected>{{$estado->nombre_estado}}</option>
                                @else
                                <option value="{{$estado->idestado}}">{{$estado->nombre_estado}}</option>
                                @endif
                          @endforeach  
                        </select>
                        </td>
            </tr>
                      <tr>
                        <td>Municipio</td>
                        <td><select name="municipio_id" id="municipio" class="form-control input-sm" required>
                          @foreach($localidades as $localidad)
                            @if($localidad->idmunicipio==$egresado->municipio_id)
                                <option value="{{$localidad->idmunicipio}}" selected>{{$localidad->nombre_localidad}}</option>
                                @else
                                <option value="{{$localidad->idmunicipio}}">{{$localidad->nombre_localidad}}</option>
                                @endif
                          @endforeach  
                        </select>
                        </td>
                      </tr>
                      </tr>
                   
                      <tr>
                        <td>Colonia</td>
                        <td><input type="text" class="form-control input-sm" maxlength="39" name="colonia" value="{{$egresado->colonia}}" required></td>
                      </tr>
                      
                      <td>
                        <button class="btn btn-primary">Guardar</button></a>
                     </td>
                     
                    </tbody>
                  </table>
</form>
@endsection