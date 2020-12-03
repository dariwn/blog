
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

</script>

<div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 toppad" >

          <div class="panel panel-success"><br>
              <h2 class="panel-title"><center><font size="5"></i>Datos De La Empresa</font></center></h2>

            <div class="panel-body">
              <div class="row">
        <form action="{{route('empresa.store')}}" method="post" enctype="multipart/form-data">
                  @csrf
  
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-condensed">
                    <tbody>
						<tr>
							<td class='col-md-3'>Nombre de la Empresa:</td>
							<td><input type="text" class="form-control input-sm" name="nombre" ></td>
						  </tr>
						  <tr>
							  <tr>
							<td class='col-md-3'>RFC:</td>
							<td><input type="text" class="form-control input-sm" name="rfc" ></td>
						  </tr>
						  <tr>
							  <tr>
							<td class='col-md-3'>Descripción de la Empresa:</td>
							<td><input type="text" class="form-control input-sm" name="descripcion" ></td>
						  </tr>
						  
						  <tr>
							  <tr>
							<td class='col-md-3'>Dirección</td>
							<td><input type="text" class="form-control input-sm" name="calle" ></td>
						  </tr>
						  
						  <tr>
							<td>Colonia:</td>
							<td><input type="text" class="form-control input-sm" name="colonia" ></td>
						  </tr>
						  <tr>
							<td>Numero Exterior:</td>
							<td><input type="text" class="form-control input-sm" name="numeroexterior" ></td>
						  </tr>
						  <tr>
							<td>Codigo Postal:</td>
							<td><input type="number" class="form-control input-sm" name="codigo_postal"></td>
						  </tr>
	
						  <tr>
							<td>Telefono:</td>
							<td> <input type="number" class="form-control input-sm" name="telefono" ></td>
						  </tr>

						  <tr>
							<td >Pais:</td>
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
                <td><input type="file" name="imagen" class="form-control" id="file" onchange="Filevalidation();"></td>
              </tr>
						
						  <tr>
							<td>Datos Del Contacto:</td>                    
						  </tr>
	
						  <tr>
							<td>Nombre (s):</td>
							<td><input type="text" class="form-control input-sm" name="names" ></td>
						  </tr>
						  
						  <tr>
							<td>Apellido Paterno:</td>
							<td><input type="text" class="form-control input-sm" name="apellido_paterno" ></td>
						  </tr>
						  
						  <tr>
							<td>Apellido Materno:</td>
							<td><input type="text" class="form-control input-sm" name="apellido_materno" ></td>
						  </tr>
						  
						  <tr>
							<td>Cargo:</td>
							<td><input type="text" class="form-control input-sm" name="cargo" ></td>
						  </tr>
						  
						  <tr>
							<td>Telefono:</td>
							<td> <input type="text" class="form-control input-sm" name="numero_cel" ></td>
						  </tr>
						  
						  <tr>
							<td>Correo Electronico:</td>
							<td><input type="text" class="form-control input-sm" name="email" ></td>
						  </tr>
						
						  <td>
                <button type="submit" class="btn btn-primary">Finalizar Registro</button>
						 </td>


	
                    </tbody>
                  </table>
</form>
@endsection