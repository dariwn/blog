@extends('empresa.inicio1')
@section('colores')
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/hola.css')}}">
     <link rel="stylesheet" type="text/css" href="{{URL::asset('css/estilo.css')}}">
         <link rel="stylesheet" type="text/css" href="{{URL::asset('css/font-awesome.min.css')}}">
         <link rel="stylesheet" type="text/css" href="{{URL::asset('css/main.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/main.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="{{URL::asset('css/perfil.css')}}">


@stop

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
					<img src="{{asset('imagenes/'.$empresa->imagen)}}" height="180px" width="180px" class="img-thumbnail"/>
				</div>
				<br>				
					
				</div>
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-condensed">
                    <tbody>
                      <tr>
                        <td class='col-md-3'>Nombre de la Empresa:</td>
                        <td><input type="text" class="form-control input-sm" value="{{$empresa->nombre}}" readonly></td>
                      </tr>
                      <tr>
                      	<tr>
                        <td class='col-md-3'>RFC:</td>
                        <td><input type="text" class="form-control input-sm" id="rfc" value="{{$empresa->rfc}}"readonly></td>
                      </tr>
                      <tr>
                      	<tr>
                        <td class='col-md-3'>Descripción:</td>
                        <td><input type="text" class="form-control input-sm" id="rfc" value="{{$empresa->descripcion}}"readonly></td>
                      </tr>
                      
                      <tr>
                      	<tr>
                        <td class='col-md-3'>Dirección</td>
                        <td><input type="text" class="form-control input-sm" id="direccion" value="{{$empresa->calle}}" readonly></td>
                      </tr>
                      
                      <tr>
                        <td>Colonia:</td>
                        <td><input type="text" class="form-control input-sm" id="direccion" value="{{$empresa->colonia}}" readonly></td>
                      </tr>
                      @if($empresa->numeroexterior == 0)
                        <tr>
                          <td>Número Exterior:</td>
                          <td><input type="text" class="form-control input-sm" id="direccion" value="" readonly></td>
                        </tr>
                      @endif
                      @if($empresa->numeroexterior != 0)
                      <tr>
                        <td>Número Exterior:</td>
                        <td><input type="text" class="form-control input-sm" id="direccion" value="{{$empresa->numeroexterior}}" readonly></td>
                      </tr>
                      @endif

                      @if($empresa->codigo_postal == 0)
					            <tr>
                        <td>Código Postal:</td>
                        <td><input type="" class="form-control input-sm" id="codigo" value=""readonly></td>
                      </tr>
                      @endif
                      @if($empresa->codigo_postal != 0)
					            <tr>
                        <td>Código Postal:</td>
                        <td><input type="" class="form-control input-sm" id="codigo" value="{{$empresa->codigo_postal}}"readonly></td>
                      </tr>
                      @endif

                      @if($empresa->telefono == 0)
                      <tr>
                        <td>Teléfono:</td>
                        <td> <input type="" class="form-control input-sm" id="codigo" value=""readonly>   </td>
                      </tr>
                      @endif
                      @if($empresa->telefono != 0)
                      <tr>
                        <td>Teléfono:</td>
                        <td> <input type="" class="form-control input-sm" id="codigo" value="{{$empresa->telefono}}"readonly>   </td>
                      </tr>
                      @endif

					  
					            <tr>
                        <td>País:</td>
                        <td><input type="text" class="form-control input-sm" id="estado" value="{{$empresa->pais->nombre}}" readonly></td>
                      </tr>
                      
					            <tr>
                        <td>Estado:</td>
                        <td><input type="text" class="form-control input-sm" id="estado" value="{{$empresa->estado->nombre_estado}}" readonly></td>
                      </tr>              
                      
                      <tr>
                        <td>Municipio</td>
                        <td><input type="text" class="form-control input-sm" id="estado" value="{{$empresa->municipio->nombre_localidad}}" readonly></td>
                      </tr>
					  
					 
					  <tr>
                        <td>Datos Del Contacto:</td>                    
					  </tr>

                      <tr>
                        <td>Nombre (s):</td>
                        <td><input type="text" class="form-control input-sm" id="nombre1" value="{{$empresa->names}}" readonly></td>
					  </tr>
					  
					  <tr>
                        <td>Apellido Paterno:</td>
                        <td><input type="text" class="form-control input-sm" id="apellidos" value="{{$empresa->apellido_paterno}}" readonly></td>
					  </tr>
					  
					  <tr>
                        <td>Apellido Materno:</td>
                        <td><input type="text" class="form-control input-sm" id="apellidos" value="{{$empresa->apellido_materno}}" readonly></td>
					  </tr>
					  
					  <tr>
                        <td>Cargo:</td>
                        <td><input type="text" class="form-control input-sm" id="cargo" value="{{$empresa->cargo}}" readonly></td>
					  </tr>
					  
					  <tr>
                        <td>Teléfono:</td>
                        <td> <input type="text" class="form-control input-sm" id="telefono" value="{{$empresa->numero_cel}}" readonly></td>
					  </tr>
					  
					  <tr>
                        <td>Correo Electrónico:</td>
                        <td><input type="text" class="form-control input-sm" id="email" value="{{$empresa->email}}"readonly></td>
                      </tr>
                      
                      <td>
						<a href="{{route('empresa.edit',$empresa)}}"><button class="btn btn-primary">Editar</button></a>
                     </td>
                     
                    </tbody>
                  </table>
@endsection
