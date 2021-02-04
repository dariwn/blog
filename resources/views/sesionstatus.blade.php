@if(session('guardado'))
	<div class="col-4 " style="margin-left: 50%";>
		<div class="alert alert-success alert-dismissible fade show" role="alert">
		  <strong><i class="fas fa-envelope-open-text"></i>Mensaje:</strong> {{ session('guardado') }}
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
	</div>
@endif

@if(session('registro'))
	<div class="col-4 " style="margin-left: 50%";>
		<div class="alert alert-success alert-dismissible fade show" role="alert">
		  <strong><i class="fas fa-envelope-open-text"></i>Mensaje:</strong> {{ session('registro') }}
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
	</div>
@endif