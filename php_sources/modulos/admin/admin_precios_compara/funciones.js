
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

