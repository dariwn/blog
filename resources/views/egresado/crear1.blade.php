@extends('egresado.inicio')
@section('contenido')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

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

<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h2>Registro</h2>
    </div>
</div>

    <form action="{{route('egresado.store')}}" method="POST" enctype="multipart/form-data">
    @csrf

            <div class="row">
                
                <div class="col-lg-6 ">
                <div class="form-group">
                <label for="nombre">Correo</label>            
                <input type="text" name="correo" required value="{{ $usuario1 }}" class="form-control" placeholder="Correo..." readonly>
                </div>
                </div>
                <div class="col-lg-6 ">
                <div class="form-group">
                <label for="codigo">Nombres</label>
                <input type="text" name="nombres" id="nombres" required value="{{old('nombres')}}" class="form-control" placeholder="Nombres...">
                </div>  
                </div>

                <div class="col-lg-6">
                <div class="form-group">
                <label for="codigo">Apellido Paterno</label>
                <input type="text" name="apellido_paterno" id="apellidos" required value="{{old('apellido_paterno')}}" class="form-control" placeholder="Apellido Paterno...">
                </div>  
                </div>
                
                <div class="col-lg-6">
                <div class="form-group">
                <label for="codigo">Apellido Materno</label>
                <input type="text" name="apellido_materno" id="apellidos" required value="{{old('apellido_materno')}}" class="form-control" placeholder="Apellido Materno">
                </div>  
                </div>

                
                <div class="col-lg-6">
                <div class="form-group">
                <label for="codigo">Número de celular</label>
                <input type="number" name="numero_cel" id="numero_cel" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" required value="{{old('numero_cel')}}" class="form-control" placeholder="Numero de cel...">
                </div>  
                </div>

                <div class="col-lg-6">
                <div class="form-group">
                <label for="codigo">Fecha de nacimiento</label>
                <input type="date" class="form-control" name="fecha_de_nac" required value="{{old('fecha_de_nac')}}">
                </div>  
                </div>
    
                <div class="col-lg-6">
                <div class="form-group">
                <label for="codigo">Domicilio</label>
                <input type="text" name="domicilio" id="domicilio" required value="{{old('domicilio')}}" class="form-control" placeholder="Domilicio...">
                </div>
                </div>                  

                <div class="col-lg-6">
                <div class="form-group">
                <label for="codigo">Colonia</label>
                <input type="text" name="colonia" id="colonia" required value="{{old('colonia')}}" class="form-control" placeholder="Colonia...">
                </div>  
                </div>

                <div class="col-md-6 mb-3">
                <label>País</label>
                <select name="pais_id" class="form-control">
                @foreach($paises as $pais)
                              <option value="{{$pais->idpais}}">{{$pais->nombre}}</option>
                              @endforeach
                       </select>
              </div>

                <div class="col-md-6 mb-3">
                <label>Estado</label>
                <select name="estado_id" class="form-control" id="estado">
                    <option value="#">Selecciona una opcion</option>
                @foreach($estados as $estado)
                              <option value="{{$estado->idestado}}">{{$estado->nombre_estado}}</option>
                              @endforeach
                       </select>
              </div>

              <div class="col-md-6 mb-3">
                <label>Municipio</label>
                <select name="municipio_id" class="form-control" id="municipio">
                       </select>
              </div>

              <div class="col-md-6 mb-3">
                <label>Carrera</label>
                <select name="perfiles_id" class="form-control">
                @foreach($perfiles as $perfil)
                              <option value="{{$perfil->idperfiles}}">{{$perfil->carrera}}</option>
                              @endforeach
                       </select>
              </div>

              <div class="col-md-6 mb-3">
                <label>Sexo</label>
                <select name="genero_id" class="form-control">
                @foreach($generos as $genero)
                              <option value="{{$genero->idgenero}}">{{$genero->sexo}}</option>
                              @endforeach
                       </select>
              </div>

             <div class="col-lg-6">
                
                <div class="input-group-prepend">
                    <label class="input-group-text">Subir Imagen: </label>
                    <input accept="image/*" type="file" id="file" name="file" onchange="Filevalidation();" required>
                </div> 
                
            </div>
            
           <div class="col-lg-6">
            <div class="form-group">
               <button class="btn btn-primary" type="submit">Registro</button>
           </div> 
    	</div>
    </div>
</form>
@endsection