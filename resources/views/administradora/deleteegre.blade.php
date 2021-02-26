<form action="{{ route('nuevoegresado.destroy', $usuario->id)}}" method="post" style="display: inline-block;">
	@method('DELETE')
	@csrf
	
	<br>
	<button type="submit" class="btn btn-danger">Rechazar</button>
</form>