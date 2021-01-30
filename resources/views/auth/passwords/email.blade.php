<!DOCTYPE html>
<html>
<head>
	<title>Bolsa de trabajo</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
	@section('colores')
	<link rel="stylesheet" type="text/css" href="{{URL::asset('css/hola.css')}}">
     <link rel="stylesheet" type="text/css" href="{{URL::asset('fonts/style.css')}}">
     <link rel="stylesheet" type="text/css" href="{{URL::asset('css/hola.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/login.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/hola2.css')}}"> 
    <link rel="stylesheet" type="text/css" href="{{URL::asset('icoon/style.css')}}">
    <link rel="stylesheet" type="text/css" href="https://www.jquery-az.com/javascript/alert/dist/sweetalert.css">
	<script src="https://www.jquery-az.com/javascript/alert/dist/sweetalert-dev.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	@show

	<style>
		header{
            width: 100%;
            background:  #1b5583;
            color: #fff;
            padding: 1em;
            text-color: white;
        }
	</style>
</head>
<body>
	<header>
		<div class="row">
			<div class="col-sm-3">
				<img style="float: right;" src="/img/tecnm2.png" alt="" width="210" height="100">				
			</div>
			<div class="col-sm-6 text-center" >
				<h3 style="color: gold">SISTEMA DE BOLSA DE TRABAJO</h3><br>
				<h4>INSTITUTO TECNOLOGICO DE TUXTLA GUTIERREZ</h4>
			</div>
			<div class="col-sm-3">
				<img src="/img/teclogoittg.png" alt="" width="112" height="112" >				
			</div>
			
		</div>

	</header>
	<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Restablecer Contraseña:</div>
    
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
    
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
    
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Correo Electronico</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Enviar Link
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

