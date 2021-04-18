@extends('administradora.inicio3')
@section('contenido')

<script type="text/javascript">
    $(document).ready(function () {
    $('input#numerocontrol')
        .keypress(function (event) {
        if (this.value.length === 8) {
            return false;
        }
        });
    });

</script>
<br>
@include('sesionstatus')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edicion De Usuario Egresado</div>
                <div class="card-body">
                    <form  action="{{ Route('RegistroEgresado.actualizado', $editregistro->id) }}" method="POST">
                    @method('PUT')                
                    @csrf   
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label text-md-right">Número de Control: </label>
                        <div class="col-md-6">
                           <input type="number" name="numerocontrol" id="numerocontrol" required class="form-control" value="{{ $editregistro->numero_control}}" placeholder="Número de Control"> 
                        </div>                            
                    </div>  
                    
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label text-md-right">Nombre(s): </label>
                        <div class="col-md-6">
                           <input type="text" name="nombre" required class="form-control" placeholder="Nombre(s)" value="{{ $editregistro->nombres}}"> 
                        </div>                            
                    </div> 

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label text-md-right">Apellido Paterno: </label>
                        <div class="col-md-6">
                           <input type="text" name="apellidop" required class="form-control" placeholder="Apellido Paterno" value="{{ $editregistro->apellido_paterno}}"> 
                        </div>                            
                    </div> 

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label text-md-right">Apellido Materno: </label>
                        <div class="col-md-6">
                           <input type="text" name="apellidom" required class="form-control" placeholder="Apellido Materno" value="{{ $editregistro->apellido_materno}}"> 
                        </div>                            
                    </div> 

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label text-md-right">Correo Electronico: </label>
                        <div class="col-md-6">
                           <input type="email" name="correo" required class="form-control" placeholder="Correo Electronico" value="{{ $editregistro->email}}"> 
                        </div>                            
                    </div> 
                           
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </div>
                    </div>                                                                      
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
