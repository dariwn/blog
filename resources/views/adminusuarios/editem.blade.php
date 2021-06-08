
@extends('administradora.inicio3')
@section('contenido')
@if ($existe == 'Si')

<div class="row">
    <div class="col-md-8"></div>
    <div class="col-md-4">
    <div class="box box-default">
      <div class="box-header with-border">
        <h5 class="box-title">Aviso:</h5>
      </div><!-- /.box-header -->
      <div class="box-body">
    
       Este username ya se encuentra en uso!!
       <br>
       <span style="font-size: 11.5px">*Nota: Si deseas cambiar tu contraseña, deberás cambiar tu username.</span>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
    </div>
    
@endif
<div class="container">      
        <div class="col-sm-10" >

          <div class="panel panel-success"><br>
              <h2 class="panel-title"><center><font size="5"></i>Edición De Usuario Empresa</font></center></h2>

            <div class="panel-body">              
                <div class=" col-md-12"> 
                    <div class="card">
                                
                        <div class="card-body">
                            <form action="{{ route('usuarios-empresa.update', $usuario->id) }}" method="post">
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
{{-- 
                                <div class="form-group">                                    
                                    <div class="col-md-6">
                                        <label>Correo Electronico:</label>
                                       <input type="text" name="email" required class="form-control" value="{{ $usuario->email }}"> 
                                    </div>                            
                                </div> --}}
                        
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