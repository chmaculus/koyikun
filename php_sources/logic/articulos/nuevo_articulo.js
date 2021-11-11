function cancelar() {
	location.href="index.php";
}

var cursor;
if (document.all) {
		// Está utilizando EXPLORER
		cursor='hand';
	} else {
		// Está utilizando MOZILLA/NETSCAPE
		cursor='pointer';
	}

	function limpiar() {
		document.getElementById("referencia").value="";
		document.getElementById("descripcion").value="";
		document.getElementById("descripcion_corta").value="";
		document.getElementById("stock_minimo").value="";
		document.getElementById("stock").value="";
		document.getElementById("datos").value="";
		document.getElementById("fecha").value="";
		document.getElementById("unidades_caja").value="";
		document.getElementById("observaciones").value="";
		document.getElementById("precio_compra").value="";
		document.getElementById("precio_almacen").value="";
		document.getElementById("precio_tienda").value="";
		document.getElementById("precio_iva").value="";
		document.getElementById("foto").value="";
		document.formulario.cboFamilias.options[0].selected = true;
		document.formulario.cboImpuestos.options[0].selected = true;
		document.formulario.cboProveedores1.options[0].selected = true;
		document.formulario.cboProveedores2.options[0].selected = true;
		document.formulario.cboUbicacion.options[0].selected = true;
		document.formulario.cboEmbalaje.options[0].selected = true;
		document.formulario.Aaviso_minimo.options[0].selected = true;
		document.formulario.Aprecio_ticket.options[0].selected = true;
		document.formulario.Amodif_descrip.options[0].selected = true;
	}
