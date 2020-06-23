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
<html>
  <br><br>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Carrera', 'Porcentaje'],
          ['Ing. Sistemas Computacionales', {{ $a }}],
          ['Ing. Gestion Empresarial', {{ $b }}],
          ['Ing. Eléctrica', {{ $c }}],
          ['Ing. Electronica', {{ $d }}],
          ['Ing. Química', {{ $e }}],
          ['Ing. Bioquímica', {{ $f }}],
          ['Ing. Industrial', {{ $g }}],
          ['Ing. Mecánica', {{ $h }}],
          ['Ing. Logística', {{ $i }}],
          ['Maestría en Ciencias en Ing. Mecánica', {{ $j }}],
          ['Maestría en Ciencias en Ing. Bioquímica', {{ $k }}],
          ['Doctorado en Ciencias de los Alimentos y Biotecnol', {{ $m }}],
          ['Doctorado en Ciencias de la Ingeniería', {{ $n }}],
        ]);

        var options = {
          title: 'Carrera mas solicitada'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>
@endsection