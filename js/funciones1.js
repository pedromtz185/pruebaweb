function agregaform(datos){
	d=datos.split('||');
	var id_producto = (d[0]);
	var id_categoria = (d[1]);
	var nombreproducto = (d[2]);
  var descripcionproducto = (d[3]);
  var categoria1 = (d[4]);
  var nombrecategoria = (d[5]);
  var descripcioncategoria = (d[6]);


	$('#id_productox').val(id_producto);
	$('#id_categoriax').val(id_categoria);
	$('#nombreproductox').val(nombreproducto);
  $('#descripcionproductox').val(descripcionproducto);
	$('#categoria1x').val(categoria1);
	$('#nombrecategoriax').val(nombrecategoria);
  $('#descripcioncategoriax').val(descripcioncategoria);


}
