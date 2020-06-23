@extends('empresa.inicio')
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
@section('seccion')
<section class="form_wrap">
		<section class="contact_info">
			<section class="info_title">
            <form action="{{route('empresa.update',$empresa->idempresa)}}" method="POST">
                @csrf
                  @method('PUT')
				<img src="{{asset('Imagenes/empresas/'.$empresa->imagen)}}" height="180px" width="180px" class="img-thumbnail"/>
				</span>
				</section>
				<section class="info_items">
			
<label for="names">Nombre de la Empresa</label>
<br><br><input type="text" name="nombre" value="{{$empresa->nombre}}"></br></br>
				
			</section>
		</section>





		<section  class="form_contact">
			<h1>Datos de la Empresa</h1>
			<br><div class="user_info">
				<label for="names">RFC</label>
				<input type="text" id="rfc" name="rfc" value="{{$empresa->rfc}}">
                <label for="names">Descripcion</label>
				<input type="text" id="rfc" name="descripcion" value="{{$empresa->descripcion}}">
                <label for="email">Direccion</label>
				<input type="text" id="direccion" name="calle" value="{{$empresa->calle}}">
                <label for="email">Colonia</label>
				<input type="text" id="direccion" name="colonia" value="{{$empresa->colonia}}">
                <label for="email">Numero Exterior</label>
				<input type="text" id="direccion" name="numeroexterior" value="{{$empresa->numeroexterior}}">
				<label for="names">Codigo Postal</label>
                <input type="text" id="codigo" name="codigo_postal" value="{{$empresa->codigo_postal}}">
                <label for="names">Telefono</label>
                <input type="text" id="codigo" name="telefono" value="{{$empresa->telefono}}">                
                <label for="phone">Pais</label>
				<input type="text" value="{{$empresa->pais->nombre}}" readonly>
                <label for="phone">Estado</label>
                <select type="text" id="estado" name="estado_id">
				 @foreach($estados as $local)
				   @if($local->idestado==$empresa->estado_id)
    		       <option value="{{$local->idestado}}" selected>{{$local->nombre_estado}}</option>
				   @else
				   <option value="{{$local->idestado}}">{{$local->nombre_estado}}</option>
				   @endif
    	  	     @endforeach
				</select>
				<br>
                <label for="phone">Municipio</label>
				<select type="text" name="municipio_id">
				@foreach($localidades as $local)
				  @if($local->idmunicipio==$empresa->municipio_id)
    		      <option value="{{$local->idmunicipio}}" selected>{{$local->nombre_localidad}}</option>
				  @else
				  <option value="{{$local->idmunicipio}}">{{$local->nombre_localidad}}</option>
				  @endif
    		    @endforeach
				</select>

</br>
				<br><h1>Datos del Contacto</h1></br>

				<label for="phone">Nombres</label>
				<input type="text" id="nombre1" name="names" value="{{$empresa->names}}">
				<label for="email">Apellido Paterno</label>
				<input type="text" id="apellidos" name="apellido_paterno" value="{{$empresa->apellido_paterno}}">
                <label for="email">Apellido Materno</label>
				<input type="text" id="apellidos" name="apellido_materno" value="{{$empresa->apellido_materno}}">
                <label for="mensaje">Cargo</label>
				<input type="text" id="cargo" name="cargo" value="{{$empresa->cargo}}">
				<label for="mensaje">Telefono</label>
                <input type="text" id="telefono" name="numero_cel" value="{{$empresa->numero_cel}}">
				<label for="mensaje">Correo Electronico</label>
                <input type="text" id="email" name="email" value="{{$empresa->email}}">
                
                <button class="btn btn-primary" cosa="button" type="submit">Guardar</button>
                
			</div>
       </section>
   </form>
	</section>
@endsection