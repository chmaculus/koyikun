function calcular() {
	temp1  = ( (document.form_costos.precio_costo.value * (document.form_costos.descuento1.value * -1) )/100 ) + ( document.form_costos.precio_costo.value * 1);
	temp1  = ( (temp1 * (document.form_costos.descuento2.value * -1) )/100 ) + ( temp1 * 1);
	temp1  = ( (temp1 * (document.form_costos.descuento3.value * -1) )/100 ) + ( temp1 * 1);
	temp1  = ( (temp1 * (document.form_costos.descuento4.value * -1) )/100 ) + ( temp1 * 1);
	temp1  = ( (temp1 * (document.form_costos.descuento5.value * -1) )/100 ) + ( temp1 * 1);
	temp1  = ( (temp1 * (document.form_costos.descuento6.value * -1) )/100 ) + ( temp1 * 1);
	temp1  = ( (temp1 * (document.form_costos.descuento7.value * -1) )/100 ) + ( temp1 * 1);
	temp1  = ( (temp1 * (document.form_costos.descuento8.value * -1) )/100 ) + ( temp1 * 1);
	temp1  = ( (temp1 * (document.form_costos.descuento9.value * -1) )/100 ) + ( temp1 * 1);
	temp1  = ( (temp1 * (document.form_costos.descuento10.value * -1) )/100 ) + ( temp1 * 1);
	total_con_iva  = ( (temp1 * document.form_costos.iva.value )/100 ) + ( temp1 * 1);
	total_con_margen  = ( (total_con_iva * document.form_costos.margen.value )/100 ) + ( total_con_iva * 1);

	document.form_costos.precio_venta.value = total_con_margen.toFixed(6);
}


function fun_marca() {
	var marca = '';
	marca = document.getElementById('marca').value;
	//document.getElementById('text1').value = marca;

	$('#marca option:selected').each(function () {
	$.post("select_clasificacion.inc.php", { 'marca': marca }, function(data){
		$("#clasificacion").html(data);
		$("#subclasificacion").html("");
	});			
	});			
}

function fun_clasificacion() {
	var marca = '';
	var clasificacion = '';
	marca = document.getElementById('marca').value;
	clasificacion = document.getElementById('clasificacion').value;
	//document.getElementById('text1').value = clasificacion;

	$('#clasificacion option:selected').each(function () {
	$.post("select_subclasificacion.inc.php", { 'marca': marca, 'clasificacion': clasificacion }, function(data){
		$("#subclasificacion").html(data);
		//$("#subclasificacion").html("");
	});			
	});			
}

