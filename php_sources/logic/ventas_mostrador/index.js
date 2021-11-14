var cursor;
if (document.all) {
		// Está utilizando EXPLORER
		cursor='hand';
	} else {
		// Está utilizando MOZILLA/NETSCAPE
		cursor='pointer';
	}
	
	var miPopup
	function abreVentana(){
		miPopup = window.open("ver_clientes.php","miwin","width=700,height=380,scrollbars=yes");
		miPopup.focus();
	}
	
	function ventanaArticulos(){
		var codigo=document.getElementById("codcliente").value;
		if (codigo=="") {
			alert ("Debe introducir el codigo del cliente");
		} else {
			miPopup = window.open("ver_articulos.php","miwin","width=700,height=500,scrollbars=yes");
			miPopup.focus();
		}
	}
	
	function validarcliente(){
		var codigo=document.getElementById("codcliente").value;
		miPopup = window.open("comprobarcliente.php?codcliente="+codigo,"frame_datos","width=700,height=80,scrollbars=yes");
	}
	
	function validarArticulo(){
		var codigo=document.getElementById("codbarras").value;
		miPopup = window.open("comprobararticulo.php?codbarras="+codigo,"frame_datos","width=700,height=80,scrollbars=yes");
	}		
	
	function cancelar() {
		location.href="index.php";
	}
	
	function limpiarcaja() {
		document.getElementById("nombre").value="";
	}
	
	function actualizar_importe()
	{
		var precio=document.getElementById("precio").value;
		var cantidad=document.getElementById("cantidad").value;
		var descuento=document.getElementById("descuento").value;
		descuento=descuento/100;
		total=precio*cantidad;
		descuento=total*descuento;
		total=total-descuento;
		var original=parseFloat(total);
		var result=Math.round(original*100)/100 ;
		document.getElementById("importe").value=result;
	}
	
	function validar_cabecera()
	{
		var mensaje="";
		if (document.getElementById("nombre").value=="") mensaje+="  - Nombre\n";
		if (document.getElementById("fecha").value=="") mensaje+="  - Fecha\n";
		if (mensaje!="") {
			alert("Atencion, se han detectado las siguientes incorrecciones:\n\n"+mensaje);
		} else {
			document.getElementById("formulario").submit();
		}
	}	
	
	function validar() 
	{
		var mensaje="";
		var entero=0;
		var enteroo=0;
		
		if (document.getElementById("codbarras").value=="") mensaje="  - Codigo de barras\n";
		if (document.getElementById("descripcion").value=="") mensaje+="  - Descripcion\n";
		if (document.getElementById("precio").value=="") { 
			mensaje+="  - Falta el precio\n"; 
		} else {
			if (isNaN(document.getElementById("precio").value)==true) {
				mensaje+="  - El precio debe ser numerico\n";
			}
		}
		if (document.getElementById("cantidad").value==""){ 
			mensaje+="  - Falta la cantidad\n";
		} else {
			enteroo=parseInt(document.getElementById("cantidad").value);
			if (isNaN(enteroo)==true) {
				mensaje+="  - La cantidad debe ser numerica\n";
			} else {
				document.getElementById("cantidad").value=enteroo;
			}
		}
		if (document.getElementById("descuento").value=="") 
		{ 
			document.getElementById("descuento").value=0 
		} else {
			entero=parseInt(document.getElementById("descuento").value);
			if (isNaN(entero)==true) {
				mensaje+="  - El descuento debe ser numerico\n";
			} else {
				document.getElementById("descuento").value=entero;
			}
		} 
		if (document.getElementById("importe").value=="") mensaje+="  - Falta el importe\n";
		
		if (mensaje!="") {
			alert("Atencion, se han detectado las siguientes incorrecciones:\n\n"+mensaje);
		} else {
			document.getElementById("baseimponible").value=parseFloat(document.getElementById("baseimponible").value) + parseFloat(document.getElementById("importe").value);	
			cambio_iva();
			document.getElementById("formulario_lineas").submit();
			document.getElementById("codbarras").value="";
			document.getElementById("descripcion").value="";
			document.getElementById("precio").value="";
			document.getElementById("cantidad").value=1;
			document.getElementById("importe").value="";
			document.getElementById("descuento").value=0;						
		}
	}
	
	function inicio() {
		document.getElementById("codcliente").value="1";
		document.getElementById("nombre").value="Venta Mostrador";
		document.getElementById("codbarras").focus();
	}
	
	function cambio_iva() {
		var original=parseFloat(document.getElementById("baseimponible").value);
		var result=Math.round(original*100)/100 ;
		document.getElementById("baseimponible").value=result;
		
		document.getElementById("baseimpuestos").value=parseFloat(result * parseFloat(document.getElementById("iva").value / 100));
		var original1=parseFloat(document.getElementById("baseimpuestos").value);
		var result1=Math.round(original1*100)/100 ;
		document.getElementById("baseimpuestos").value=result1;
		var original2=parseFloat(result + result1);
		var result2=Math.round(original2*100)/100 ;
		document.getElementById("preciototal").value=result2;
	}	