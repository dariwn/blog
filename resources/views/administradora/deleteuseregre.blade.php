<form action="{{ route('ajustes.destroy', $usuario->id)}}" method="post" style="display: inline-block;">
	@method('DELETE')
	@csrf
	
	<br>
	<button type="submit" class="btn btn-danger">Eliminar</button>
</form>