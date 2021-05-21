
@extends('empresa.inicio1')
@section('contenido')

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script  type="text/javascript">
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
        <div class="col-sm-9 " >

          <div class="panel panel-success"><br>
              <h2 class="panel-title"><center><font size="5"></i>Datos De La Empresa</font></center></h2>

            <div class="panel-body">
              <div class="row">
        <form action="{{route('empresa.store')}}" method="post" enctype="multipart/form-data">
                  @csrf
  
                <div class=" col-md-9 col-lg-10 "> 
                  <table class="table table-condensed">
                    <tbody>
						<tr>
							<td class='col-md-3'>Nombre de la Empresa:</td>
							<td><input type="text" id="nombre" class="form-control input-sm" name="nombre" required></td>
						  </tr>
						  <tr>
							  <tr>
							<td class='col-md-3'>RFC:</td>
							<td><input type="text" id="rfc" class="form-control input-sm" name="rfc" required></td>
						  </tr>
						  <tr>
							  <tr>
							<td class='col-md-3'>Descripción de la Empresa:</td>
							<td><input type="text" class="form-control input-sm" id="descripcion" name="descripcion" required></td>
						  </tr>
						  
						  <tr>
							  <tr>
							<td class='col-md-3'>Dirección</td>
							<td><input type="text" class="form-control input-sm" id="direccion" name="calle" required></td>
						  </tr>
						  
						  <tr>
							<td>Colonia:</td>
							<td><input type="text" id="colonia" class="form-control input-sm" name="colonia" required></td>
						  </tr>
						  <tr>
							<td>Número Exterior:</td>
							<td><input type="number" class="form-control input-sm" name="numeroexterior" required></td>
						  </tr>
						  <tr>
							<td>Codigo Postal:</td>
							<td><input type="number" class="form-control input-sm" name="codigo_postal" required></td>
						  </tr>
	
						  <tr>
							<td>Teléfono:</td>
							<td> <input type="number" id="telefono" class="form-control input-sm" name="telefono" required></td>
						  </tr>

						  <tr>
							<td >País:</td>
							<td class="form-control input-sm"><select name="pais_id">
								@foreach($paises as $local)
							<option value="{{$local->idpais}}">{{$local->nombre}}</option>
							@endforeach
							</select></td>
						  </tr>

						  <tr>
							  <td>Estado: </td>
							  <td class="form-control input-sm">
								<select name="estado_id" id="estado">
								<option value="#">Selecciona un opcion</option>
									@foreach($estados as $local)
								<option value="{{$local->idestado}}">{{$local->nombre_estado}}</option>
								@endforeach
								</select>
							  </td>
						  </tr>
						  
						  <tr>
							  <td>Municipio</td>
							  <td class="form-control input-sm">
                  <select name="municipio_id" id="municipio" placeholder="Seleccionar">       
                  </select>
							  </td>
              </tr>
              
              <tr>
                <td>Imagen:</td>
                <td><input type="file" name="imagen" class="form-control" id="file" onchange="Filevalidation();" required></td>
              </tr>
						
						  <tr>
							<td>Datos Del Contacto:</td>                    
						  </tr>
	
						  <tr>
							<td>Nombre (s):</td>
							<td><input type="text" id="names" class="form-control input-sm" name="names" required></td>
						  </tr>
						  
						  <tr>
							<td>Apellido Paterno:</td>
							<td><input type="text" id="apellido" class="form-control input-sm" name="apellido_paterno" required></td>
						  </tr>
						  
						  <tr>
							<td>Apellido Materno:</td>
							<td><input type="text" id="apellido" class="form-control input-sm" name="apellido_materno" required></td>
						  </tr>
						  
						  <tr>
							<td>Cargo:</td>
							<td><input type="text" id="cargo" class="form-control input-sm" name="cargo" required></td>
						  </tr>
						  
						  <tr>
							<td>Telefono:</td>
							<td> <input type="number" id="celular" class="form-control input-sm" name="numero_cel" required></td>
						  </tr>
						  
						  <tr>
							<td>Correo Electronico:</td>
							<td><input type="text" class="form-control input-sm" name="email" value="{{ $usuario1 }}"></td>
						  </tr>
						
						  <td>
                <button type="submit" class="btn btn-primary">Finalizar Registro</button>
						 </td>


	
                    </tbody>
                  </table>
</form>
@endsection