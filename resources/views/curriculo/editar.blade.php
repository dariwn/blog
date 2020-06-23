@extends('egresado.inicio')
@section('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h2>Curriculo</h2>
    </div>
</div>
    
<form action="{{ route('curriculo.update',$hola->idcurriculo) }}" method="POST">
    @csrf
    @method('PUT')
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <label for="nombre">Escuela de Procedencia</label>
                <input type="text" name="escuela" required value="{{$hola->escuela}}" class="form-control" placeholder="Escuela">
                </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <label for="codigo">Tiempo de Estudio</label>
                <input type="text" name="duracion" required value="{{$hola->duracion}}" class="form-control" placeholder="Tiempo">
                </div>  
                </div>

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <label for="codigo">Especialidad</label>
                <input type="text" name="especialidad" required value="{{$hola->especialidad}}" class="form-control" placeholder="Especialidad">
                </div>  
                </div>
                
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <label for="codigo">Area</label>
                <input type="text" name="area" required value="{{$hola->area}}" class="form-control" placeholder="Area">
                </div>  
                </div>

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <label for="codigo">Experiencias</label>
                <input type="text" name="experiencia"  value="{{$hola->experiencia}}" class="form-control" placeholder="Experiencias">
                </div>  
                </div>

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <label for="codigo">Habilidades</label>
                <input type="text" name="habilidades" required value="{{$hola->habilidades}}" class="form-control" placeholder="Habilidades">
                </div>  
                </div>

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <label>Idioma</label>
                <select name="ididioma" class="form-control">
                @foreach($idiomas as $idioma)
                  @if($idioma->ididioma==$hola->ididioma)
                              <option value="{{$idioma->ididioma}}" selected>{{$idioma->idioma}}</option>
                              @else
                              <option value="{{$idioma->ididioma}}">{{$idioma->idioma}}</option>
                              @endif
                              @endforeach
                       </select>
                       </div>
              </div>

              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <label>Nivel</label>
                <select name="idjerarquia" class="form-control">
                @foreach($jerarquias as $jerarquia)
                 @if($jerarquia->idjerarquia==$hola->idjerarquia)
                              <option value="{{$jerarquia->idjerarquia}}" selected>{{$jerarquia->nivel}}</option>
                              @else
                              <option value="{{$jerarquia->idjerarquia}}">{{$jerarquia->nivel}}</option>
                              @endif
                              @endforeach
                       </select>
                       </div>
              </div>   

              
              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <label>Estado</label>
                <select name="idestado" class="form-control" id="estado">
                @foreach($estados as $estado)
                    @if($estado->idestado==$hola->idestado)
                              <option value="{{$estado->idestado}}" selected>{{$estado->nombre_estado}}</option>
                              @else
                              <option value="{{$estado->idestado}}">{{$estado->nombre_estado}}</option>
                              @endif
                              @endforeach
                       </select>
                       </div>
              </div>

              
              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <label>Municipio</label>
                <select name="idmunicipio" class="form-control" id="municipio">
                 @foreach($municipios as $municipio)
                  @if($municipio->idmunicipio==$hola->idmunicipio)
                 <option value="{{$municipio->idmunicipio}}" selected>{{$municipio->nombre_localidad}}</option>
                 @else
                 <option value="{{$municipio->idmunicipio}}">{{$municipio->nombre_localidad}}</option>
                 @endif
                 @endforeach
                       </select>
                       </div>
              </div>

              
              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <label>Perfil</label>
                <select name="idperfiles" class="form-control">
                @foreach($perfiles as $perfil)
                 @if($perfil->idperfiles==$hola->idperfiles)
                              <option value="{{$perfil->idperfiles}}" selected>{{$perfil->carrera}}</option>
                              @else
                              <option value="{{$perfil->idperfiles}}">{{$perfil->carrera}}</option>
                              @endif
                              @endforeach
                       </select>
                       </div>
              </div>
          <input type="hidden" name="idegresado" value="{{$egresados}}">
           <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
               <button class="btn btn-primary" type="submit">Registro</button>
           </div> 
    	</div>
    </div>
</form>
@endsection