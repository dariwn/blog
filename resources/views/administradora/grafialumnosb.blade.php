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
    var chart1 = new CanvasJS.Chart("chartContainer1",
    {
      title:{
        text: "Alumnos Contratados Por Las Empresas"
      },
      data: [
      {
       type: "doughnut",
       dataPoints: [
        { indexLabel: "SI",  y: si  },
				{ indexLabel: "NO", y: no  },
			]
     }
     ]
   });

    chart1.render();

    var chart2 = new CanvasJS.Chart("chartContainer2", {
		theme: "light2",
		title:{
			              
		},
		data: [              
		{
			type: "column",
			dataPoints: [
				{ label: "SI",  y: si  },
				{ label: "NO", y: no  },	
			]
		}
		]
  	});

    chart2.render();

  }
  </script>
  <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script></head>
  <body>
    <div id="chartContainer1" style="height: 300px; width: 100%;">
    </div><br>
    <center>
    <div id="chartContainer2" style="height: 300px; width: 60%;">
    </div>
  </center>
  </body>
 </html>
@endsection