
function cal2(idarticulos) {
	temp1  =  parseFloat(document.getElementById('costo'+idarticulos).value) * (parseFloat(document.getElementById('reponer'+idarticulos).value) * 1)  ;

	document.getElementById('totalpedir'+idarticulos).value = temp1.toFixed(2);
}



function popup(mylink, windowname){
	if (! window.focus)return true;
		var href;
	if (typeof(mylink) == 'string')
   	href=mylink;
	else
   	href=mylink.href;
		window.open(href, windowname, 'width=1000,height=555,scrollbars=yes');
return false;
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

