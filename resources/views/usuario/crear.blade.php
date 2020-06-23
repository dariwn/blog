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
<div class="container">
      <div class="py-3 text-center">
        <br><br>
        <h1>Creacion de una nuevo Egresado</h1>
      </div>
          <form action="{{route('usuario.store')}}" method="POST">
          @csrf
            <div class="row">
              <div class="col-md-6 mb-3">
              <label>Usuario</label>
                <input type="text" class="form-control" name="username" placeholder="Usuario" required value="{{old('username')}}">
              </div>
              <div class="col-md-6 mb-3">
                <label>Contraseña</label>
                <input type="password" class="form-control" name="password" placeholder="Contraseña" required value="{{old('password')}}">
              </div>
              <input type="hidden" name="tipo" value="6">
            <button class="btn btn-info" type="submit">Guardar</button>
          </form>
        </div>
@endsection