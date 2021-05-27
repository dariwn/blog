@extends('empresa.inicio1')
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
    $('input#nombre')
        .keypress(function (event) {
        if (this.value.length === 30) {
            return false;
        }
        });
    });

	$(document).ready(function () {
    $('input#rfc')
        .keypress(function (event) {
        if (this.value.length === 50) {
            return false;
        }
        });
    });

	$(document).ready(function () {
    $('input#descripcion')
        .keypress(function (event) {
        if (this.value.length === 60) {
            return false;
        }
        });
    });

	$(document).ready(function () {
    $('input#direccion')
        .keypress(function (event) {
        if (this.value.length === 40) {
            return false;
        }
        });
    });

	$(document).ready(function () {
    $('input#colonia')
        .keypress(function (event) {
        if (this.value.length === 50) {
            return false;
        }
        });
    });

	
	$(document).ready(function () {
    $('input#telefono')
        .keypress(function (event) {
        if (this.value.length === 10) {
            return false;
        }
        });
    });

	$(document).ready(function () {
    $('input#celular')
        .keypress(function (event) {
        if (this.value.length === 10) {
            return false;
        }
        });
    });

	$(document).ready(function () {
    $('input#cargo')
        .keypress(function (event) {
        if (this.value.length === 50) {
            return false;
        }
        });
    });

	$(document).ready(function () {
    $('input#names')
        .keypress(function (event) {
        if (this.value.length === 20) {
            return false;
        }
        });
    });

	$(document).ready(function () {
    $('input#apellido')
        .keypress(function (event) {
        if (this.value.length === 40) {
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
		<form action="{{route('empresa.update',$empresa->idempresa)}}" method="POST" enctype="multipart/form-data">
		@csrf
		@method('PUT')
          
        <div class="col-md-2 col-lg-4 " align="center"> 
			<div id="load_img">
			<img class="img-responsive" src="{{asset('imagenes/'.$empresa->imagen)}}" height="150px" width="150px">
			</div>
			
			<div class="form-row">
				<div class="col">
					<div class="input-group-prepend">
						<label class="input-group-text">Subir Imagen: </label>
						<input accept="image/*" type="file" id="file" name="imagen" onchange="Filevalidation();">
					</div> 
				</div>                               
			</div>
        <br>                  
        </div>
                <div class=" col-md-8 "> 
                  <table class="table table-condensed">
                    <tbody>
						<tr>
							<td class='col-md-3'>Nombre de la Empresa:</td>
							<td><input type="text" id="nombre" class="form-control input-sm" name="nombre" value="{{$empresa->nombre}}" required></td>
						  </tr>
						  <tr>
							  <tr>
							<td class='col-md-3'>RFC:</td>
							<td><input type="text" id="rfc" class="form-control input-sm" name="rfc" value="{{$empresa->rfc}}" required></td>
						  </tr>
						  <tr>
							  <tr>
							<td class='col-md-3'>Descripción:</td>
							<td><input type="text" id="descripcion" class="form-control input-sm" name="descripcion" value="{{$empresa->descripcion}}" required></td>
						  </tr>
						  
						  <tr>
							  <tr>
							<td class='col-md-3'>Dirección</td>
							<td><input type="text" id="direccion" class="form-control input-sm" name="calle" value="{{$empresa->calle}}" required></td>
						  </tr>
						  
						  <tr>
							<td>Colonia:</td>
							<td><input type="text" id="colonia" class="form-control input-sm" name="colonia" value="{{$empresa->colonia}}" required></td>
						  </tr>
						  <tr>
							<td>Numero Exterior:</td>
							<td><input type="text" class="form-control input-sm" name="numeroexterior" value="{{$empresa->numeroexterior}}" required></td>
						  </tr>
						  <tr>
							<td>Codigo Postal:</td>
							<td><input type="number" class="form-control input-sm" name="codigo_postal" value="{{$empresa->codigo_postal}}" required></td>
						  </tr>
	
						  <tr>
							<td>Telefono:</td>
							<td> <input type="number" id="telefono" class="form-control input-sm" name="telefono" value="{{$empresa->telefono}}" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" required></td>
						  </tr>

						  <tr>
							<td>Pais:</td>
							<td><input type="text" class="form-control input-sm" name="estado" value="{{$empresa->pais->nombre}}" readonly></td>
						  </tr>

						  <tr>
							  <td>Estado: </td>
							  <td>
								<select type="text" id="estado" name="estado_id" class="form-control input-sm">
									@foreach($estados as $local)
									@if($local->idestado==$empresa->estado_id)
									<option value="{{$local->idestado}}" selected>{{$local->nombre_estado}}</option>
									@else
									<option value="{{$local->idestado}}">{{$local->nombre_estado}}</option>
									@endif
									@endforeach
									</select>
							  </td>
						  </tr>
						  
						  <tr>
							  <td>Municipio</td>
							  <td>
								<select type="text" name="municipio_id" id="municipio" class="form-control input-sm">
									@foreach($localidades as $local)
									@if($local->idmunicipio==$empresa->municipio_id)
									<option value="{{$local->idmunicipio}}" selected>{{$local->nombre_localidad}}</option>
									@else
									<option value="{{$local->idmunicipio}}">{{$local->nombre_localidad}}</option>
									@endif
									@endforeach
									</select>
							  </td>
						  </tr>
						
						  <tr>
							<td>Datos Del Contacto:</td>                    
						  </tr>
	
						  <tr>
							<td>Nombre (s):</td>
							<td><input type="text" id="names" class="form-control input-sm" name="names" value="{{$empresa->names}}" required></td>
						  </tr>
						  
						  <tr>
							<td>Apellido Paterno:</td>
							<td><input type="text" id="apellido" class="form-control input-sm" name="apellido_paterno" value="{{$empresa->apellido_paterno}}" required></td>
						  </tr>
						  
						  <tr>
							<td>Apellido Materno:</td>
							<td><input type="text" id="apellido" class="form-control input-sm" name="apellido_materno" value="{{$empresa->apellido_materno}}" required></td>
						  </tr>
						  
						  <tr>
							<td>Cargo:</td>
							<td><input type="text" id="cargo" class="form-control input-sm" name="cargo" value="{{$empresa->cargo}}" required></td>
						  </tr>
						  
						  <tr>
							<td>Telefono:</td>
							<td> <input type="number" id="celular" class="form-control input-sm" name="numero_cel" value="{{$empresa->numero_cel}}" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" required></td>
						  </tr>
						  
						  <tr>
							<td>Correo Electronico:</td>
							<td><input type="text" class="form-control input-sm" name="email" value="{{$empresa->email}}" required readonly></td>
						  </tr>
						
						  <td>
							<button class="btn btn-primary">Guardar</button></a>
						 </td>


	
                    </tbody>
                  </table>
				</div>
				  
</form>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
</div>

@endsection
