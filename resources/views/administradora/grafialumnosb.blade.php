@extends('administradora.inicio3')
@section('contenido')

<div class="container">      
        <div class="col-sm-10" >

    
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
                      <div id="chartContainer2" style="height: 300px; width: 50%;">
                      </div>
                    </center>
                    </body>
                   </html>
             
        </div>
</div>

            
@endsection