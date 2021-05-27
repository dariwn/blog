
@extends('administradora.inicio3')
@section('contenido')

<div class="container">      
        <div class="col-sm-10" >

          <div class="panel panel-success"><br>
              <h2 class="panel-title"><center><font size="5"></i>Ingrese Los Siguientes Datos Para Generar El Reporte</font></center></h2>
				
                <div class="panel-body">              
                    <div class=" col-md-12"> 
                        <form action="{{ url('/imprimiendo-reporte') }}" method="POST">
                            @csrf
                            <div>
                            <center>	
                                <div class="col-md-6">
									<label>Dirigido:</label>
									<input class="form-control" type="text" name="dirigido">
						
									<label>Cargo:</label>
									<input class="form-control" type="text" name="cargo">
						
									<label>Número de reporte:</label>
                                    <input class="form-control" type="text" name="numero">	
                                    
                                    <label>Nombre completo de quien extiende:</label>
									<input class="form-control" type="text" name="nombre_extiende">
								</div>
								<div class="col-md-6">
									<label>Fecha de inicio del período:</label>
									<input class="form-control" type="date" name="periodo">
						
									<label>Fecha final del período:</label>
									<input class="form-control" type="date" name="hasta">
						
									<label>Fecha de extensión:</label>
                                    <input class="form-control" type="date" name="extiende">
                                    
                                   
								</div>
								</div>
                                </center>
                            </div>
                            <br>
                            <center>
                            <div class="col-md-12">	
                                <br>	
                                <input type="submit" name="enviar" value="Descargar" class="btn-primary btn-lg">
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
