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
<br><br><br><br><br><br>

<!DOCTYPE HTML>
<html>
<head>
  <script type="text/javascript">
  var si = {{ $a }}
  var no = {{ $b }}

  window.onload = function () {

    var chart2 = new CanvasJS.Chart("chartContainer2", {
		theme: "light2",
		title:{
      text: "Puestos Ocupados Por Alumnos En Las Empresas"       
		},
		data: [              
		{
			type: "column",
			dataPoints: [
				{ label: "Puestos Ocupados",  y: si  },
				{ label: "Puestos No Ocupados", y: no  },	
			]
		}
		]
  	});

    chart2.render();

  }
  </script>
  <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script></head>
  <body>
    
    </div><br>
    <center>
    <label>Periodo graficado del: {{$periodoinicio}}  al: {{ $periodofin }} </label>
    <div id="chartContainer2" style="height: 300px; width: 60%;">
    </div>
  </center>
  </body>
 </html>
@endsection