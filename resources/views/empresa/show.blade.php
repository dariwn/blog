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
				<img src="{{asset('imagenes/empresas/'.$empresa->imagen)}}" height="180px" width="180px" class="img-thumbnail"/>
				</span>
				</section>
				<section class="info_items">
			
<label for="names">Nombre de la Empresa</label>
<br><br><input type="text" value="{{$empresa->nombre}}" readonly><br>
				
			</section>
		</section>





		<section action="" class="form_contact">
			<h1>Datos de la Empresa</h1>
			<br><div class="user_info">
				<label for="names">RFC</label>
				<input type="text" id="rfc" value="{{$empresa->rfc}}"readonly>
                <label for="names">Descripcion</label>
				<input type="text" id="rfc" value="{{$empresa->descripcion}}"readonly>
                <label for="email">Direccion</label>
				<input type="text" id="direccion" value="{{$empresa->calle}}" readonly>
                <label for="email">Colonia</label>
				<input type="text" id="direccion" value="{{$empresa->colonia}}" readonly>
                <label for="email">Numero Exterior</label>
				<input type="text" id="direccion" value="{{$empresa->numeroexterior}}" readonly>
				<label for="names">Codigo Postal</label>
                <input type="" id="codigo" value="{{$empresa->codigo_postal}}"readonly>
                <label for="names">Telefono</label>
                <input type="" id="codigo" value="{{$empresa->telefono}}"readonly>                
                <label for="phone">Pais</label>
				<input type="text" id="estado" value="{{$empresa->pais->nombre}}" readonly>
                <label for="phone">Estado</label>
                <input type="text" id="estado" value="{{$empresa->estado->nombre_estado}}" readonly>
                <label for="phone">Municipio</label>
				<input type="text" id="estado" value="{{$empresa->municipio->nombre_localidad}}" readonly>


<br>
				<br><h1>Datos del Contacto</h1><br>

				<label for="phone">Nombres</label>
				<input type="text" id="nombre1" value="{{$empresa->names}}" readonly>
				<label for="email">Apellido Paterno</label>
				<input type="text" id="apellidos" value="{{$empresa->apellido_paterno}}" readonly>
                <label for="email">Apellido Materno</label>
				<input type="text" id="apellidos" value="{{$empresa->apellido_materno}}" readonly>
                <label for="mensaje">Cargo</label>
				<input type="text" id="cargo" value="{{$empresa->cargo}}" readonly>
				<label for="mensaje">Telefono</label>
                <input type="text" id="telefono" value="{{$empresa->numero_cel}}" readonly>
				<label for="mensaje">Correo Electronico</label>
				<input type="text" id="email" value="{{$empresa->email}}"readonly>

				<a href="{{route('empresa.edit',$empresa)}}"><button type="button" value="EDITAR" id="boton">Editar</button></a>
			</div>
</section>

	</section>
@endsection