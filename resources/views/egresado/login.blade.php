@extends('layouts.admin')
@section('colores')
    {{-- <link rel="stylesheet" type="text/css" href="{{URL::asset('css/hola.css')}}"> --}}
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/login.css')}}">
    {{-- <link rel="stylesheet" type="text/css" href="{{URL::asset('css/hola2.css')}}">  --}}
    {{-- <link rel="stylesheet" type="text/css" href="{{URL::asset('icoon/style.css')}}"> --}}
    <link rel="stylesheet" type="text/css" href="https://www.jquery-az.com/javascript/alert/dist/sweetalert.css">
	<script src="https://www.jquery-az.com/javascript/alert/dist/sweetalert-dev.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
@stop
@section('seccion')
<div class="container">
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="img/tecnm.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" method="post" action="{{ url('/BTEgresado') }}">
             @csrf
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" id="inputEmail" class="form-control" name="username" placeholder="Nombre del usuario" required autofocus>
                <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Contraseña" required>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Entrar</button>
            </form><!-- /form -->
            <a href={{route('RegistroEgresado.create')}} >¿Aun no te has registrado? Registrate.</a>
            <a href={{route('password.request')}} >¿Olvidaste tu contraseña?</a>
        </div><!-- /card-container -->
    </div>
@endsection