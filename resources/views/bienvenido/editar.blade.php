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
<form action="{{route('bienvenido.update',$hola->id)}}" method="POST">
@csrf
@method('PUT')
<div class="container register">
                <div class="row">
                    <br><br><br><div class="col-md-3 register-left">
                    <br><br>
                    <h1>Datos de los perfiles</h1>
                    <h6>Los perfiles seleccionado</h6>
                   
                    </div>
                     </br> </br> </br>
                    <div class="col-md-9 register-right">
                        
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <br>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="maxl">
                                                      <h6>Perfiles Seleccionado</h6>
                                                <label class="radio inline"> 
                                                <?php
                                                $idsoli= DB::table('solicitudperfil')->where('idsolicitud',$hola->id)->get();
                                                $separador = ",";
                                                $separada = explode($separador,$idsoli[0]->idperfiles);
                                                //dd($separada);
                                                foreach($separada as $valor){
                                                    dd($valor);
                                                      $perfil= DB::table('perfiles')->where('idperfiles',$valor)->get();
                                                        
                                                        foreach ($perfil as $key => $value) {
                                                            echo $value->carrera."<br>";
                                                        }
                                                    }                                                                                                         
                                                ?>   
                                                <br>
                                                <h6>Seleccionar Perfiles</h6>
                                                <label class="radio inline"> 
                                                    @foreach($perfiles as $perfil)
                                                    <input type="checkbox" name="perfil[]" value="{{$perfil->idperfiles}}">
                                                    <span> {{$perfil->carrera}} </span> <br>
                                                    @endforeach
                                                </label>     
                                                </label>               
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                        <div class="form-group">
                                            <input type="hidden" name="idsolicitud" value="{{$sola}}">
                                        </div>
                                        <input type="submit" class="btn btn-success"  value="Guardar"/>
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