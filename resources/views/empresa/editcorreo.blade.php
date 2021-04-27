@extends('empresa.inicio1')
@section('contenido')

<div class="container">      
        <div class="col-sm-10" >

          <div class="panel panel-success"><br>
              <h2 class="panel-title"><center><font size="5"></i>Edición Correo Empresa</font></center></h2>

            <div class="panel-body">              
                <div class=" col-md-12"> 
                    <div class="card">
                                
                        <div class="card-body">
                            <form action="{{ route('ajustesemp.update', $user[0]->id) }}" method="post">
                                @csrf
                                @method('PUT')
        
                                <div class="form-group">                                    
                                    <div class="col-md-6">
                                        <label>Correo Electrónico:</label>
                                       <input type="email" name="email" required class="form-control" value="{{ $user[0]->email }}"> 
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