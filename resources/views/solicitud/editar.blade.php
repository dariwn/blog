@extends('empresa.inicio')

@section('colores')
<link rel="stylesheet" type="text/css" href="{{URL::asset('css/hola.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL::asset('css/estilo.css')}}">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
@stop

@section('seccion')
<form action="{{ route('solicitud.update',$solicitudes->idsolicitud) }}" method="POST">
@csrf
@method('PUT')
<div class="container register">
                <div class="row">
                    <br><br><br><div class="col-md-3 register-left">
                    <h1>Datos de la Vacante</h1>
                    <h6>Indique los datos correctos de la vacante a publicar,obligatorio llenar todos los campos</h6>
                   
                    </div>
                     </br> </br> </br>
                    <div class="col-md-9 register-right">
                        
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <br>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <label>Nombre del puesto</label>
                                            <input type="text" class="form-control" placeholder="Nombre del Puesto" name="nombredelpuesto" value="{{ $solicitudes->nombredelpuesto }}" />
                                        </div>
                                        <div class="form-group">
                                        <label>Salario</label>
                                            <input type="text" class="form-control" placeholder="Salario" name="salario" value="{{ $solicitudes->salario }}" />
                                        </div>
                                        <div class="form-group">
                                        <label>Horario</label>
                                            <input type="text" class="form-control" placeholder="Horario" name="horario" value="{{ $solicitudes->horario }}" />
                                        </div>
                                        <div class="form-group">
                                        <label>Sexo</label>
                                           <select type="text" class="form-control"  placeholder="Sexo" name="idsexo">
                                           @foreach($generos as $genero)
                                           @if($genero->idgenero==$solicitudes->idsexo)
                                           <option value="{{$genero->idgenero}}" selected>{{$genero->sexo}}</option>
                                           @else
                                           <option value="{{$genero->idgenero}}">{{$genero->sexo}}</option>
                                           @endif
                                            @endforeach
                                            </select>

                                        </div>
                                            <div class="form-group">
                                            <label>Descripcion del puesto</label>
                                            <input type="text" class="form-control"  placeholder="Descripcion del Puesto" name="descripcion_del_puesto" value="{{ $solicitudes->descripcion_del_puesto }}" />
  
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <label>Tiempo de Contratacion</label>
                                            <input type="text" class="form-control" placeholder="Tiempo de Contratacion" name="tiempo_de_contratacion" value="{{ $solicitudes->tiempo_de_contratacion }}" />
                                        </div>
                                        <div class="form-group">
                                        <label>Edad minima-Edad maxima</label>
                                            <input type="text" minlength="10" maxlength="10" class="form-control" placeholder="Edad minima-Edad Maxima" name="edades" value="{{ $solicitudes->edades }}" />
                                        </div>
                                        <div class="form-group">
                                        <label>Estado Civil</label>
                                            <input type="text" minlength="10" maxlength="10" class="form-control" placeholder="Estado Civil" name="estado_civil" value="{{ $solicitudes->estado_civil }}" />
                                        </div>
                                        <div class="form-group">
                                        <label>Requisitos</label>
                                            <input type="text"class="form-control" placeholder="Requisitos" name="requisito" value="{{ $solicitudes->requisito }}" />
                                            </div>
                                        <div class="form-group">
                                        <label>Cambio de Residencia</label>
                                            <input type="text"class="form-control" placeholder="Cambio de Residencia" name="cambio_de_residencia" value="{{ $solicitudes->cambio_de_residencia }}" />
                                            <input type="hidden" name="id_empresa" value="{{ $empresas }}">
                                            <input type="hidden" name="estatus" value="Vigente">
                                        </div>
                                        
                                        <input type="submit" class="btn btn-primary"  value="Guardar"/>
                                    </div>
                                </div>
                            </div>
                           
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
</form>
@endsection