$("#estado").change(event => {
	$.get(`/egresado/${event.target.value}/municipio/${event.target.value}`, function(res, estado){
		$("#municipio").empty();
		res.forEach(element => {
			$("#municipio").append(`<option value=${element.idmunicipio}> ${element.nombre_localidad} </option>`);
		});
	});
});