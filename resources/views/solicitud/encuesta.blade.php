<!DOCTYPE html>
<html>
<head>
	<title>Bolsa de trabajo</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
	@section('colores')
	<link rel="stylesheet" type="text/css" href="{{URL::asset('css/hola.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/login.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/hola2.css')}}"> 
    <link rel="stylesheet" type="text/css" href="{{URL::asset('icoon/style.css')}}">
    <link rel="stylesheet" type="text/css" href="https://www.jquery-az.com/javascript/alert/dist/sweetalert.css">
	<script src="https://www.jquery-az.com/javascript/alert/dist/sweetalert-dev.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

   <style>
        #titulo {
            color: black;
            font-size: 25px;
            margin-bottom: 2rem;
            font-family: 'Bree Serif', serif;
        }   
    </style> 

	@show
</head>
<body>
	<div id="cabecera">
		<a>SISTEMA DE BOLSA DE TRABAJO</a><br>
		<b>INSTITUTO TECNOLOGICO DE TUXTLA GUTIERREZ</b>
	</div>
    
    <div class="container">
        <div class="card card-container">
            
            <p id="titulo" class="profile-name-card">¿El contratado es del Instituto Tecnológico de Tuxtla Gutiérrez?</p>

            <div>
                
                <form action="{{ url('/encuesta/'.$dato)}}" method="GET">
                    <button class="btn-lg btn-success btn-block" name="resp" value="SI" type="submit">SÍ</button>
                    <button class="btn-lg btn-danger btn-block" name="resp" value="NO" type="submit">NO</button>
                </form>
            </div> 
        </div><!-- /card-container -->
    </div>

	<script src="js/jquery-2.1.0.min.js"></script>
	<script src="js/dropdown.js"></script>
</body>
</html>