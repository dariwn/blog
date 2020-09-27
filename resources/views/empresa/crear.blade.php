@extends('empresa.inicio')
@section('colores')

<link rel="stylesheet" type="text/css" href="{{URL::asset('css/hola.css')}}">
     <link rel="stylesheet" type="text/css" href="{{URL::asset('css/estilo1.css')}}">
     <link rel="stylesheet" type="text/css" href="{{URL::asset('css/bootstrap1.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
@stop
@section('seccion')
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
<head>
        
        <title>registro de la empresa</title>

        

    </head>
    <body>

      <form action="{{route('empresa.store')}}" method="post" enctype="multipart/form-data">
      @csrf
        <h1>Datos de la Empresa</h1>
        <h6>Indicar datos de la empresa, obligatorio llenar todos los campos. </h6>
        
        <fieldset>
          
          <label for="name">Nombre de la Empresa</label>
          <input type="text" name="nombre" required value="{{old('nombre')}}">

          <label for="mail">RFC</label>
          <input type="text"  name="rfc" required value="{{old('rfc')}}">

			<label for="password">País</label>
          <div class="caja">
 		 	<select name="pais_id">
 		 		@foreach($paises as $local)
    		<option value="{{$local->idpais}}">{{$local->nombre}}</option>
    		@endforeach
  			</select>
			</div>


         
          <label for="password">Estado</label>
          <div class="caja">
 		 	<select name="estado_id" id="estado">
 		 		@foreach($estados as $local)
    		<option value="{{$local->idestado}}">{{$local->nombre_estado}}</option>
    		@endforeach
  			</select>
			</div>

          <label for="password">Municipio</label>
        <div class="opciones">
 		 	<select name="municipio_id" id="municipio" placeholder="Seleccionar">       
  			</select>
			</div>

          <label for="password">Colonia</label>
          <input type="text" name="colonia" required value="{{old('colonia')}}">

          <label for="password">Dirección</label>
          <input type="text"name="calle" required value="{{old('calle')}}">

          <label for="password">Numero Exterior</label>
          <input type="number" name="numeroexterior" required value="{{old('numeroexterior')}}">

          <label for="password">Código Postal</label>
          <input type="number" name="codigo_postal" required value="{{old('codigo_postal')}}">

          <label for="password">Teléfono</label>
          <input type="number" name="telefono" required value="{{old('telefono')}}">

          <label for="password">Descripción de la Empresa</label>
          <input type="text" name="descripcion" required value="{{old('descripcion')}}">

          <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="file" name="imagen" class="form-control" id="file" onchange="Filevalidation();">
                </div>

         <br>         
         <h1>Datos del contacto</h1>
         <label for="password">Nombre del contacto</label>
          <input type="text" name="names" required value="{{old('names')}}">

          <label for="password">Apellido Paterno </label>
          <input type="text" name="apellido_paterno" required value="{{old('apellido_paterno')}}">

          <label for="password">Apellido Materno</label>
          <input type="text" name="apellido_materno" required value="{{old('apellido_materno')}}">
          
          <label for="password">Cargo</label>
          <input type="text" name="cargo" required value="{{old('cargo')}}">

          <label for="password">Correo</label>
          <input type="text" name="email" required value="{{old('email')}}">

          
          <label for="password">Teléfono</label>
          <input type="number" name="numero_cel" required value="{{old('numero_cel')}}">
        
        <center><br> <br><button type="submit">Finalizar Registro</button></br></br></center>

       

      </form>
      
    </body>
</html>

@endsection