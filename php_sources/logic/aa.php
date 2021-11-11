
<?php
header("Cache-Control: no-cache");
header("Pragma: no-cache"); 

include ("../../includes/connect.php");

$cadena_busqueda=$_GET["cadena_busqueda"];

if (!isset($cadena_busqueda)) { 
	$cadena_busqueda=""; } 
else { 
	$cadena_busqueda=str_replace("",",",$cadena_busqueda); 
}
/* index/cadena_busqueda.inc.php  */
if ($cadena_busqueda<>"") {
	$array_cadena_busqueda=split("~",$cadena_busqueda);
		$codarticulo=$array_cadena_busqueda[0];
		$codfamilia=$array_cadena_busqueda[1];
		$referencia=$array_cadena_busqueda[2];
		$descripcion=$array_cadena_busqueda[3];
		$impuesto=$array_cadena_busqueda[4];
		$codproveedor1=$array_cadena_busqueda[5];
		$codproveedor2=$array_cadena_busqueda[6];
		$descripcion_corta=$array_cadena_busqueda[7];
		$codubicacion=$array_cadena_busqueda[8];
		$stock=$array_cadena_busqueda[9];
		$stock_minimo=$array_cadena_busqueda[10];
		$aviso_minimo=$array_cadena_busqueda[11];
		$datos_producto=$array_cadena_busqueda[12];
		$fecha_alta=$array_cadena_busqueda[13];
		$codembalaje=$array_cadena_busqueda[14];
		$unidades_caja=$array_cadena_busqueda[15];
		$precio_ticket=$array_cadena_busqueda[16];
		$modificar_ticket=$array_cadena_busqueda[17];
		$observaciones=$array_cadena_busqueda[18];
		$precio_compra=$array_cadena_busqueda[19];
		$precio_almacen=$array_cadena_busqueda[20];
		$precio_tienda=$array_cadena_busqueda[21];
		$precio_pvp=$array_cadena_busqueda[22];
		$precio_iva=$array_cadena_busqueda[23];
		$codigobarras=$array_cadena_busqueda[24];
		$imagen=$array_cadena_busqueda[25];
		$borrado=$array_cadena_busqueda[26];
		$iva=$array_cadena_busqueda[27];

} else {		$codarticulo="";
		$codfamilia="";
		$referencia="";
		$descripcion="";
		$impuesto="";
		$codproveedor1="";
		$codproveedor2="";
		$descripcion_corta="";
		$codubicacion="";
		$stock="";
		$stock_minimo="";
		$aviso_minimo="";
		$datos_producto="";
		$fecha_alta="";
		$codembalaje="";
		$unidades_caja="";
		$precio_ticket="";
		$modificar_ticket="";
		$observaciones="";
		$precio_compra="";
		$precio_almacen="";
		$precio_tienda="";
		$precio_pvp="";
		$precio_iva="";
		$codigobarras="";
		$imagen="";
		$borrado="";
		$iva="";
}
?>
<!-- index/header_script.inc.php  -->
	<head>
		<title>Articulos</title>
		<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
		<script language="javascript">
		
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
		
		function imprimir() {			var codarticulo=document.getElementById("codarticulo").value;
			var codfamilia=document.getElementById("codfamilia").value;
			var referencia=document.getElementById("referencia").value;
			var descripcion=document.getElementById("descripcion").value;
			var impuesto=document.getElementById("impuesto").value;
			var codproveedor1=document.getElementById("codproveedor1").value;
			var codproveedor2=document.getElementById("codproveedor2").value;
			var descripcion_corta=document.getElementById("descripcion_corta").value;
			var codubicacion=document.getElementById("codubicacion").value;
			var stock=document.getElementById("stock").value;
			var stock_minimo=document.getElementById("stock_minimo").value;
			var aviso_minimo=document.getElementById("aviso_minimo").value;
			var datos_producto=document.getElementById("datos_producto").value;
			var fecha_alta=document.getElementById("fecha_alta").value;
			var codembalaje=document.getElementById("codembalaje").value;
			var unidades_caja=document.getElementById("unidades_caja").value;
			var precio_ticket=document.getElementById("precio_ticket").value;
			var modificar_ticket=document.getElementById("modificar_ticket").value;
			var observaciones=document.getElementById("observaciones").value;
			var precio_compra=document.getElementById("precio_compra").value;
			var precio_almacen=document.getElementById("precio_almacen").value;
			var precio_tienda=document.getElementById("precio_tienda").value;
			var precio_pvp=document.getElementById("precio_pvp").value;
			var precio_iva=document.getElementById("precio_iva").value;
			var codigobarras=document.getElementById("codigobarras").value;
			var imagen=document.getElementById("imagen").value;
			var borrado=document.getElementById("borrado").value;
			var iva=document.getElementById("iva").value;

			window.open("../fpdf/articulos.php?codarticulo="+codarticulo+"&referencia="+referencia+"&descripcion="+descripcion+"&proveedores="+proveedores+"&familia="+familia+"&ubicacion="+ubicacion);
		}
		
		function limpiar_busqueda() {			document.getElementById("codarticulo").value="";
			document.getElementById("codfamilia").value="";
			document.getElementById("referencia").value="";
			document.getElementById("descripcion").value="";
			document.getElementById("impuesto").value="";
			document.getElementById("codproveedor1").value="";
			document.getElementById("codproveedor2").value="";
			document.getElementById("descripcion_corta").value="";
			document.getElementById("codubicacion").value="";
			document.getElementById("stock").value="";
			document.getElementById("stock_minimo").value="";
			document.getElementById("aviso_minimo").value="";
			document.getElementById("datos_producto").value="";
			document.getElementById("fecha_alta").value="";
			document.getElementById("codembalaje").value="";
			document.getElementById("unidades_caja").value="";
			document.getElementById("precio_ticket").value="";
			document.getElementById("modificar_ticket").value="";
			document.getElementById("observaciones").value="";
			document.getElementById("precio_compra").value="";
			document.getElementById("precio_almacen").value="";
			document.getElementById("precio_tienda").value="";
			document.getElementById("precio_pvp").value="";
			document.getElementById("precio_iva").value="";
			document.getElementById("codigobarras").value="";
			document.getElementById("imagen").value="";
			document.getElementById("borrado").value="";
			document.getElementById("iva").value="";
			document.form_busqueda.cbocodarticulo.options[0].selected = true;
			document.form_busqueda.cbocodfamilia.options[0].selected = true;
			document.form_busqueda.cboreferencia.options[0].selected = true;
			document.form_busqueda.cbodescripcion.options[0].selected = true;
			document.form_busqueda.cboimpuesto.options[0].selected = true;
			document.form_busqueda.cbocodproveedor1.options[0].selected = true;
			document.form_busqueda.cbocodproveedor2.options[0].selected = true;
			document.form_busqueda.cbodescripcion_corta.options[0].selected = true;
			document.form_busqueda.cbocodubicacion.options[0].selected = true;
			document.form_busqueda.cbostock.options[0].selected = true;
			document.form_busqueda.cbostock_minimo.options[0].selected = true;
			document.form_busqueda.cboaviso_minimo.options[0].selected = true;
			document.form_busqueda.cbodatos_producto.options[0].selected = true;
			document.form_busqueda.cbofecha_alta.options[0].selected = true;
			document.form_busqueda.cbocodembalaje.options[0].selected = true;
			document.form_busqueda.cbounidades_caja.options[0].selected = true;
			document.form_busqueda.cboprecio_ticket.options[0].selected = true;
			document.form_busqueda.cbomodificar_ticket.options[0].selected = true;
			document.form_busqueda.cboobservaciones.options[0].selected = true;
			document.form_busqueda.cboprecio_compra.options[0].selected = true;
			document.form_busqueda.cboprecio_almacen.options[0].selected = true;
			document.form_busqueda.cboprecio_tienda.options[0].selected = true;
			document.form_busqueda.cboprecio_pvp.options[0].selected = true;
			document.form_busqueda.cboprecio_iva.options[0].selected = true;
			document.form_busqueda.cbocodigobarras.options[0].selected = true;
			document.form_busqueda.cboimagen.options[0].selected = true;
			document.form_busqueda.cboborrado.options[0].selected = true;
			document.form_busqueda.cboiva.options[0].selected = true;
			
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
		
		function hacer_cadena_busqueda() {			var codarticulo=document.getElementById("codarticulo").value;
			var codfamilia=document.getElementById("codfamilia").value;
			var referencia=document.getElementById("referencia").value;
			var descripcion=document.getElementById("descripcion").value;
			var impuesto=document.getElementById("impuesto").value;
			var codproveedor1=document.getElementById("codproveedor1").value;
			var codproveedor2=document.getElementById("codproveedor2").value;
			var descripcion_corta=document.getElementById("descripcion_corta").value;
			var codubicacion=document.getElementById("codubicacion").value;
			var stock=document.getElementById("stock").value;
			var stock_minimo=document.getElementById("stock_minimo").value;
			var aviso_minimo=document.getElementById("aviso_minimo").value;
			var datos_producto=document.getElementById("datos_producto").value;
			var fecha_alta=document.getElementById("fecha_alta").value;
			var codembalaje=document.getElementById("codembalaje").value;
			var unidades_caja=document.getElementById("unidades_caja").value;
			var precio_ticket=document.getElementById("precio_ticket").value;
			var modificar_ticket=document.getElementById("modificar_ticket").value;
			var observaciones=document.getElementById("observaciones").value;
			var precio_compra=document.getElementById("precio_compra").value;
			var precio_almacen=document.getElementById("precio_almacen").value;
			var precio_tienda=document.getElementById("precio_tienda").value;
			var precio_pvp=document.getElementById("precio_pvp").value;
			var precio_iva=document.getElementById("precio_iva").value;
			var codigobarras=document.getElementById("codigobarras").value;
			var imagen=document.getElementById("imagen").value;
			var borrado=document.getElementById("borrado").value;
			var iva=document.getElementById("iva").value;

			var cadena="";
			cadena="~"+codarticulo+"~"+codfamilia+"~"+referencia+"~"+descripcion+"~"+impuesto+"~"+codproveedor1+"~"+codproveedor2+"~"+descripcion_corta+"~"+codubicacion+"~"+stock+"~"+stock_minimo+"~"+aviso_minimo+"~"+datos_producto+"~"+fecha_alta+"~"+codembalaje+"~"+unidades_caja+"~"+precio_ticket+"~"+modificar_ticket+"~"+observaciones+"~"+precio_compra+"~"+precio_almacen+"~"+precio_tienda+"~"+precio_pvp+"~"+precio_iva+"~"+codigobarras+"~"+imagen+"~"+borrado+"~"+iva+"~";
			return cadena;
			}
		
		function ventanaArticulos(){
			miPopup = window.open("ventana_articulos.php","miwin","width=700,height=500,scrollbars=yes");
			miPopup.focus();
		}
		</script>
	</head>

<html>
	<body onLoad="inicio()">
		<div id="pagina">
			<div id="zonaContenido">
				<div align="center">
				<div id="tituloForm" class="header">Buscar articulos </div>
				<div id="frmBusqueda">
				<form id="form_busqueda" name="form_busqueda" method="post" action="rejilla.php" target="frame_rejilla">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>					
						<tr>
							<td width="16%">codarticulo</td>
							<td width="68%"><input id="codarticulo" type="text" class="cajaPequena" NAME="codarticulo" maxlength="15" value="<? echo $codarticulo;?>" readonly="yes"> <img src="../img/ver.png" width="16" height="16" onClick="ventanaArticulos()" onMouseOver="style.cursor=cursor" title="Buscar articulos"></td>
							<td width="5%">&nbsp;</td>
							<td width="5%">&nbsp;</td>
						<td width="6%" align="right"></td>
					</tr>
						<tr>
							<td width="16%">codfamilia</td>
							<td width="68%"><input id="codfamilia" type="text" class="cajaPequena" NAME="codfamilia" maxlength="15" value="<? echo $codfamilia;?>" readonly="yes"> <img src="../img/ver.png" width="16" height="16" onClick="ventanaArticulos()" onMouseOver="style.cursor=cursor" title="Buscar articulos"></td>
							<td width="5%">&nbsp;</td>
							<td width="5%">&nbsp;</td>
						<td width="6%" align="right"></td>
					</tr>
						<tr>
							<td width="16%">referencia</td>
							<td width="68%"><input id="referencia" type="text" class="cajaPequena" NAME="referencia" maxlength="15" value="<? echo $referencia;?>" readonly="yes"> <img src="../img/ver.png" width="16" height="16" onClick="ventanaArticulos()" onMouseOver="style.cursor=cursor" title="Buscar articulos"></td>
							<td width="5%">&nbsp;</td>
							<td width="5%">&nbsp;</td>
						<td width="6%" align="right"></td>
					</tr>
						<tr>
							<td width="16%">descripcion</td>
							<td width="68%"><input id="descripcion" type="text" class="cajaPequena" NAME="descripcion" maxlength="15" value="<? echo $descripcion;?>" readonly="yes"> <img src="../img/ver.png" width="16" height="16" onClick="ventanaArticulos()" onMouseOver="style.cursor=cursor" title="Buscar articulos"></td>
							<td width="5%">&nbsp;</td>
							<td width="5%">&nbsp;</td>
						<td width="6%" align="right"></td>
					</tr>
						<tr>
							<td width="16%">impuesto</td>
							<td width="68%"><input id="impuesto" type="text" class="cajaPequena" NAME="impuesto" maxlength="15" value="<? echo $impuesto;?>" readonly="yes"> <img src="../img/ver.png" width="16" height="16" onClick="ventanaArticulos()" onMouseOver="style.cursor=cursor" title="Buscar articulos"></td>
							<td width="5%">&nbsp;</td>
							<td width="5%">&nbsp;</td>
						<td width="6%" align="right"></td>
					</tr>
						<tr>
							<td width="16%">codproveedor1</td>
							<td width="68%"><input id="codproveedor1" type="text" class="cajaPequena" NAME="codproveedor1" maxlength="15" value="<? echo $codproveedor1;?>" readonly="yes"> <img src="../img/ver.png" width="16" height="16" onClick="ventanaArticulos()" onMouseOver="style.cursor=cursor" title="Buscar articulos"></td>
							<td width="5%">&nbsp;</td>
							<td width="5%">&nbsp;</td>
						<td width="6%" align="right"></td>
					</tr>
						<tr>
							<td width="16%">codproveedor2</td>
							<td width="68%"><input id="codproveedor2" type="text" class="cajaPequena" NAME="codproveedor2" maxlength="15" value="<? echo $codproveedor2;?>" readonly="yes"> <img src="../img/ver.png" width="16" height="16" onClick="ventanaArticulos()" onMouseOver="style.cursor=cursor" title="Buscar articulos"></td>
							<td width="5%">&nbsp;</td>
							<td width="5%">&nbsp;</td>
						<td width="6%" align="right"></td>
					</tr>
						<tr>
							<td width="16%">descripcion_corta</td>
							<td width="68%"><input id="descripcion_corta" type="text" class="cajaPequena" NAME="descripcion_corta" maxlength="15" value="<? echo $descripcion_corta;?>" readonly="yes"> <img src="../img/ver.png" width="16" height="16" onClick="ventanaArticulos()" onMouseOver="style.cursor=cursor" title="Buscar articulos"></td>
							<td width="5%">&nbsp;</td>
							<td width="5%">&nbsp;</td>
						<td width="6%" align="right"></td>
					</tr>
						<tr>
							<td width="16%">codubicacion</td>
							<td width="68%"><input id="codubicacion" type="text" class="cajaPequena" NAME="codubicacion" maxlength="15" value="<? echo $codubicacion;?>" readonly="yes"> <img src="../img/ver.png" width="16" height="16" onClick="ventanaArticulos()" onMouseOver="style.cursor=cursor" title="Buscar articulos"></td>
							<td width="5%">&nbsp;</td>
							<td width="5%">&nbsp;</td>
						<td width="6%" align="right"></td>
					</tr>
						<tr>
							<td width="16%">stock</td>
							<td width="68%"><input id="stock" type="text" class="cajaPequena" NAME="stock" maxlength="15" value="<? echo $stock;?>" readonly="yes"> <img src="../img/ver.png" width="16" height="16" onClick="ventanaArticulos()" onMouseOver="style.cursor=cursor" title="Buscar articulos"></td>
							<td width="5%">&nbsp;</td>
							<td width="5%">&nbsp;</td>
						<td width="6%" align="right"></td>
					</tr>
						<tr>
							<td width="16%">stock_minimo</td>
							<td width="68%"><input id="stock_minimo" type="text" class="cajaPequena" NAME="stock_minimo" maxlength="15" value="<? echo $stock_minimo;?>" readonly="yes"> <img src="../img/ver.png" width="16" height="16" onClick="ventanaArticulos()" onMouseOver="style.cursor=cursor" title="Buscar articulos"></td>
							<td width="5%">&nbsp;</td>
							<td width="5%">&nbsp;</td>
						<td width="6%" align="right"></td>
					</tr>
						<tr>
							<td width="16%">aviso_minimo</td>
							<td width="68%"><input id="aviso_minimo" type="text" class="cajaPequena" NAME="aviso_minimo" maxlength="15" value="<? echo $aviso_minimo;?>" readonly="yes"> <img src="../img/ver.png" width="16" height="16" onClick="ventanaArticulos()" onMouseOver="style.cursor=cursor" title="Buscar articulos"></td>
							<td width="5%">&nbsp;</td>
							<td width="5%">&nbsp;</td>
						<td width="6%" align="right"></td>
					</tr>
						<tr>
							<td width="16%">datos_producto</td>
							<td width="68%"><input id="datos_producto" type="text" class="cajaPequena" NAME="datos_producto" maxlength="15" value="<? echo $datos_producto;?>" readonly="yes"> <img src="../img/ver.png" width="16" height="16" onClick="ventanaArticulos()" onMouseOver="style.cursor=cursor" title="Buscar articulos"></td>
							<td width="5%">&nbsp;</td>
							<td width="5%">&nbsp;</td>
						<td width="6%" align="right"></td>
					</tr>
						<tr>
							<td width="16%">fecha_alta</td>
							<td width="68%"><input id="fecha_alta" type="text" class="cajaPequena" NAME="fecha_alta" maxlength="15" value="<? echo $fecha_alta;?>" readonly="yes"> <img src="../img/ver.png" width="16" height="16" onClick="ventanaArticulos()" onMouseOver="style.cursor=cursor" title="Buscar articulos"></td>
							<td width="5%">&nbsp;</td>
							<td width="5%">&nbsp;</td>
						<td width="6%" align="right"></td>
					</tr>
						<tr>
							<td width="16%">codembalaje</td>
							<td width="68%"><input id="codembalaje" type="text" class="cajaPequena" NAME="codembalaje" maxlength="15" value="<? echo $codembalaje;?>" readonly="yes"> <img src="../img/ver.png" width="16" height="16" onClick="ventanaArticulos()" onMouseOver="style.cursor=cursor" title="Buscar articulos"></td>
							<td width="5%">&nbsp;</td>
							<td width="5%">&nbsp;</td>
						<td width="6%" align="right"></td>
					</tr>
						<tr>
							<td width="16%">unidades_caja</td>
							<td width="68%"><input id="unidades_caja" type="text" class="cajaPequena" NAME="unidades_caja" maxlength="15" value="<? echo $unidades_caja;?>" readonly="yes"> <img src="../img/ver.png" width="16" height="16" onClick="ventanaArticulos()" onMouseOver="style.cursor=cursor" title="Buscar articulos"></td>
							<td width="5%">&nbsp;</td>
							<td width="5%">&nbsp;</td>
						<td width="6%" align="right"></td>
					</tr>
						<tr>
							<td width="16%">precio_ticket</td>
							<td width="68%"><input id="precio_ticket" type="text" class="cajaPequena" NAME="precio_ticket" maxlength="15" value="<? echo $precio_ticket;?>" readonly="yes"> <img src="../img/ver.png" width="16" height="16" onClick="ventanaArticulos()" onMouseOver="style.cursor=cursor" title="Buscar articulos"></td>
							<td width="5%">&nbsp;</td>
							<td width="5%">&nbsp;</td>
						<td width="6%" align="right"></td>
					</tr>
						<tr>
							<td width="16%">modificar_ticket</td>
							<td width="68%"><input id="modificar_ticket" type="text" class="cajaPequena" NAME="modificar_ticket" maxlength="15" value="<? echo $modificar_ticket;?>" readonly="yes"> <img src="../img/ver.png" width="16" height="16" onClick="ventanaArticulos()" onMouseOver="style.cursor=cursor" title="Buscar articulos"></td>
							<td width="5%">&nbsp;</td>
							<td width="5%">&nbsp;</td>
						<td width="6%" align="right"></td>
					</tr>
						<tr>
							<td width="16%">observaciones</td>
							<td width="68%"><input id="observaciones" type="text" class="cajaPequena" NAME="observaciones" maxlength="15" value="<? echo $observaciones;?>" readonly="yes"> <img src="../img/ver.png" width="16" height="16" onClick="ventanaArticulos()" onMouseOver="style.cursor=cursor" title="Buscar articulos"></td>
							<td width="5%">&nbsp;</td>
							<td width="5%">&nbsp;</td>
						<td width="6%" align="right"></td>
					</tr>
						<tr>
							<td width="16%">precio_compra</td>
							<td width="68%"><input id="precio_compra" type="text" class="cajaPequena" NAME="precio_compra" maxlength="15" value="<? echo $precio_compra;?>" readonly="yes"> <img src="../img/ver.png" width="16" height="16" onClick="ventanaArticulos()" onMouseOver="style.cursor=cursor" title="Buscar articulos"></td>
							<td width="5%">&nbsp;</td>
							<td width="5%">&nbsp;</td>
						<td width="6%" align="right"></td>
					</tr>
						<tr>
							<td width="16%">precio_almacen</td>
							<td width="68%"><input id="precio_almacen" type="text" class="cajaPequena" NAME="precio_almacen" maxlength="15" value="<? echo $precio_almacen;?>" readonly="yes"> <img src="../img/ver.png" width="16" height="16" onClick="ventanaArticulos()" onMouseOver="style.cursor=cursor" title="Buscar articulos"></td>
							<td width="5%">&nbsp;</td>
							<td width="5%">&nbsp;</td>
						<td width="6%" align="right"></td>
					</tr>
						<tr>
							<td width="16%">precio_tienda</td>
							<td width="68%"><input id="precio_tienda" type="text" class="cajaPequena" NAME="precio_tienda" maxlength="15" value="<? echo $precio_tienda;?>" readonly="yes"> <img src="../img/ver.png" width="16" height="16" onClick="ventanaArticulos()" onMouseOver="style.cursor=cursor" title="Buscar articulos"></td>
							<td width="5%">&nbsp;</td>
							<td width="5%">&nbsp;</td>
						<td width="6%" align="right"></td>
					</tr>
						<tr>
							<td width="16%">precio_pvp</td>
							<td width="68%"><input id="precio_pvp" type="text" class="cajaPequena" NAME="precio_pvp" maxlength="15" value="<? echo $precio_pvp;?>" readonly="yes"> <img src="../img/ver.png" width="16" height="16" onClick="ventanaArticulos()" onMouseOver="style.cursor=cursor" title="Buscar articulos"></td>
							<td width="5%">&nbsp;</td>
							<td width="5%">&nbsp;</td>
						<td width="6%" align="right"></td>
					</tr>
						<tr>
							<td width="16%">precio_iva</td>
							<td width="68%"><input id="precio_iva" type="text" class="cajaPequena" NAME="precio_iva" maxlength="15" value="<? echo $precio_iva;?>" readonly="yes"> <img src="../img/ver.png" width="16" height="16" onClick="ventanaArticulos()" onMouseOver="style.cursor=cursor" title="Buscar articulos"></td>
							<td width="5%">&nbsp;</td>
							<td width="5%">&nbsp;</td>
						<td width="6%" align="right"></td>
					</tr>
						<tr>
							<td width="16%">codigobarras</td>
							<td width="68%"><input id="codigobarras" type="text" class="cajaPequena" NAME="codigobarras" maxlength="15" value="<? echo $codigobarras;?>" readonly="yes"> <img src="../img/ver.png" width="16" height="16" onClick="ventanaArticulos()" onMouseOver="style.cursor=cursor" title="Buscar articulos"></td>
							<td width="5%">&nbsp;</td>
							<td width="5%">&nbsp;</td>
						<td width="6%" align="right"></td>
					</tr>
						<tr>
							<td width="16%">imagen</td>
							<td width="68%"><input id="imagen" type="text" class="cajaPequena" NAME="imagen" maxlength="15" value="<? echo $imagen;?>" readonly="yes"> <img src="../img/ver.png" width="16" height="16" onClick="ventanaArticulos()" onMouseOver="style.cursor=cursor" title="Buscar articulos"></td>
							<td width="5%">&nbsp;</td>
							<td width="5%">&nbsp;</td>
						<td width="6%" align="right"></td>
					</tr>
						<tr>
							<td width="16%">borrado</td>
							<td width="68%"><input id="borrado" type="text" class="cajaPequena" NAME="borrado" maxlength="15" value="<? echo $borrado;?>" readonly="yes"> <img src="../img/ver.png" width="16" height="16" onClick="ventanaArticulos()" onMouseOver="style.cursor=cursor" title="Buscar articulos"></td>
							<td width="5%">&nbsp;</td>
							<td width="5%">&nbsp;</td>
						<td width="6%" align="right"></td>
					</tr>
						<tr>
							<td width="16%">iva</td>
							<td width="68%"><input id="iva" type="text" class="cajaPequena" NAME="iva" maxlength="15" value="<? echo $iva;?>" readonly="yes"> <img src="../img/ver.png" width="16" height="16" onClick="ventanaArticulos()" onMouseOver="style.cursor=cursor" title="Buscar articulos"></td>
							<td width="5%">&nbsp;</td>
							<td width="5%">&nbsp;</td>
						<td width="6%" align="right"></td>
					</tr>

					</table>

			  </div>
					<div id="botonBusqueda"><img src="../img/botonbuscar.jpg" width="69" height="22" border="1" onClick="buscar()" onMouseOver="style.cursor=cursor">
			 	  <img src="../img/botonlimpiar.jpg" width="69" height="22" border="1" onClick="limpiar_busqueda()" onMouseOver="style.cursor=cursor">
					 <img src="../img/botonnuevoarticulo.jpg" width="111" height="22" border="1" onClick="nuevo_articulo()" onMouseOver="style.cursor=cursor">
					<img src="../img/botonimprimir.jpg" width="79" height="22" border="1" onClick="imprimir()" onMouseOver="style.cursor=cursor">
					</div>				

			  <div id="lineaResultado">
			  <table class="fuente8" width="80%" cellspacing=0 cellpadding=3 border=0>
			  	<tr>
				<td width="50%" align="left">N de articulos encontrados <input id="filas" type="text" class="cajaPequena" NAME="filas" maxlength="5" readonly></td>
				<td width="50%" align="right">Mostrados <select name="paginas" id="paginas" onChange="paginar()">
		          </select></td>
			  </table>
				</div>

				<div id="cabeceraResultado" class="header">
					relacion de ARTICULOS 
				</div>

				<div id="frmResultado">
				<table class="fuente8" width="100%" cellspacing=0 cellpadding=3 border=0 ID="Table1">
				<tr class="cabeceraTabla">
							<td width="4%">codarticulo</td>
							<td width="4%">codfamilia</td>
							<td width="4%">referencia</td>
							<td width="4%">descripcion</td>
							<td width="4%">impuesto</td>
							<td width="4%">codproveedor1</td>
							<td width="4%">codproveedor2</td>
							<td width="4%">descripcion_corta</td>
							<td width="4%">codubicacion</td>
							<td width="4%">stock</td>
							<td width="4%">stock_minimo</td>
							<td width="4%">aviso_minimo</td>
							<td width="4%">datos_producto</td>
							<td width="4%">fecha_alta</td>
							<td width="4%">codembalaje</td>
							<td width="4%">unidades_caja</td>
							<td width="4%">precio_ticket</td>
							<td width="4%">modificar_ticket</td>
							<td width="4%">observaciones</td>
							<td width="4%">precio_compra</td>
							<td width="4%">precio_almacen</td>
							<td width="4%">precio_tienda</td>
							<td width="4%">precio_pvp</td>
							<td width="4%">precio_iva</td>
							<td width="4%">codigobarras</td>
							<td width="4%">imagen</td>
							<td width="4%">borrado</td>
							<td width="4%">iva</td>

							<td width="5%">&nbsp;</td>
							<td width="5%">&nbsp;</td>
							<td width="5%">&nbsp;</td>
				</tr>
			</table>

				</div>
				<input type="hidden" id="iniciopagina" name="iniciopagina">
				<input type="hidden" id="cadena_busqueda" name="cadena_busqueda">
			</form>
				<div id="lineaResultado">
					<iframe width="100%" height="250" id="frame_rejilla" name="frame_rejilla" frameborder="0">
						<ilayer width="100%" height="250" id="frame_rejilla" name="frame_rejilla"></ilayer>
					</iframe>
				</div>
			</div>
		  </div>			
		</div>
	</body>
</html>
