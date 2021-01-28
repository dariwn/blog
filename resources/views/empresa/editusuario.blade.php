@extends('empresa.inicio1')
@section('contenido')

<div class="container">      
        <div class="col-sm-10" >

          <div class="panel panel-success"><br>
              <h2 class="panel-title"><center><font size="5"></i>Edición Usuario Empresa</font></center></h2>

            <div class="panel-body">              
                <div class=" col-md-12"> 
                    <div class="card">
                                
                        <div class="card-body">
                            <form action="{{ route('ajustesemp.update', $usuario->id) }}" method="post">
                                @csrf
                                @method('PUT')
        
                                <div class="form-group">                                    
                                    <div class="col-md-6">
                                        <label>User Name:</label>
                                       <input type="text" name="username" required class="form-control" value="{{ $usuario->username }}"> 
                                    </div>                            
                                </div>
        
                                <div class="form-group">                                    
                                    <div class="col-md-6">
                                        <label>Contraseña:</label>
                                       <input type="password" name="contraseña" required class="form-control" placeholder="password"> 
                                    </div>                            
                                </div>

                                
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <br>
                                        <input type="submit" value="Guardar Cambios" class="btn btn-success">  
                                    </div>                            
                                </div>
        
                            </form>
                        </div>
                    </div>
                     </div>
                </div>
            </div>
          </div>
        </div>
</div>
                             
@endsection