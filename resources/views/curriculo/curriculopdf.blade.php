<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

     <title>Curriculum</title>

     <style type="text/css">
        * { margin: 0; padding: 0; }
        body { font: 14px Helvetica, Sans-Serif; line-height: 24px; background: url(images/noise.jpg); }
        .clear { clear: both; }
        #page-wrap { width: 800px; margin: 40px auto 60px; }
        #pic { float: right; margin: -30px 0 0 0; }
        h1 { margin: 0 15; padding: 0 0 16px 0; font-size: 35px; font-weight: bold; letter-spacing: -2px; border-bottom: 1px solid #999; }
        h2 { font-size: 18px; margin: 0 0 6px 0; position: relative; }
        h2 span { position: absolute; bottom: 0; right: 0; font-style: italic; font-family: Georgia, Serif; font-size: 16px; color: #999; font-weight: normal; }
        p { margin: 0 15; font-size:  18px; }
        a { color: #999; text-decoration: none; border-bottom: 1px dotted #999; }
        a:hover { border-bottom-style: solid; color: black; }
        ul { margin: 0 0 32px 17px; }
        #objective { width: 500px; float: left; }
        #objective p { font-family: Georgia, Serif; font-style: italic; color: #666; }
        dt { font-style: italic; font-weight: bold; font-size: 18px; text-align: right; padding: 0 26px 0 0; width: 150px; float: left; height: 100px; border-right: 1px solid #999;  }
        dd { width: 600px; float: right; }
        dd.clear { float: none; margin: 0; height: 15px; }
     </style>
</head>
<br>

<body>

    <div id="page-wrap">
    <br>                                 
        <div id="contact-info" class="vcard">
        
            <!-- Microformats! -->
            <img src="img/{{$hola->curriculo->imagen}}" id="pic" height="150px" width="150px"/>
            <h1 class="fn">{{$hola->curriculo->nombres}} {{$hola->curriculo->apellido_paterno}} {{$hola->curriculo->apellido_materno}}</h1>
        
            <p>
                Número de Celular: {{$hola->curriculo->numero_cel}}<br>
                Email: {{$hola->curriculo->correo}}<br>
                País: México<br>
                Estado: {{$hola->estado->nombre_estado}}<br>
                Municipio: {{$hola->municipio->nombre_localidad}}<br>
                Domicilio: {{$hola->curriculo->domicilio}}. Colonia: {{$hola->curriculo->colonia}}
                
            </p>
        </div>
                
       <!-- <div id="objective">
            <p>
              Soy un joven profesional extrovertido y enérgico (pregunte a cualquiera), que busca una carrera que se ajuste a mis habilidades profesionales, personalidad y tendencias. 
              Mi cabeza es calmar y solucionador de problemas magistral e inspira miedo en quien la mira. 
              Puedo aportar dominación mundial a tu organización. 
            </p>
        </div> -->
        
        <div class="clear"></div>
        
        <dl>
            <br>
            <dd class="clear"></dd>
            <br>
            
                        
            <dt>Educación</dt>
            <dd>                
                <p><strong>Universidad: </strong> {{$hola->escuela}} <br>
                    <strong>Carrera: </strong> {{$hola->perfil->carrera}}<br />
                    <strong>Especialidad: </strong> {{$hola->especialidad}} <br>
                 
                    <strong>Periodo: </strong> Inicio: {{$hola->fecha_inicio}} - Termino: {{$hola->fecha_termino}}<br>
                     <strong>Nivel de Estudio: </strong> {{$hola->nivel_estudio}} <br><br>
                     <?php 
                         if ($hola->maestria_doctorado == " ") {
                             
                         }else{
                             $maes = json_decode($hola->maestria_doctorado, true);
                             
                             foreach ($maes as $value) {
                                 $cadena = $value['Maestria']; 
                                 echo '<strong>Maestria/Doctorado: </strong>'.($cadena).'<br>';
                                 $cadena = $value['Escuela']; 
                                 echo '<strong>Escuela: </strong>'.($cadena).'<br>'; 
                             }
                         }
                         
                     ?>                                   
                 </p>
                 <br>
            </dd>
        </dl>
        @if ($hola->maestria_doctorado == " ")
            
        @elseif($hola->maestria_doctorado != " ")
        <dl>
            <br>
            <dd class="clear"></dd>
            <br>
            <br>
            <dt></dt>
            <dd></dd>
        </dl>
        @endif
        
        <dl>            
            <br>
            <dd class="clear"></dd>
            <br>
            <br>
            
            <dt>Experiencia</dt>
            <dd>                
                <?php
                    if ($hola->experiencia == " ") {
                        echo '<p>Sin experiencia</p>';
                    }else {
                        $res = json_decode($hola->experiencia,true);
                        foreach ($res as $value) {
                        $cadena = $value['Puesto'];
                        echo '<p>Puesto: '.($cadena).'<br>';
                        $cadena = $value['Empresa'];
                        echo 'Empresa: '.($cadena).'<br>';
                        $cadena = $value['Actividades'];
                        echo 'Actividades y Logros: '.($cadena).'<br>';
                        $cadena = $value['Fecha_e'];
                        echo 'Fecha de entrada: '.($cadena).'<br>';
                        $cadena = $value['Fecha_s'];
                        echo 'Fecha de salida: '.($cadena).'</p>';                     
                        }
                    }
                    
                ?>
            </dd>
        </dl>
        <dl>
            <br>
            <dd class="clear"></dd>
            <br>
            <br>
            
            <dt>Cursos / <br>Certificaciones</dt>
            <dd>
                <?php
                if ($hola->curso == " ") {
                    
                    echo '<p>Sin cursos</p>';
                }else {
                    $res = json_decode($hola->curso,true);
                    foreach ($res as $value) {
                    $cadena = $value['Curso'];
                    echo '<p>Curso: '.($cadena).'<br>';
                    $cadena = $value['Enlace'];
                    echo 'Enlace: '.($cadena).'<br>';
                    $cadena = $value['Descripcion'];
                    echo 'Descripcion: '.($cadena).'<br>';
                                       
                    }
                }
                
            ?>
            </dd>
        </dl>
        <dl>
            <br>
            <dd class="clear"></dd>
            <br>
            <br>
            
            <dt>Habilidad</dt>
            <dd>                    
                <p>{{$hola->habilidades}}</p>
            </dd>

        </dl>
        <dl>
            <br>
            <dd class="clear"></dd>
            <br>
            <br>
            
            <dt>Objetivo Profesional:</dt>
            <dd>                    
                <?php 
                    $res = json_decode($hola->objetivo,true);
                    //dd($res);                 
                    echo '<p>Puesto: '.($res[0]).'<br>';
                    echo 'Salario: $'.($res[1]).' pesos mensuales <br>';                                                                                
                    echo 'Objetivo Profesional: '.($res[2]).'</p>'; 
                ?>
            </dd>

        </dl>
        <dl>  
            <br>        
            <dd class="clear"></dd>
            <br>
            <br>
            
            <dt>Idioma</dt>
            <dd>
                <?php 
                $co = explode(",",$hola->ididioma);
                $co2= count($co);   
                
                                  
                for ($i=0; $i < $co2; $i++) {
                   $idioma = DB::table('idioma')->where('ididioma',$co[$i])->first();  
                   //dd($idioma);
                   echo '<p>'.$idioma->idioma.'</p>';
                }                 
                ?>
            </dd>
                                               
        </dl>
               
    </div>
                     
</body>

</html>