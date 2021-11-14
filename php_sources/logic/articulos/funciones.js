		var cursor;
		if (document.all) {
		// Está utilizando EXPLORER
		cursor='hand';
	} else {
		// Está utilizando MOZILLA/NETSCAPE
		cursor='pointer';
	}
	
	function inicio() {
		document.getElementById("form_busqueda").submit();
	}
	function nuevo_articulo() {
		location.href="nuevo_articulo.php";
	}
	
	function imprimir() {
		var ida=document.getElementById("ida").value;
		var marca=document.getElementById("marca").value;
		var clasificacion=document.getElementById("clasificacion").value;
		var subclasificacion=document.getElementById("subclasificacion").value;			
		var descripcion=document.getElementById("descripcion").value;
		window.open("../fpdf/articulos.php?codarticulo="+codarticulo+"&referencia="+referencia+"&descripcion="+descripcion+"&proveedores="+proveedores+"&familia="+familia+"&ubicacion="+ubicacion);
	}
	
	function limpiar_busqueda() {
		var ida=document.getElementById("ida").value;
		var marca=document.getElementById("marca").value;
		var clasificacion=document.getElementById("clasificacion").value;
		var subclasificacion=document.getElementById("subclasificacion").value;			
		var descripcion=document.getElementById("descripcion").value;
		document.form_busqueda.marca[0].selected = true;
		document.form_busqueda.clasificacion.options[0].selected = true;
		document.form_busqueda.subclasificacion.options[0].selected = true;
	}
	
	function buscar() {
		var cadena;
		cadena=hacer_cadena_busqueda();
		document.getElementById("cadena_busqueda").value=cadena;
		if (document.getElementById("iniciopagina").value=="") {
			document.getElementById("iniciopagina").value=1;
		} else {
			document.getElementById("iniciopagina").value=document.getElementById("paginas").value;
		}
		document.getElementById("form_busqueda").submit();
	}
	
	function paginar() {
		document.getElementById("iniciopagina").value=document.getElementById("paginas").value;
		document.getElementById("form_busqueda").submit();
	}
	
	function hacer_cadena_busqueda() {
		var ida=document.getElementById("ida").value;
		var marca=document.getElementById("marca").value;
		var clasificacion=document.getElementById("clasificacion").value;
		var subclasificacion=document.getElementById("subclasificacion").value;			
		var descripcion=document.getElementById("descripcion").value;
		var cadena="";
		cadena="~"+id+"~"+marca+"~"+clasificacion+"~"+subclasificacion+"~"+descripcion+"~";
		return cadena;
	}
	
	function ventanaArticulos(){
		miPopup = window.open("ventana_articulos.php","miwin","width=700,height=500,scrollbars=yes");
		miPopup.focus();
	}
