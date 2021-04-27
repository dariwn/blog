@extends('administradora.inicio3')
@section('contenido')

<div class="container">      
        <div class="col-sm-10" >

    
                
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
                                { label: "Ing. Gestión Empresarial", y: gestion  },	
                                { label: "Ing. Eléctrica", y: electrica  },	
                                { label: "Ing. Electrónica", y: electronica },	
                                { label: "Ing. Química", y: quimica  },	
                                { label: "Ing. Bioquímica", y: bioquimica  },	
                                { label: "Ing. Industrial", y: industrial  },	
                                { label: "Ing. Mecánica", y: mecanica  },	
                                { label: "Ing. Logística", y: logistica  },	
                                { label: "Maestría en Ciencias en ing. Mecatrónica", y: maestriameca  },	
                                { label: "Maestría en Ciencias en Ing. Bioquímica", y: maestriabioq  },	
                                { label: "Doctorado en Ciencias de los Alimentos y Biotecnología", y: doctoradoalime  },	
                                { label: "Doctorado en Ciencias de la Ingeniería", y: doctoradociencias  },			
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
             
        </div>
</div>

            
@endsection