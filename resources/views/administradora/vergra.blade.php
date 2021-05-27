
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
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

	<div class="col-sm-12" style="content: center;">
	<center>
	<img HSPACE="10" VSPACE="10" src="img/educacion.png" width="350" height="100" align="left">
	<img HSPACE="10" VSPACE="10" src="img/tecnm.png" width="250" height="100" align="rigth">
	</center>
	</div>
</head>
<body>
<br><br><br>
<center>
<div id="chartContainer1" style="height: 275px; width: 40%;"></div>
<div class="col-sm-12" style="content: center;">
	<label>Alumnos Si Contratados: {{$Si}}</label><br>
	<label>Alumnos No Contratados: {{$No}}</label>
</div>
</center>

<br><br><br><br>
<div id="chartContainer2" style="height: 275px; width: 90%;"></div>
<br><br>
<div class="container">
	<div class="row">
		<div class="col-sm-6">
			<label>Ing. Sistemas computacionales: {{$a}}</label><br>
			<label>Ing. Gestion Empresarial: {{$b}}</label><br>
			<label>Ing. Electrica: {{$c}}</label><br>
			<label>Ing. Electronica: {{$d}}</label><br>
			<label>Ing. Quimica: {{$e}}</label><br>
			<label>Ing. Bioquimica: {{$f}}</label><br>
			<label>Ing. Industrial: {{$g}}</label><br>			
		</div>
		<div class="col-sm-6">
			<label>Ing. Mecanica: {{$h}}</label><br>
			<label>Ing. Logistica: {{$i}}</label><br>
			<label>Maestria en Ciencias en ing. Mecatronica: {{$j}}</label><br>
			<label>Maestria en Ciencias en Ing. Bioquimica: {{$k}}</label><br>
			<label>Doctorado en Ciencias de los Alimentos y Biotecnologia: {{$m}}</label><br>
			<label>Doctorado en Ciencias de la Ingenieria: {{$n}}</label><br>
		</div>	
	</div>
</div>

<br>
  <button onclick="window.print();">Imprimir Grafica</button>
  {{-- <a class="btn btn-primary" id="regresar" href="{{ url('/reporte')}}" >Regresar Página Anterior</a> --}}
  <button onclick="window.history.back();">Regresar Pagina Anterior</button>
<br><br><br><br><br><br>

  
</body>
<footer class="footer">
	<hr>
	<img src="img/logo.png" width="40" align="left">
	<img src="img/gestion.jpeg"  width="40" align="right">
	<img src="img/compact.jpg" width="40" align="right">
	<span><p align="center">Carretera Panamericana Km. 1080, C. P. 29050, Apartado Postal 599<br>Tuxtla Gutiérrez, Chiapas: Tels. (961) 61 50380, 61 50461; Ext. 101<br>www.ittg.edu.mx</p></span>
</footer>




