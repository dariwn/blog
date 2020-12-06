@extends('egresado.inicio')
@section('contenido')


<script type="text/javascript">
var element = 1;
var element1 = 1.11;
var element2 = -1;
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
       
       element = element + 1;
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
      input10.value = element1.toFixed(2);
      input10.setAttribute("onclick","eliminarCur("+element1.toFixed(2)+")");
      span1.innerHTML = "eliminar";

      label7.innerHTML = "Curso/Certificacion:";
      label7.id = element1.toFixed(2);
      input7.type = 'text';
      input7.id = element1.toFixed(2);
      input7.className='form-control';
      input7.name="curso[]";

      label8.innerHTML= "Enlace Del Certificado"
      label8.id = element1.toFixed(2);
      input8.type = 'text';
      input8.id = element1.toFixed(2);
      input8.className='form-control';
      input8.name="enlace[]";

      label9.innerHTML= "Descripcion"
      label9.id = element1.toFixed(2);
      input9.type = 'text';
      input9.id = element1.toFixed(2);
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
      
      element1 += .1;
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
       input13.value = element2;
       input13.setAttribute("onclick","eliminarMaestria("+element2+")");
       span2.innerHTML = "eliminar";
 
       label11.innerHTML = "Institución:";
       label11.id = element2;
       input11.type = 'text';
       input11.id = element2;
       input11.className='form-control';
       input11.name="escuela_maes[]";
 
       label12.innerHTML= "Nombre de la Maestria/Doctorado"
       label12.id = element2;
       input12.type = 'text';
       input12.id = element2;
       input12.className='form-control';
       input12.name="nombre_maes[]";

       
       maestria.appendChild(input13)
       maestria.appendChild(span2)
       maestria.appendChild(br)
 
       maestria.appendChild(label11)
       maestria.appendChild(input11)
 
       maestria.appendChild(label12)
       maestria.appendChild(input12)

       element2 -= 1;
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
    
</script>

<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h2>Curriculum</h2>
    </div>
</div>

    <form action="{{route('curriculo.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <label for="nombre">Escuela de Procedencia</label>
                <input type="text" name="escuela" required value="Tecnologico Nacional De México Campus Tuxtla Gutierrez" class="form-control" placeholder="Escuela">
                </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <label for="codigo">Tiempo de Estudio</label>
                <input type="text" name="duracion" required value="{{old('duracion')}}" class="form-control" placeholder="Tiempo">
                </div>  
                </div>

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <label for="codigo">Especialidad</label>
                <input type="text" name="especialidad" required value="{{old('especialidad')}}" class="form-control" placeholder="Especialidad">
                </div>  
                </div>
                
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <label for="codigo">Carrera</label>
                <input type="text" name="area" required value="{{old('area')}}" class="form-control" placeholder="Carrera">
                </div>  
                </div>

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                    <label for="codigo">Fecha de Inicio:</label>
                    <input type="date" name="fecha_inicio" value="{{old('fecha_inicio')}}" required  class="form-control" placeholder="Fecha de Inicio">
                    </div>  
                </div>

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                    <label for="codigo">Fecha de Termino:</label>
                    <input type="date" name="fecha_termino" value="{{old('fecha_termino')}}" required  class="form-control" placeholder="Fecha de Termino">
                    </div>  
                </div>

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                    <label for="codigo">Nivel de Estudios:</label>
                        <select name="nivel_estudios" class="form-control" required>
                            <option value="">Selecciona un Nivel</option>
                            <option value="Universitario - No Titulado">Universitario - No Titulado</option>
                            <option value="Universitario - Titulado">Universitario - Titulado</option>
                            <option value="Universitario - Maestria">Universitario - Maestria</option>
                            <option value="Universitario - Doctorado">Universitario - Doctorado</option>
                        </select>
                    </div>  
                </div>

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="maestria">
                    <div class="form-group">
                    <label for="codigo">Maestria/Doctorado:</label> <input type="button" id="btn_agregar_maestria" value="+" onclick="crearMaestria();">
                    
                    </div>  
                </div>

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="padre">
                    <div class="form-group">
                    <label for="codigo">Experiencias:</label> <input type="button" id="btn_agregar" value="+" onclick="crearDin();">
                    {{-- <input type="text" name="experiencia"  value="{{$hola->experiencia}}" class="form-control" placeholder="Experiencias"> --}}
                    </div>  
                </div>
                
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="padre1">
                    <div class="form-group">
                    <label for="codigo">Cursos/Certificaciones:</label> <input type="button" id="btn_agregar_curso" value="+" onclick="crearCurso();">
                    {{-- <input type="text" name="experiencia"  value="{{$hola->experiencia}}" class="form-control" placeholder="Experiencias"> --}}
                    </div>  
                </div>

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
                    <div class="form-group">
                    <label for="codigo">Objetivo Profesional:</label>
                    <br>Puesto:<input type="text" name="objetivo_puesto" value="{{old('objetivo_puesto')}}" class="form-control" placeholder="Puesto" required>
                    <br>Salario:<input type="number" name="objetivo_salario" value="{{old('objetivo_Salario')}}" class="form-control" placeholder="Salario" required>
                    <br>Objetivo:<input type="text" name="objetivo_objetivo" value="{{old('onjetivo_objetivo')}}" class="form-control" placeholder="Objetivo Profesional" required>
                    </div> 
                </div>
                   
                    

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <label for="codigo">Habilidades</label>
                <input type="text" name="habilidades" required value="{{old('habilidades')}}" class="form-control" placeholder="Habilidades">
                </div>  
                </div>

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <label>Idioma</label>
                <select name="ididioma" class="form-control">
                @foreach($idiomas as $idioma)
                              <option value="{{$idioma->ididioma}}">{{$idioma->idioma}}</option>
                              @endforeach
                       </select>
                       </div>
              </div>

              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <label>Nivel del Idioma</label>
                <select name="idjerarquia" class="form-control">
                @foreach($jerarquias as $jerarquia)
                              <option value="{{$jerarquia->idjerarquia}}">{{$jerarquia->nivel}}</option>
                              @endforeach
                       </select>
                       </div>
              </div>   

              
              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <label>Estado</label>
                <select name="idestado" class="form-control" id="estado">
                @foreach($estados as $estado)
                              <option value="{{$estado->idestado}}">{{$estado->nombre_estado}}</option>
                              @endforeach
                       </select>
                       </div>
              </div>

              
              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <label>Municipio</label>
                <select name="idmunicipio" class="form-control" id="municipio">
                       </select>
                       </div>
              </div>

              
              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <label>Perfil</label>
                <select name="idperfiles" class="form-control">
                @foreach($perfiles as $perfil)
                              <option value="{{$perfil->idperfiles}}">{{$perfil->carrera}}</option>
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