@extends('egresado.inicio')
@section('contenido')

<div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 toppad" >

          <div class="panel panel-success"><br>
              <h2 class="panel-title"><center><font size="5"></i>PERFIL</font></center></h2>

            <div class="panel-body">
              <div class="row">
			  
                <div class="col-md-3 col-lg-3 " align="center"> 
				<div id="load_img">
          <img class="img-responsive" src="{{asset('imagenes/egresados/IMG-20151016-WA0000.jpg')}}" height="150px" width="150px">
          {{ dd($egresado) }}
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
                        <td><input type="text" class="form-control input-sm" name="nombre_apellido" value="{{$egresado->nombres}}" required readonly></td>
                      </tr>
                      <tr>
                      	<tr>
                        <td class='col-md-3'>Apellido Paterno</td>
                        <td><input type="text" class="form-control input-sm" name="apellido_paterno" value="{{$egresado->apellido_paterno}}" required readonly></td>
                      </tr>
                      <tr>
                      	<tr>
                        <td class='col-md-3'>Apellido Materno:</td>
                        <td><input type="text" class="form-control input-sm" name="apellido_materno" value="{{$egresado->apellido_materno}}" required readonly></td>
                      </tr>
                      
                      <tr>
                      	<tr>
                        <td class='col-md-3'>Domicilio</td>
                        <td><input type="text" class="form-control input-sm" name="domicilio" value="{{$egresado->domicilio}}" required readonly></td>
                      </tr>
                      
                      <tr>
                        <td>Fecha de Nacimiento:</td>
                        <td><input type="text" class="form-control input-sm" name="fecha de nacimiento" value="{{$egresado->fecha_de_nac}}" required readonly></td>
                      </tr>
                      <tr>
                        <td>Correo electrónico:</td>
                        <td><input type="email" class="form-control input-sm" name="correo" value="{{$egresado->correo}}" readonly></td>
                      </tr>
					  <tr>
                        <td>Telefono:</td>
                        <td><input type="text" class="form-control input-sm" required name="telefono" value="{{$egresado->numero_cel}}" readonly></td>
                      </tr>

                      <tr>
                        <td>Sexo:</td>
                        <td><input type="text" class="form-control input-sm" required name="Sexo" value="{{$egresado->genero->sexo}}" readonly></td>
                      </tr>

					  <tr>
                        <td>Carrera:</td>
                        <td><input type="text" class="form-control input-sm" name="carrera" value="{{$egresado->perfiles->carrera}}" required readonly></td>
                      </tr>
					  <tr>
                        <td>Pais:</td>
                        <td><input type="text" class="form-control input-sm" name="Pais" value="{{$egresado->pais->nombre}}" required readonly></td>
                      </tr>
					  <tr>
                        <td>Estado:</td>
                        <td><input type="text" class="form-control input-sm" name="Estado" value="{{$egresado->estado->nombre_estado}}" readonly></td>
                      </tr>
                      <tr>
                        <td>Municipio</td>
                        <td><input type="text" class="form-control input-sm" name="Localidad" value="{{$egresado->municipio->nombre_localidad}}" readonly></td>
                      </tr>
                   
                      <tr>
                        <td>Colonia</td>
                        <td><input type="text" class="form-control input-sm" name="colonia" value="{{$egresado->colonia}}" readonly></td>
                      </tr>
                      
                      <td>
                    <a href="{{route('egresado.edit',$egresado)}}"><button class="btn btn-primary">Editar</button></a>
                     </td>
                     
                    </tbody>
                  </table>
@endsection