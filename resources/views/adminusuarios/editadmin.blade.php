@extends('administradora.inicio')
@section('colores')
<link rel="stylesheet" type="text/css" href="{{URL::asset('css/hola.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::asset('fonts/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/estilo.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
@stop

@section('seccion')
<br><br><br><br><br><br><br><br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edicion de Usuario</div>

                <div class="card-body">
                    <form action="{{ route('usuarios-sistema.update', $usuario->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="numcontrol" class="col-sm-4 col-form-label text-md-right">User Name</label>
                            <div class="col-md-6">
                               <input type="text" name="username" required class="form-control" value="{{ $usuario->username }}"> 
                            </div>                            
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label text-md-right">Contraseña</label>
                            <div class="col-md-6">
                               <input type="text" name="contraseña" required class="form-control"> 
                            </div>                            
                        </div>
                
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                              <input type="submit" value="Guardar Cambios" class="btn btn-success">  
                            </div>                            
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection