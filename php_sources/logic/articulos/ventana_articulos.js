function buscar() {
	if (document.getElementById("iniciopagina").value=="") {
		document.getElementById("iniciopagina").value=1;
	} else {
		document.getElementById("iniciopagina").value=document.getElementById("paginas").value;
	}
	document.getElementById("form1").submit();
	document.getElementById("tabla_resultado").style.display="";
}

function inicio() {

	var combo_familia=document.getElementById("cmbfamilia").value;
	if (combo_familia==0) {
		buscar();
	} else {
		document.getElementById("tabla_resultado").style.display="none";
	}
	
}

function paginar() {
	document.getElementById("iniciopagina").value=document.getElementById("paginas").value;
	document.getElementById("form1").submit();
}

function enviar() {
	document.getElementById("form1").submit();
}