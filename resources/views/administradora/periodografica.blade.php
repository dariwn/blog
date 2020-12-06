
@extends('administradora.inicio3')
@section('contenido')

<div class="container">      
        <div class="col-sm-10" >

          <div class="panel panel-success"><br>
              <h2 class="panel-title"><center><font size="5"></i>Ingrese los siguientes datos para graficar</font></center></h2>

                <div class="panel-body">              
                    <div class=" col-md-10"> 
                        <form action="{{ url('/grafica') }}" method="POST">
                            @csrf
                            <div>
                            <center>	
                                <div>
                                    <label>Tipo de Grafica:</label>
                                    <select name="tipo" class="form-control" required>
                                        <option value="">Selecciona una opción</option>
                                        <option value="1">Carrera Más Solicitada</option>
                                        <option value="2">Puestos Ocupados Por Alumnos</option>
                                    </select>
                                    <br>
                                    <label>Fecha de inicio del periodo:</label>
                                    <input class="form-control" type="date" name="periodo">
                                    <br>
                                    <label>Fecha final del periodo:</label>
                                    <input class="form-control" type="date" name="hasta">			
                                </div>
                                </div>
                                </center>
                            </div>
                            <br>
                            <center>
                            <div class="col-xs-12 col-md-6">	
                                <br>	
                                <input type="submit" name="enviar" value="Ver Grafica" class="btn-primary btn-lg">
                            </div>	
                            </center>
                        </form>
                    </div>
                </div>
				
                          
                
            </div>
        </div>
        
</div>

                      
                     
                  
@endsection