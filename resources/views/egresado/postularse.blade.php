@extends('egresado.inicio')
<link rel="stylesheet" href="{{asset('css/pos.css')}}">
@section('contenido')
	<div>
		<fieldset>
	        <legend>Informaci&oacute;n de la Solicitud</legend>
	        <div class="inputs">
	        <div class="form-group name-box col-md-6 col-sm-6">
	          <label for="name" class=""> Nombre de la Empresa </label>
	          <input class="form-control" type="text" value="{{ $empresa->nombre }}" readonly/>
	        </div>
	        <div class="form-group empresa-box col-md-6 col-sm-6">
	          <label for="empresa" class=""> Nombre del Puesto </label>
	          <input class="form-control" type="text" value="{{ $solicitudes->nombredelpuesto }}" readonly/>
	        </div>
	        <div class="form-group ubicacion-box col-md-6 col-sm-6">
	          <label for="ubicacion" class="">Descripci&oacute;n del puesto </label>
	          <input class="form-control" type="text" value="{{ $solicitudes->descripcion_del_puesto }}" readonly/>
	        </div>
	        <div class="form-group ubicacion-box col-md-6 col-sm-6">
	          <label for="ubicacion" class="">Requisitos </label>
	          <input class="form-control" type="text" value="{{ $solicitudes->requisito }}" readonly/>
	        </div>
	        <div class="form-group ubicacion-box col-md-6 col-sm-6">
	          <label for="ubicacion" class="">Sexo </label>
	          <input class="form-control" type="text" value="{{ $solicitudes->genero->sexo }}" readonly/>
	        </div>
	        <div class="form-group ubicacion-box col-md-6 col-sm-6">
	          <label for="ubicacion" class="">Perfil </label>
	          <input class="form-control" type="text" value="{{ $perfil }}" readonly/>
	        </div>
	        <div class="form-group email-box col-md-6 col-sm-6">
	          <label for="email" class=""> Salario </label>
	          <input class="form-control" type="email" value="${{ $solicitudes->salario }}" readonly/>
	        </div>
	        <div class="form-group ubicacion-box col-md-6 col-sm-6">
	          <label for="ubicacion" class="">Horario </label>
	          <input class="form-control" type="text" value="{{ $solicitudes->horario }}" readonly/>
	        </div>
	        <div class="form-group ubicacion-box col-md-6 col-sm-6">
	          <label for="ubicacion" class="">Edades </label>
	          <input class="form-control" type="text" value="{{ $solicitudes->edades }} años" readonly/>
	        </div>
	        <div class="form-group ubicacion-box col-md-6 col-sm-6">
	          <label for="ubicacion" class="">Tiempo de Contrataci&oacute;n </label>
	          <input class="form-control" type="text" value="{{ $solicitudes->tiempo_de_contratacion }}" readonly/>
	        </div>
	        <div class="form-group ubicacion-box col-md-6 col-sm-6">
	          <label for="ubicacion" class="">Cambio de residencia </label>
	          <input class="form-control" type="text" value="{{ $solicitudes->cambio_de_residencia }}" readonly/>
	        </div>
	      </div>
	    </fieldset>
	</div>
	<form action="{{ url('postulacion-registrada') }}" method="POST" name="formulario__usuario">
	@csrf
      <fieldset>
        <legend>Postularse</legend>
        <div class="inputs">
        <input type="hidden" name="idsolicitud" value="{{ $solicitudes->idsolicitud }}" readonly/>
	    <input type="hidden" name="idegresado" value="{{ $egresados->idegresado }}" readonly/>
	    <input type="hidden" name="idempresa" value="{{ $b->id_empresa }}" readonly/>
	    <input type="hidden" name="estatus" value="Postulado" readonly/>
        <!-- <div class="form-group email-box col-md-6 col-sm-6">
          <label for="email" class=""> Nombre Vacante </label>
          <input class="form-control" type="email" id="email" />
        </div>
        <div class="form-group ubicacion-box col-md-6 col-sm-6">
          <label for="ubicacion" class="">Empresa </label>
          <input class="form-control" type="text" id="ubicacion" />
        </div> -->
      </div>
      
      <label for="" class="form-group col-md-12 col-sm-12 col-xs-12"> Comentario
        <textarea class="form-control" name="comentario" id="" cols="30" rows="3"></textarea>
      </label>

        <div class="form-group btns col-md-12">
          <label for="file">
            <span class="btn btn-warning">Adjuntar Archivo</span>
            <input type="file" id="file" class="" name="curriculum" />
          </label>
        <input type="submit" class="btn btn-primary" value="Enviar Postulación" /> 
        </div>
         
      </fieldset>
    </form>
@endsection