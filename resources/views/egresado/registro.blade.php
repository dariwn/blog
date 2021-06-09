@extends('layouts.admin')
@section('colores')
    
    <link rel="stylesheet" type="text/css" href="https://www.jquery-az.com/javascript/alert/dist/sweetalert.css">
	<script src="https://www.jquery-az.com/javascript/alert/dist/sweetalert-dev.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
@stop
@section('seccion')
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
@include('mensajes')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registro De Usuario Egresado</div>
                <div class="card-body">
                    <form  action="{{ Route('RegistroEgresado.store') }}" method="POST">
                                         
                    @csrf   
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label text-md-right">Número de Control: </label>
                        <div class="col-md-6">
                           <input type="number" name="numerocontrol" id="numerocontrol" required class="form-control" placeholder="Número de Control"> 
                        </div>                            
                    </div>  
                    
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label text-md-right">Nombre(s): </label>
                        <div class="col-md-6">
                           <input type="text" name="nombre" required class="form-control" placeholder="Nombre(s)"> 
                        </div>                            
                    </div> 

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label text-md-right">Apellido Paterno: </label>
                        <div class="col-md-6">
                           <input type="text" name="apellidop" required class="form-control" placeholder="Apellido Paterno"> 
                        </div>                            
                    </div> 

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label text-md-right">Apellido Materno: </label>
                        <div class="col-md-6">
                           <input type="text" name="apellidom" required class="form-control" placeholder="Apellido Materno"> 
                        </div>                            
                    </div> 

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label text-md-right">Correo Electrónico: </label>
                        <div class="col-md-6">
                           <input type="email" name="correo" required class="form-control" placeholder="Correo Electronico"> 
                        </div>                            
                    </div> 
                           
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>
                    </div>                                                                      
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
