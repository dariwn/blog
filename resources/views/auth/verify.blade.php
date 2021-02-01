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
                    <div class="card-header">Verifica tu correo electronico</div>
    
                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                Se ha enviado un nuevo enlace de verificación a su dirección de correo electrónico.
                            </div>
                        @endif
    
                        Antes de continuar, consulte su correo electrónico para ver si hay un enlace de verificación.
                        
                        Si no recibió el correo electrónico, <a onclick="event.preventDefault(); document.getElementById('email-form').submit();" href="{{ route('verification.resend') }}">click aqui para enviar otro</a>.
                        <form id="email-form" action="{{ route('verification.resend') }}" method="POST" style="display: none;">
                            @csrf
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
