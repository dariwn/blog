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
  </script>

<div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 toppad" >

          <div class="panel panel-success"><br>
              <h2 class="panel-title"><center><font size="5"></i>PERFIL</font></center></h2>

            <div class="panel-body">
              <div class="row">
<form action="{{route('empresa.update',$empresa->idempresa)}}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')
          
                <div class="col-md-3 col-lg-3 " align="center"> 
        <div id="load_img">
          <img class="img-responsive" src="{{asset('Imagenes/empresas/'.$empresa->imagen)}}" height="150px" width="150px">
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
          <div class="row">
              <div class="col-md-12">
              
            </div>
            
          </div>
        </div>
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-condensed">
                    <tbody>
						<tr>
							<td class='col-md-3'>Nombre de la Empresa:</td>
							<td><input type="text" class="form-control input-sm" name="nombre" value="{{$empresa->nombre}}"></td>
						  </tr>
						  <tr>
							  <tr>
							<td class='col-md-3'>RFC:</td>
							<td><input type="text" class="form-control input-sm" name="rfc" value="{{$empresa->rfc}}"></td>
						  </tr>
						  <tr>
							  <tr>
							<td class='col-md-3'>Descripción:</td>
							<td><input type="text" class="form-control input-sm" name="descripcion" value="{{$empresa->descripcion}}"></td>
						  </tr>
						  
						  <tr>
							  <tr>
							<td class='col-md-3'>Dirección</td>
							<td><input type="text" class="form-control input-sm" name="calle" value="{{$empresa->calle}}"></td>
						  </tr>
						  
						  <tr>
							<td>Colonia:</td>
							<td><input type="text" class="form-control input-sm" name="colonia" value="{{$empresa->colonia}}"></td>
						  </tr>
						  <tr>
							<td>Numero Exterior:</td>
							<td><input type="text" class="form-control input-sm" name="numeroexterior" value="{{$empresa->numeroexterior}}"></td>
						  </tr>
						  <tr>
							<td>Codigo Postal:</td>
							<td><input type="" class="form-control input-sm" name="codigo_postal" value="{{$empresa->codigo_postal}}"></td>
						  </tr>
	
						  <tr>
							<td>Telefono:</td>
							<td> <input type="" class="form-control input-sm" name="telefono" value="{{$empresa->telefono}}"></td>
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
								<select type="text" name="municipio_id" class="form-control input-sm">
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
							<td><input type="text" class="form-control input-sm" name="names" value="{{$empresa->names}}"></td>
						  </tr>
						  
						  <tr>
							<td>Apellido Paterno:</td>
							<td><input type="text" class="form-control input-sm" name="apellido_paterno" value="{{$empresa->apellido_paterno}}"></td>
						  </tr>
						  
						  <tr>
							<td>Apellido Materno:</td>
							<td><input type="text" class="form-control input-sm" name="apellido_materno" value="{{$empresa->apellido_materno}}"></td>
						  </tr>
						  
						  <tr>
							<td>Cargo:</td>
							<td><input type="text" class="form-control input-sm" name="cargo" value="{{$empresa->cargo}}"></td>
						  </tr>
						  
						  <tr>
							<td>Telefono:</td>
							<td> <input type="text" class="form-control input-sm" name="numero_cel" value="{{$empresa->numero_cel}}"></td>
						  </tr>
						  
						  <tr>
							<td>Correo Electronico:</td>
							<td><input type="text" class="form-control input-sm" name="email" value="{{$empresa->email}}"></td>
						  </tr>
						
						  <td>
							<button class="btn btn-primary">Guardar</button></a>
						 </td>


	
                    </tbody>
                  </table>
</form>
@endsection
