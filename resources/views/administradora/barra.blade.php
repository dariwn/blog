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
                                { label: "ISC",  y: sistemas },
                                { label: "IGEM", y: gestion  },	
                                { label: "IELE", y: electrica  },	
                                { label: "IELC", y: electronica },	
                                { label: "IQUI", y: quimica  },	
                                { label: "IBQA", y: bioquimica  },	
                                { label: "IIND", y: industrial  },	
                                { label: "IMEC", y: mecanica  },	
                                { label: "ILOG", y: logistica  },	
                                { label: "MCIMCT", y: maestriameca  },	
                                { label: "MCIBQ", y: maestriabioq  },	
                                { label: "DCAB", y: doctoradoalime  },	
                                { label: "DCI", y: doctoradociencias  },			
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