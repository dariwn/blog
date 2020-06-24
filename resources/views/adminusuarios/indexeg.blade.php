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
                <div class="card-header">Lista de Usuarios de Empresas</div>

                <form class="form-inline my-2" method="get" action="{{ route ('usuarios-egresados.index') }}">	
                    <input class="form-control mr-sm-2" type="search" name="username" placeholder="User Name" aria-label="Search" >
                    
                    <button class="btn btn-success my-2 my-sm-0" type="submit">Buscar</button>
                  </form>

                    <div class="card-body">					                        	
                        <table class="table table-hover" style="table-layout: fixed; border-collapse: collapse;">
                            <thead>
                                <th>Usuario</th>                                
                                <th>Acciones</th>
                            </thead>
                            <tbody>
                                @foreach($usuarios as $user)
                                    <tr>
                                        <td>{{ $user->username }}</td>

                                        <td>
                                            <a href="{{ url('/usuarios-egresados/'.$user->id.'/edit') }}" class="btn btn-primary">Editar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>

@endsection