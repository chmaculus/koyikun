		function ver_articulo(id_articulo) {
			parent.location.href="ver_articulo.php?id_articulo=" + id_articulo;
		}

		function modificar_articulo(id_articulo) {
			parent.location.href="modificar_articulo.php?id_articulo=" + id_articulo;
		}

		function eliminar_articulo(id_articulo) {
			parent.location.href="eliminar_articulo.php?id_articulo=" + id_articulo ;
		}

		function inicio() {
			var numfilas=document.getElementById("numfilas").value;
			var indi=parent.document.getElementById("iniciopagina").value;
			var contador=1;
			var indice=0;
			if (indi>numfilas) { 
				indi=1; 
			}
			parent.document.form_busqueda.filas.value=numfilas;
			parent.document.form_busqueda.paginas.innerHTML="";		
			while (contador<=numfilas) {
				texto=contador + "-" + parseInt(contador+49);
				if (indi==contador) {
					parent.document.form_busqueda.paginas.options[indice]=new Option (texto,contador);
					parent.document.form_busqueda.paginas.options[indice].selected=true;
				} else {
					parent.document.form_busqueda.paginas.options[indice]=new Option (texto,contador);
				}
				indice++;
				contador=contador+50;
			}
		}
