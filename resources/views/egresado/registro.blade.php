@extends('layouts.admin')
@section('colores')
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/hola.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/login.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/hola2.css')}}"> 
    <link rel="stylesheet" type="text/css" href="{{URL::asset('icoon/style.css')}}">
    <link rel="stylesheet" type="text/css" href="https://www.jquery-az.com/javascript/alert/dist/sweetalert.css">
	<script src="https://www.jquery-az.com/javascript/alert/dist/sweetalert-dev.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
@stop
@section('seccion')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registro De Usuario</div>
                <div class="card-body">
                    <form method="post" action="#">
                        @csrf                                
                           Número De Control: <input type="number" id="numerocontrol" class="form-control" name="numerocontrol" placeholder="Numero de Control" required>
                           <br>
                           Nombre: <input type="text" id="nombre" class="form-control" name="nombre" placeholder="Nombre(s) " required>
                           <br>
                           Apellido Paterno: <input type="text" id="apellidop" class="form-control" name="Apellidop" placeholder="Apellido Paterno" required>
                           <br>
                           Apellido Materno: <input type="text" id="apellidom" class="form-control" name="Apellidom" placeholder="Apellido Materno" required>
                           <br>
                           Correo: <input type="email" id="correo" class="form-control" name="correo" placeholder="Correo Electronico" required>
                           <br>
                           <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Registrarse</button>
                       </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
