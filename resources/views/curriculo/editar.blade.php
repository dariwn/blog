@extends('egresado.inicio')
@section('contenido')


<script type="text/javascript">
var element2 = 5.11;
var element = 1.13;
var element3 = -1.16;
 function crearDin(){
         
      
       var padre = document.getElementById("padre");
       var br = document.createElement("br");
       var label1 = document.createElement("label");
       var input1 = document.createElement("INPUT");

       var label2 = document.createElement("label");        
       var input2 = document.createElement("INPUT");

       var label3 = document.createElement("label");        
       var input3 = document.createElement("INPUT");

       var label4 = document.createElement("label");        
       var input4 = document.createElement("INPUT");

       var label5 = document.createElement("label");        
       var input5 = document.createElement("INPUT");

       var input6 = document.createElement("INPUT");
       var span = document.createElement("span");
       var br = document.createElement("br");

       input6.type = "button";
       input6.value = element;
       input6.setAttribute("onclick","eliminarDin("+element+")");
       span.innerHTML = "eliminar";

       label1.innerHTML = "Puesto";
       label1.id = element;
       input1.type = 'text';
       input1.id = element;
       input1.className='form-control';
       input1.name="puesto[]";

       label2.innerHTML= "Empresa"
       label2.id = element;
       input2.type = 'text';
       input2.id = element;
       input2.className='form-control';
       input2.name="empresa[]";

       label3.innerHTML= "Actividades y Logros"
       label3.id = element;
       input3.type = 'text';
       input3.id = element;
       input3.className='form-control';
       input3.name="actividades_logros[]";

       label4.innerHTML= "Fecha Entrada"
       label4.id = element;
       input4.type = 'date';
       input4.id = element;
       input4.className='form-control';
       input4.name="fecha_entrada[]";

       label5.innerHTML= "Fecha Salida"
       label5.id = element;
       input5.type = 'date';
       input5.id = element;
       input5.className='form-control';
       input5.name="fecha_salida[]";
       
       padre.appendChild(input6)
       padre.appendChild(span)
       padre.appendChild(br)

       padre.appendChild(label1)
       padre.appendChild(input1)

       padre.appendChild(label2)
       padre.appendChild(input2)

       padre.appendChild(label3)
       padre.appendChild(input3)

       padre.appendChild(label4)
       padre.appendChild(input4)

       padre.appendChild(label5)
       padre.appendChild(input5)

       padre.appendChild(br)
       
       element +=.1;
    } 

    function crearCurso(){
       
            
       var padre1 = document.getElementById("padre1");
 
       var br = document.createElement("br");
       var label7 = document.createElement("label");
       var input7 = document.createElement("INPUT");
 
       var label8 = document.createElement("label");        
       var input8 = document.createElement("INPUT");
 
       var label9 = document.createElement("label");        
       var input9 = document.createElement("INPUT");
 
       var input10 = document.createElement("INPUT");
       var span1 = document.createElement("span");
       var br = document.createElement("br");
 
       input10.type = "button";
       input10.value = element2.toFixed(2);
       input10.setAttribute("onclick","eliminarCur("+element2.toFixed(2)+")");
       span1.innerHTML = "eliminar";
 
       label7.innerHTML = "Curso/Certificacion:";
       label7.id = element2.toFixed(2);
       input7.type = 'text';
       input7.id = element2.toFixed(2);
       input7.className='form-control';
       input7.name="curso[]";
 
       label8.innerHTML= "Enlace Del Certificado"
       label8.id = element2.toFixed(2);
       input8.type = 'text';
       input8.id = element2.toFixed(2);
       input8.className='form-control';
       input8.name="enlace[]";
 
       label9.innerHTML= "Descripcion"
       label9.id = element2.toFixed(2);
       input9.type = 'text';
       input9.id = element2.toFixed(2);
       input9.className='form-control';
       input9.name="descripcion[]";    
       
       padre1.appendChild(input10)
       padre1.appendChild(span1)
       padre1.appendChild(br)
 
       padre1.appendChild(label7)
       padre1.appendChild(input7)
 
       padre1.appendChild(label8)
       padre1.appendChild(input8)
 
       padre1.appendChild(label9)
       padre1.appendChild(input9)
      
       padre1.appendChild(br)
       
       element2 += .1;
       console.log(element2);
    } 
    function crearMaestria(){
       
       
       var maestria = document.getElementById("maestria");
 
       var br = document.createElement("br");
       var label11 = document.createElement("label");
       var input11 = document.createElement("INPUT");
 
       var label12 = document.createElement("label");        
       var input12 = document.createElement("INPUT");
  
       var input13 = document.createElement("INPUT");
       var span2 = document.createElement("span");
       var br = document.createElement("br");
 
       input13.type = "button";
       input13.value = element3;
       input13.setAttribute("onclick","eliminarMaestria("+element3+")");
       span2.innerHTML = "eliminar";
 
       label11.innerHTML = "Institución:";
       label11.id = element3;
       input11.type = 'text';
       input11.id = element3;
       input11.className='form-control';
       input11.name="escuela_maes[]";
 
       label12.innerHTML= "Nombre de la Maestria/Doctorado"
       label12.id = element3;
       input12.type = 'text';
       input12.id = element3;
       input12.className='form-control';
       input12.name="nombre_maes[]";

       
       maestria.appendChild(input13)
       maestria.appendChild(span2)
       maestria.appendChild(br)
 
       maestria.appendChild(label11)
       maestria.appendChild(input11)
 
       maestria.appendChild(label12)
       maestria.appendChild(input12)

       element3 -= 1;
    } 

    window.onload = function(){
       
       var btnAdd = document.getElementById("btn_agregar");   
       btnAdd.onclick = crearDin;

       var btnAdd1 = document.getElementById("btn_agregar_curso");   
       btnAdd1.onclick = crearCurso;

       var btnAdd2 = document.getElementById("btn_agregar_maestria");   
       btnAdd2.onclick = crearMaestria;
    } 

    function eliminarDin(num){  
       console.log(num);
         
            
       var eliminar = document.getElementById(num);

        eliminar.parentNode.removeChild(eliminar);
    }

    function eliminarCur(num){  
       console.log(num);
         
            
       var eliminar = document.getElementById(num);

        eliminar.parentNode.removeChild(eliminar);
    }

    function eliminarMaestria(num){  
       console.log(num);
         
            
       var eliminar = document.getElementById(num);

        eliminar.parentNode.removeChild(eliminar);
    }
     
    $(document).ready(function () {
    $('input#habilidades')
        .keypress(function (event) {
        if (this.value.length === 100) {
            return false;
        }
        });
    });

    $(document).ready(function () {
    $('input#especialidad')
        .keypress(function (event) {
        if (this.value.length === 60) {
            return false;
        }
        });
    });

