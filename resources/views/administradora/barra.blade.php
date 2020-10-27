@extends('administradora.inicio2')
@section('colores')
<link rel="stylesheet" type="text/css" href="{{URL::asset('css/hola.css')}}">
  <link rel="stylesheet" type="text/css" href="{{URL::asset('fonts/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/estilo.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
@stop

@section('seccion')

<!DOCTYPE HTML>
<html>
<head>
  <script type="text/javascript">
  var sistemas = {{ $a }}
  var electrica = {{ $b }}
  var electronica = {{ $c }}
  var gestion = {{ $d }}
  var bioquimica = {{ $e }}
  var industrial = {{ $f }}  
  var logistica = {{ $g }}
  var mecanica = {{ $h }}
  var quimica = {{ $i }}
    
  var maestriameca = {{ $j }}
  var maestriabioq = {{ $k }}
  var doctoradoalime = {{ $m }}
  var doctoradociencias = {{ $n }}

  window.onload = function () {
       
    var chart2 = new CanvasJS.Chart("chartContainer2", {
		theme: "light2",
		title:{
      text: "Carrera Mas Solicitada"         
		},
		data: [              
		{
			type: "column",
			dataPoints: [
                { label: "Ing. Sistemas computacionales",  y: sistemas },
                { label: "Ing. Gestion Empresarial", y: gestion  },	
                { label: "Ing. Electrica", y: electrica  },	
                { label: "Ing. Electronica", y: electronica },	
                { label: "Ing. Quimica", y: quimica  },	
                { label: "Ing. Bioquimica", y: bioquimica  },	
                { label: "Ing. Industrial", y: industrial  },	
                { label: "Ing. Mecanica", y: mecanica  },	
                { label: "Ing. Logistica", y: logistica  },	
                { label: "Maestria en Ciencias en ing. Mecatronica", y: maestriameca  },	
                { label: "Maestria en Ciencias en Ing. Bioquimica", y: maestriabioq  },	
                { label: "Doctorado en Ciencias de los Alimentos y Biotecnologia", y: doctoradoalime  },	
                { label: "Doctorado en Ciencias de la Ingenieria", y: doctoradociencias  },			
			            ]
		}
	  	]
  	});

    chart2.render();

  }
  </script>
  <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script></head>
  <body>
    <br><br>
    <center><label>Periodo graficado del: {{$periodoinicio}}  al: {{ $periodofin }} </label></center>
    <div id="chartContainer2" style="height: 300px; width: 100%;">
    </div>
  </body>
 </html>
@endsection