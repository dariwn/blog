
<script type="text/javascript">

var si = {{ $Si }}
var no = {{ $No }}

var sistemas = {{ $a }}
var gestion = {{ $b }}
var electrica = {{ $c }}
var electronica = {{ $d }}
var quimica = {{ $e }}
var bioquimica = {{ $f }}
var industrial = {{ $g }}
var mecanica = {{ $h }}
var logistica = {{ $i }}
var maestriameca = {{ $j }}
var maestriabioq = {{ $k }}
var doctoradoalime = {{ $m }}
var doctoradociencias = {{ $n }}

window.onload = function () {
	var chart = new CanvasJS.Chart("chartContainer1", {
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
   
    
    var chart1 = new CanvasJS.Chart("chartContainer2", {
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
  
    
    chart.render();
    chart1.render();

    regresar.style.display = "none";

    document.getElementById("printChart").addEventListener("click",function(){
        printChart.style.display = 'none';
        window.print(); 
        regresar.style.display = "inline";

    });  
   
}


</script>

<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
	<div class="col-md-8" style="content: center;">
	<center>
	<img HSPACE="10" VSPACE="10" src="img/educacion.png" width="350" height="100" align="left">
	<img HSPACE="10" VSPACE="10" src="img/tecnm.png" width="250" height="100">
	</center>
	</div>
</head>
<body>
<br><br><br><br><br><br>
<center>
<div id="chartContainer1" style="height: 275px; width: 40%;"></div>
</center>
<br><br><br><br><br><br><br>
<div id="chartContainer2" style="height: 275px; width: 90%;"></div>
<br>
  <button id="printChart">Imprimir Grafica</button>
  <a class="btn btn-primary" id="regresar" href="{{ url('/reporte')}}" >Regresar Página Anterior</a>

<br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br>

  <footer class="footer">
	<hr>
	<img src="img/logo.png" width="40" align="left">
	<img src="img/gestion.jpeg"  width="40" align="right">
	<img src="img/compact.jpg" width="40" align="right">
	<span><p align="center">Carretera Panamericana Km. 1080, C. P. 29050, Apartado Postal 599<br>Tuxtla Gutiérrez, Chiapas: Tels. (961) 61 50380, 61 50461; Ext. 101<br>www.ittg.edu.mx</p></span>
</footer>
</body>




