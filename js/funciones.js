function agregaform(datos){
	d=datos.split('||');
	var id_categoria = (d[0]);
	var nombrecategoria = (d[1]);
	var actualizardescripcion = (d[2]);


	$('#id_categoriax').val(id_categoria);
	$('#nombrecategoriax').val(nombrecategoria);
	$('#actualizardescripcionx').val(actualizardescripcion);


}
