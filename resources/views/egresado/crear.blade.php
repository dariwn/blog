@extends('egresado.inicio')
@section('contenido')
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
                <input type="text" name="correo" required value="{{old('correo')}}" class="form-control" placeholder="Correo...">
                </div>
                </div>
                <div class="col-lg-6 ">
                <div class="form-group">
                <label for="codigo">Nombres</label>
                <input type="text" name="nombres" required value="{{old('nombres')}}" class="form-control" placeholder="Nombres...">
                </div>  
                </div>

                <div class="col-lg-6">
                <div class="form-group">
                <label for="codigo">Apellido Paterno</label>
                <input type="text" name="apellido_paterno" required value="{{old('apellido_paterno')}}" class="form-control" placeholder="Apellido Paterno...">
                </div>  
                </div>
                
                <div class="col-lg-6">
                <div class="form-group">
                <label for="codigo">Apellido Materno</label>
                <input type="text" name="apellido_materno" required value="{{old('apellido_materno')}}" class="form-control" placeholder="Apellido Materno">
                </div>  
                </div>

                <div class="col-lg-6">
                <div class="form-group">
                <label for="codigo">Domicilio</label>
                <input type="text" name="domicilio" required value="{{old('domicilio')}}" class="form-control" placeholder="Domilicio...">
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
                <label for="codigo">Numero de celular</label>
                <input type="text" name="numero_cel" required value="{{old('numero_cel')}}" class="form-control" placeholder="Numero de cel...">
                </div>  
                </div>

                <div class="col-lg-6">
                <div class="form-group">
                <label for="codigo">Colonia</label>
                <input type="text" name="colonia" required value="{{old('colonia')}}" class="form-control" placeholder="Colonia...">
                </div>  
                </div>

                <div class="col-md-6 mb-3">
                <label>Pais</label>
                <select name="pais_id" class="form-control">
                @foreach($paises as $pais)
                              <option value="{{$pais->idpais}}">{{$pais->nombre}}</option>
                              @endforeach
                       </select>
              </div>

                <div class="col-md-6 mb-3">
                <label>Estado</label>
                <select name="estado_id" class="form-control" id="estado">
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
                <label>Perfil</label>
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
                <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="file" name="imagen" class="form-control">
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