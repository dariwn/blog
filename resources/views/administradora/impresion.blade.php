<!DOCTYPE html>
<html>
<head>
	<title></title>
	<img HSPACE="10" VSPACE="10" src="img/educacion.png" width="300" height="100" align="left">
	<img HSPACE="10" VSPACE="10" src="img/linea.png" width="300" height="130">
</head>
<body>

	<style>
	
		body {
			background-color: #FFFFFF;
			background-image: url("img/logo.png");
			background-position: left;
			background-repeat: no-repeat;
			background-attachment:fixed;
		}
		footer {
		    position: relative;
            /* Altura total del footer en px con valor negativo */
            margin-top: -50px;
            /* Altura del footer en px. Se han restado los 5px del margen
               superior mas los 5px del margen inferior
            */
            height: 40px;
            padding:5px 0px;
            clear: both;
          	font-size: 6;
        }

	</style>

	<p class=MsoNormal align=center style='text-align:center;tab-stops:36.65pt'><strong><span
	style='font-family:"montserratmedium",serif;mso-bidi-font-family:"Arial";
	mso-bidi-theme-font:minor-bidi;color:#4C4B4A;'>
	<center>
		<p>DEPARTAMENTO DE GESTION TECNOLOGICA Y VINCULACION</p>
		<P>OFICINA DE PRACTICAS Y PROMOCION POFESIONAL</P>
		<br>
		<a>REPORTE DE LA BOLSA DE TRABAJO</a>
	</center>
	</br></br><o:p></o:p></span></strong></p>

	<p  align="right" class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:justify;tab-stops:36.65pt'><strong><span style='font-size:10.0pt;line-height:
	107%;font-family:"montserratmedium",serif;mso-bidi-font-family:"Arial";
	mso-bidi-theme-font:minor-bidi;color:#4C4B4A;'>Dirigido: {{ $dirigido }} </span></strong></p>

	<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:justify;tab-stops:36.65pt'><strong><span style='font-size:10.0pt;line-height:
	107%;font-family:"montserratmedium",serif;mso-bidi-font-family:"Arial";
	mso-bidi-theme-font:minor-bidi;color:#4C4B4A;'>Cargo: {{ $cargo }} </span></strong></p></br>

	<p class=MsoNormal style='text-align:justify;tab-stops:36.65pt'><strong><span
	style='font-size:10.0pt;line-height:107%;font-family:"montserratmedium",serif;
	mso-bidi-font-family:"Arial";mso-bidi-theme-font:minor-bidi;
	color:#4C4B4A;'>Presente</span></strong><span
	style='font-size:10.0pt;line-height:107%'><o:p></o:p></span></p>

	<span
	style='font-size:10.0pt;line-height:107%;font-family:"montserratmedium",serif;
	mso-bidi-font-family:"Arial";mso-bidi-theme-font:minor-bidi;
	color:#4C4B4A;'>El que suscribe la encargada de la Oficina de
	Prácticas y Promoción Profesional, por este medio se permite hace su
	conocimiento del reporte número {{ $numero }} del periodo {{ $periodo }} hasta {{ $hasta }}, realizando como actividad la representación
	de datos actuales del Sistema de Bolsa de Trabajo en la siguiente tabla.</span></strong></p>
	<br><br>
	<table align="center" border="1">
		<thead align="center">
			<tr>
				<th>Número de empresas registradas</th>
				<th>Número de egresados registrados</th>
				<th>Numero de solicitudes por carrera</th>
				{{-- <th>Carrera menos solicitada</th> --}}
			</tr>
		</thead>
		<tbody align="center">
			<tr>
			  
				<td>{{ $contem }}</td>
				

			
				<td>{{ $conteg }}</td>
				
			<td>Ing. Sistemas computacionales: {{ $a }},
				Ing. Gestion Empresarial: {{ $b }},
				Ing. Electrica: {{ $d }},
				Ing. Electronica: {{ $d }},
				Ing. Quimica: {{ $e }},
				Ing. Bioquimica: {{ $f }},
				Ing. Industrial: {{ $g }},
				Ing. Mecanica: {{ $h }},
				Ing. Logistica: {{ $i }},
				Maestria en Ciencias en ing. Mecatronica: {{ $j }},
				Maestria en Ciencias en Ing. Bioquimica: {{ $k }},
				Doctorado en Ciencias de los Alimentos y Biotecnologia: {{ $m }},
				Doctorado en Ciencias de la Ingenieria: {{ $n }},

			</td>
				{{-- <td>{{ $carrera_mas }}</td>

				<td>{{ $carrera_menos }}</td> --}}

			</tr>
		</tbody>
	</table>
	<span 
	style='font-size:10.0pt;line-height:107%;font-family:"montserratmedium",serif;
	mso-bidi-font-family:"Arial";mso-bidi-theme-font:minor-bidi;
	color:#4C4B4A;'>
	Alumnos contratados: {{ $Si }} , Alumnos no contratados: {{$No}} .

	</strong> 

	</p>
	</span>

	<br><br>
	<strong>
	<span 
	style='font-size:10.0pt;line-height:107%;font-family:"montserratmedium",serif;
	mso-bidi-font-family:"Arial";mso-bidi-theme-font:minor-bidi;
	color:#4C4B4A;'>

	 Se extiende la presente en la ciudad de Tuxtla
	Gutiérrez, Chiapas,<br>{{ $extiende }}

	</strong> 

	</p>
	</span>

	<br><br>
	
	<center>

		<p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
		text-align:center;tab-stops:360.65pt'><strong><span style='font-size:10.0pt;
		line-height:107%;font-family:"montserratmedium",serif;mso-bidi-font-family:
		"Arial";mso-bidi-theme-font:minor-bidi;color:#4C4B4A;'>______________________________<o:p></o:p></span></strong></p>

		<p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
		text-align:center;tab-stops:360.65pt'><strong><span style='font-size:10.0pt;
		line-height:107%;font-family:"montserratmedium",serif;mso-bidi-font-family:
		"Arial";mso-bidi-theme-font:minor-bidi;color:#4C4B4A;'>M.C.
		Beatriz Martínez Salas<o:p></o:p></span></strong></p>

		<p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
		text-align:center;tab-stops:360.65pt'><strong><span style='font-size:10.0pt;
		line-height:107%;font-family:"montserratmedium",serif;mso-bidi-font-family:
		"Arial";mso-bidi-theme-font:minor-bidi;color:#4C4B4A;'>Oficina
		de Prácticas y Promoción Profesional<o:p></o:p></span></strong></p>

	</center>

	</br></br></br></br></br></br></br></br>

	<br><br><br><br><br><br>

	<footer class="footer">
		<hr>
		<img src="img/logo.png" width="40" align="left">
		<img src="img/gestion.png"  width="40" align="right">
		<img src="img/compact.png" width="40" align="right">
		<span><p align="center">Carretera Panamericana Km. 1080, C. P. 29050, Apartado Postal 599<br>Tuxtla Gutiérrez, Chiapas: Tels. (961) 61 50380, 61 50461; Ext. 101<br>www.ittg.edu.mx</p></span>
	</footer>
	

</body>
</html>