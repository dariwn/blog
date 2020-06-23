<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

     <title>Curriculo</title>

     <style type="text/css">
        * { margin: 0; padding: 0; }
        body { font: 16px Helvetica, Sans-Serif; line-height: 24px; background: url(images/noise.jpg); }
        .clear { clear: both; }
        #page-wrap { width: 800px; margin: 40px auto 60px; }
        #pic { float: right; margin: -30px 0 0 0; }
        h1 { margin: 0 0 16px 0; padding: 0 0 16px 0; font-size: 42px; font-weight: bold; letter-spacing: -2px; border-bottom: 1px solid #999; }
        h2 { font-size: 20px; margin: 0 0 6px 0; position: relative; }
        h2 span { position: absolute; bottom: 0; right: 0; font-style: italic; font-family: Georgia, Serif; font-size: 16px; color: #999; font-weight: normal; }
        p { margin: 0 0 16px 0; }
        a { color: #999; text-decoration: none; border-bottom: 1px dotted #999; }
        a:hover { border-bottom-style: solid; color: black; }
        ul { margin: 0 0 32px 17px; }
        #objective { width: 500px; float: left; }
        #objective p { font-family: Georgia, Serif; font-style: italic; color: #666; }
        dt { font-style: italic; font-weight: bold; font-size: 18px; text-align: right; padding: 0 26px 0 0; width: 150px; float: left; height: 100px; border-right: 1px solid #999;  }
        dd { width: 600px; float: right; }
        dd.clear { float: none; margin: 0; height: 15px; }

        @page {
                size: A4 Portrait; 
            }
     </style>
</head>

<body>

    <div id="page-wrap">
    <br>
            
        <div id="contact-info" class="vcard">
        
            <!-- Microformats! -->
        
            <h1 class="fn">{{$hola->curriculo->nombres}}</h1>
        
            <p>
                Cell: <span class="tel">{{$hola->curriculo->numero_cel}}</span><br />
                Email: <span class="email" href="#">{{$hola->curriculo->correo}}</a><br />
                Estado: <span class="estado">{{$hola->estado->nombre_estado}}</span><br />
                Municipio: <span class="municipio">{{$hola->municipio->nombre_localidad}}</span><br />
            </p>
        </div>                        
        
         <div class="clear"></div>
        
        <dl>
            <dd class="clear"></dd>
            
            <dt>Educación</dt>
            <dd>
                <h2>{{$hola->escuela}}</h2>
                <p><strong>Perfil:</strong> {{$hola->perfil->carrera}}<br />
                   <strong>Periodo:</strong> {{$hola->duracion}}</p>
            </dd>
            
            <dd class="clear"></dd>

            <dt>Experiencia</dt>
            <dd>                
                <p>{{$hola->experiencia}}</p>
            </dd>

            <dd class="clear"></dd>
            
            <dt>Habilidad</dt>
            <dd>
                <h2>{{$hola->especialidad}}</h2>        
                <p>{{$hola->habilidades}}</p>
            </dd>
            
            <dd class="clear"></dd>
            
            <dt>Area</dt>
            <dd>
               <h2>{{$hola->area}}</h2>
            </dd>
            
            <dd class="clear"></dd>
            
            <dt>Idioma</dt>
            <dd>
               <h2>{{$hola->idioma->idioma}}</h2>
               <p><strong>Nivel:</strong> {{$hola->nivel->nivel}}</p>
            </dd>
            
            <dd class="clear"></dd>
            
            <dt>Domicilio</dt>
            <dd>{{$hola->curriculo->domicilio}}</dd>
            <dd>{{$hola->curriculo->colonia}}</dd>
            
            
        </dl>
    </div>

    
</body>

</html>