</script>

<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h2>Curriculum</h2>
    </div>
</div>
    
<form action="{{ route('curriculo.update',$hola->idcurriculo) }}" method="POST">
    @csrf
    @method('PUT')
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <label for="nombre">Escuela de Procedencia</label>
                <input type="text" name="escuela" required value="{{$hola->escuela}}" class="form-control" placeholder="Escuela">
                </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <label for="codigo">Tiempo de Estudio</label>
                <input type="text" name="duracion" required value="{{$hola->duracion}}" class="form-control" placeholder="Tiempo">
                </div>  
                </div>

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <label for="codigo">Especialidad</label>
                <input type="text" name="especialidad" id="especialidad" required value="{{$hola->especialidad}}" class="form-control" placeholder="Especialidad">
                </div>  
                </div>
                
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <label for="codigo">Carrera</label>
                <input type="text" name="area" required value="{{$hola->area}}" class="form-control" placeholder="Area">
                </div>  
                </div>

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                  <label for="codigo">Fecha de Inicio:</label>
                  <input type="date" name="fecha_inicio" value="{{$hola->fecha_inicio}}" required  class="form-control" placeholder="Fecha de Inicio">
                  </div>  
              </div>

              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                  <label for="codigo">Fecha de Termino:</label>
                  <input type="date" name="fecha_termino" value="{{$hola->fecha_termino}}" required  class="form-control" placeholder="Fecha de Termino">
                  </div>  
              </div>

              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <label for="codigo">Nivel de Estudios:</label>
                    <select name="nivel_estudios" class="form-control" required>
                    <option value="{{$hola->nivel_estudio}}">{{$hola->nivel_estudio}}</option>
                        <option value="Universitario - No Titulado">Universitario - No Titulado</option>
                        <option value="Universitario - Titulado">Universitario - Titulado</option>
                        <option value="Universitario - Maestria">Universitario - Maestria</option>
                        <option value="Universitario - Doctorado">Universitario - Doctorado</option>
                    </select>
                </div>  
              </div>

              {{-- maestrias y doctorados --}}
              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="maestria">
                <div class="form-group">
                <label>Maestrías/Doctorados</label> <input type="button" id="btn_agregar_maestria" value="+" onclick="crearMaestria();">
                
                <?php
                  if($hola->maestria_doctorado == " "){
                    $c=-1;
                  }else {
                    $res1 = json_decode($hola->maestria_doctorado,true);
                    $c = -1;
                    foreach ($res1 as $value) {
                    $cadena1 = $value['Escuela'];                   
                    print '<br><input type='."button".' onclick='."eliminarMaestria($c);".' id='.'eliminar'.' value='.$c.'> <span>eliminar</span>';
                    echo '<br><label>Escuela:</label>';                     
                    print '<br><input type='."text".' id='.$c.' name='.'escuela_maes[]'.' value="'.($cadena1).'" class='."form-control".'>';                     
                    $cadena2 = $value['Maestria'];
                    echo '<br><label>Nombre de la Maestria/Doctorado:</label>';
                    print '<br><input type='."text".' id='.$c.' name='.'nombre_maes[]'.' value="'.($cadena2).'" class='."form-control".'>';                    
                    $c -= 1;
              
                    }
                    
                  }
                  echo '<input type='.'"hidden"'.'id='.'"agregamemaes"'.' value='.$c.'>';
                  
              ?>
                
                </div>  
                </div>

              {{--  --}}

                {{--experiencias  --}}
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="padre">
                  <div class="form-group">
                  <label for="codigo">Experiencias</label> <input type="button" id="btn_agregar" value="+" onclick="crearDin();">
                  {{-- <input type="text" name="experiencia"  value="{{$hola->experiencia}}" class="form-control" placeholder="Experiencias"> --}}
                  <?php
                    if($hola->experiencia == " "){
                      $c=1.12;
                    }else {
                      $res = json_decode($hola->experiencia,true);
                      $c = 1.12;
                      foreach ($res as $value) {
                      $cadena1 = $value['Puesto'];                   
                      print '<br><input type='."button".' onclick='."eliminarDin($c);".' id='.'eliminar'.' value='.$c.'> <span>eliminar</span>';
                      echo '<br><label>Puesto:</label>';                     
                      print '<br><input type='."text".' id='.$c.' name='.'puesto[]'.' value="'.($cadena1).'" class='."form-control".'>';                     
                      $cadena2 = $value['Empresa'];
                      echo '<br><label>Empresa:</label>';
                      print '<br><input type='."text".' id='.$c.' name='.'empresa[]'.' value="'.($cadena2).'" class='."form-control".'>';
                      $cadena3 = $value['Actividades'];
                      echo '<br><label>Actividades y Logros:</label>';
                      print '<br><input type='."text".' id='.$c.' name='.'actividades_logros[]'.' value="'.($cadena3).'" class='."form-control".'>';
                      $cadena4 = $value['Fecha_e'];
                      echo '<br><label>Fecha entrada:</label>';
                      print '<br><input type='."date".' id='.$c.' name='.'fecha_entrada[]'.' value="'.($cadena4).'" class='."form-control".'>';
                      $cadena5 = $value['Fecha_s'];
                      echo '<br><label>Fecha Salida:</label>';
                      print '<br><input type='."date".' id='.$c.' name='.'fecha_salida[]'.' value="'.($cadena5).'" class='."form-control".'>';                    
                      $c += .1;
                
                      }
                      
                    }
                    echo '<input type='.'"hidden"'.'id='.'"agregame"'.' value='.$c.'>';
                    
                ?>
                  
                  </div>  
                  </div>
                {{--  --}}
                {{-- campos cursos --}}               
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="padre1">
                  <div class="form-group">
                  <label for="codigo">Cursos:</label> <input type="button" id="btn_agregar_curso" value="+" onclick="crearCurso();">
                  {{-- <input type="text" name="experiencia"  value="{{$hola->experiencia}}" class="form-control" placeholder="Experiencias"> --}}
                  <?php
                    
                    if($hola->curso == " "){
                      $c=1.14;
                    }else {
                      $res2 = json_decode($hola->curso,true);
                      $c = 1.14;
                      foreach ($res2 as $value) {
                      $cadena1 = $value['Curso'];                   
                      print '<br><input type='."button".' onclick='."eliminarDin($c);".' id='.'eliminar'.' value='.$c.'> <span>eliminar</span>';
                      echo '<br><label>Curso:</label>';                     
                      print '<br><input type='."text".' id='.$c.' name='.'curso[]'.' value="'.($cadena1).'" class='."form-control".'>';                     
                      $cadena2 = $value['Enlace'];
                      echo '<br><label>Enlace:</label>';
                      print '<br><input type='."text".' id='.$c.' name='.'enlace[]'.' value="'.($cadena2).'" class='."form-control".'>';
                      $cadena3 = $value['Descripcion'];
                      echo '<br><label>Descripcion:</label>';
                      print '<br><input type='."text".' id='.$c.' name='.'descripcion[]'.' value="'.($cadena3).'" class='."form-control".'>';                     
                      $c += .1;
                
                      }
                      
                    }
                    echo '<input type='.'"hidden"'.'id='.'"agregamecurso"'.' value='.$c.'>';
                    
                ?>
                  
                  </div>  
                  </div>
             
                {{--  --}}
                
                  {{-- objetivos profesionales --}}
                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
                    <div class="form-group">
                    <label for="codigo">Objetivo Profesional:</label>
                    <?php 
                      $res3 = json_decode($hola->objetivo,true);
                      //dd($res);                 
                      echo '<br><Label>Puesto:</Label>';
                      print '<br><input type='."text".' name='.'objetivo_puesto'.' value="'.($res3[0]).'" class='."form-control".'>';                     
                      echo '<br><Label>Salario:</Label>';
                      print '<br><input type='."text".' name='.'objetivo_salario'.' value="'.($res3[1]).'" class='."form-control".'>';                     
                      echo '<br><Label>Objetivo:</Label>';
                      print '<br><input type='."text".' name='.'objetivo_objetivo'.' value="'.($res3[2]).'" class='."form-control".'>';                     
                                
                    ?>
                    </div> 
                </div>
                  {{--  --}}

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <label for="codigo">Habilidades</label>
                <input type="text" name="habilidades" id="habilidades" required value="{{$hola->habilidades}}" class="form-control" placeholder="Habilidades">
                </div>  
                </div>

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <label>Idioma</label>
                <select name="ididioma" class="form-control">
                @foreach($idiomas as $idioma)
                  @if($idioma->ididioma==$hola->ididioma)
                              <option value="{{$idioma->ididioma}}" selected>{{$idioma->idioma}}</option>
                              @else
                              <option value="{{$idioma->ididioma}}">{{$idioma->idioma}}</option>
                              @endif
                @endforeach
                       </select>
                       </div>
              </div>

              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <label>Nivel del Idioma</label>
                <select name="idjerarquia" class="form-control">
                @foreach($jerarquias as $jerarquia)
                 @if($jerarquia->idjerarquia==$hola->idjerarquia)
                              <option value="{{$jerarquia->idjerarquia}}" selected>{{$jerarquia->nivel}}</option>
                              @else
                              <option value="{{$jerarquia->idjerarquia}}">{{$jerarquia->nivel}}</option>
                              @endif
                  @endforeach
                       </select>
                       </div>
              </div>   

              
              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <label>Estado</label>
                <select name="idestado" class="form-control" id="estado">
                @foreach($estados as $estado)
                    @if($estado->idestado==$hola->idestado)
                              <option value="{{$estado->idestado}}" selected>{{$estado->nombre_estado}}</option>
                              @else
                              <option value="{{$estado->idestado}}">{{$estado->nombre_estado}}</option>
                              @endif
                @endforeach
                       </select>
                       </div>
              </div>

              
              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <label>Municipio</label>
                <select name="idmunicipio" class="form-control" id="municipio">
                 @foreach($municipios as $municipio)
                  @if($municipio->idmunicipio==$hola->idmunicipio)
                 <option value="{{$municipio->idmunicipio}}" selected>{{$municipio->nombre_localidad}}</option>
                 @else
                 <option value="{{$municipio->idmunicipio}}">{{$municipio->nombre_localidad}}</option>
                 @endif
                 @endforeach
                       </select>
                       </div>
              </div>

              
              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <label>Perfil</label>
                <select name="idperfiles" class="form-control">
                @foreach($perfiles as $perfil)
                 @if($perfil->idperfiles==$hola->idperfiles)
                              <option value="{{$perfil->idperfiles}}" selected>{{$perfil->carrera}}</option>
                              @else
                              <option value="{{$perfil->idperfiles}}">{{$perfil->carrera}}</option>
                              @endif
                @endforeach
                       </select>
                       </div>
              </div>
          <input type="hidden" name="idegresado" value="{{$egresados}}">
           <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
               <button class="btn btn-primary" type="submit">Registro</button>
           </div> 
    	</div>
    </div>
</form>
@endsection

