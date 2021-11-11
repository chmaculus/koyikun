<?php 
include ("../conectar.php"); 

$fechahoy=date("Y-m-d");
$sel_fact="INSERT INTO facturastmp (codfactura,fecha) VALUE ('','$fechahoy')";
$rs_fact=mysql_query($sel_fact);
$codfacturatmp=mysql_insert_id();
?>
<html>
<head>
	<title>Principal</title>
	<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
	<link href="../calendario/calendar-blue.css" rel="stylesheet" type="text/css">
	<script type="text/JavaScript" language="javascript" src="../calendario/calendar.js"></script>
	<script type="text/JavaScript" language="javascript" src="../calendario/lang/calendar-sp.js"></script>
	<script type="text/JavaScript" language="javascript" src="../calendario/calendar-setup.js"></script>
	<script type="text/JavaScript" language="javascript" src="index.js"></script>
</head>
<body onload=inicio()>
	<div id="pagina">
		<div id="zonaContenido">
			<div align="center">
				<div id="tituloForm" class="header">NUEVA VENTA </div>
				<div id="frmBusqueda">
					<form id="formulario" name="formulario" method="post" action="guardar_factura.php">
						<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
							<tr>
								<td width="15%">C&oacute;digo Cliente </td>
								<td colspan="3"><input NAME="codcliente" type="text" class="cajaPequena" id="codcliente" size="6" maxlength="5" onClick="limpiarcaja()">
									<img src="../img/ver.png" width="16" height="16" onClick="abreVentana()" title="Buscar cliente" onMouseOver="style.cursor=cursor"> <img src="../img/cliente.png" width="16" height="16" onClick="validarcliente()" title="Validar cliente" onMouseOver="style.cursor=cursor"></td>					
								</tr>
								<tr>
									<td width="6%">Nombre</td>
									<td width="27%"><input NAME="nombre" type="text" class="cajaGrande" id="nombre" size="45" maxlength="45" readonly></td>
									<td width="3%"></td>
									<td width="64%"></td>
								</tr>
								<? $hoy=date("d/m/Y"); ?>
								<tr>
									<td width="6%">Fecha</td>
									<td width="27%"><input NAME="fecha" type="text" class="cajaPequena" id="fecha" size="10" maxlength="10" value="<? echo $hoy?>" readonly> <img src="../img/calendario.png" name="Image1" id="Image1" width="16" height="16" border="0" id="Image1" onMouseOver="this.style.cursor='pointer'">
										<script type="text/JavaScript" language="javascript" src="calendar.js"></script>
									</td>
									<td width="3%">IVA</td>
									<td width="64%"><input NAME="iva" type="text" class="cajaMinima" id="iva" size="5" maxlength="5" value="16" onChange="cambio_iva()"> %</td>
								</tr>
							</table>										
						</div>
						<input id="codfacturatmp" name="codfacturatmp" value="<? echo $codfacturatmp?>" type="hidden">
						<input id="baseimpuestos2" name="baseimpuestos" value="<? echo $baseimpuestos?>" type="hidden">
						<input id="baseimponible2" name="baseimponible" value="<? echo $baseimponible?>" type="hidden">
						<input id="preciototal2" name="preciototal" value="<? echo $preciototal?>" type="hidden">
						<input id="accion" name="accion" value="alta" type="hidden">
					</form>
					<br>
					<div id="frmBusqueda">
						<form id="formulario_lineas" name="formulario_lineas" method="post" action="frame_lineas.php" target="frame_lineas">
							<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
								<tr>
									<td width="11%">Codigo barras </td>
									<td colspan="10" valign="middle"><input NAME="codbarras" type="text" class="cajaMedia" id="codbarras" size="15" maxlength="15"> <img src="../img/calculadora.jpg" border="1" align="absmiddle" onClick="validarArticulo()" onMouseOver="style.cursor=cursor" title="Validar codigo de barras">     <img src="../img/ver.png" width="16" height="16" onClick="ventanaArticulos()" onMouseOver="style.cursor=cursor" title="Buscar articulo"></td>
								</tr>
								<tr>
									<td>Descripcion</td>
									<td width="19%"><input NAME="descripcion" type="text" class="cajaMedia" id="descripcion" size="30" maxlength="30" readonly></td>
									<td width="5%">Precio</td>
									<td width="11%"><input NAME="precio" type="text" class="cajaPequena2" id="precio" size="10" maxlength="10" onChange="actualizar_importe()"></td>
									<td width="5%">Cantidad</td>
									<td width="5%"><input NAME="cantidad" type="text" class="cajaMinima" id="cantidad" size="10" maxlength="10" value="1" onChange="actualizar_importe()"></td>
									<td width="4%">Dcto.</td>
									<td width="9%"><input NAME="descuento" type="text" class="cajaMinima" id="descuento" size="10" maxlength="10" onChange="actualizar_importe()"> %</td>
									<td width="5%">Importe</td>
									<td width="11%"><input NAME="importe" type="text" class="cajaPequena2" id="importe" size="10" maxlength="10" value="0" readonly></td>
									<td width="15%"><img src="../img/botonagregar.jpg" border="1" align="absbottom" onClick="validar()" onMouseOver="style.cursor=cursor"></td>
								</tr>
							</table>
						</div>
						<br>
						<div id="frmBusqueda">
							<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0 ID="Table1">
								<tr class="cabeceraTabla">
									<td width="5%">ITEM</td>
									<td width="12%">FAMILIA</td>
									<td width="14%">REFERENCIA</td>
									<td width="33%">DESCRIPCION</td>
									<td width="8%">CANTIDAD</td>
									<td width="8%">PRECIO</td>
									<td width="7%">DCTO %</td>
									<td width="8%">IMPORTE</td>
									<td width="3%">&nbsp;</td>
								</tr>
							</table>
							<div id="lineaResultado">
								<iframe width="100%" height="250" id="frame_lineas" name="frame_lineas" frameborder="0">
									<ilayer width="100%" height="250" id="frame_lineas" name="frame_lineas"></ilayer>
								</iframe>
							</div>					
						</div>
						<div id="frmBusqueda">
							<table width="25%" border=0 align="right" cellpadding=3 cellspacing=0 class="fuente8">
								<tr>
									<td width="27%" class="busqueda">Sub-total</td>
									<td width="73%" align="right">
									<div align="center">
										<input class="cajaTotales" name="baseimponible" type="text" id="baseimponible" size="12" value=0 align="right" readonly> 
									</div>
								</td>
							</tr>
							<tr>
								<td class="busqueda">IVA</td>
								<td align="right">
								<div align="center">
									<input class="cajaTotales" name="baseimpuestos" type="text" id="baseimpuestos" size="12" align="right" value=0 readonly> 
								</div>
							</td>
						</tr>
						<tr>
							<td class="busqueda">Precio Total</td>
							<td align="right">
							<div align="center">
								<input class="cajaTotales" name="preciototal" type="text" id="preciototal" size="12" align="right" value=0 readonly> 
							</div>
						</td>
					</tr>
				</table>
			</div>
			<div id="botonBusqueda">					
				<div align="center">
					<img src="../img/botonaceptar.jpg" width="85" height="22" onClick="validar_cabecera()" border="1" onMouseOver="style.cursor=cursor">
					<img src="../img/botoncancelar.jpg" width="85" height="22" onClick="cancelar()" border="1" onMouseOver="style.cursor=cursor">
					<input id="codfamilia" name="codfamilia" value="<? echo $codfamilia?>" type="hidden">
					<input id="codfacturatmp" name="codfacturatmp" value="<? echo $codfacturatmp?>" type="hidden">	
					<input id="preciototal2" name="preciototal" value="<? echo $preciototal?>" type="hidden">			    
				</div>
			</div>
			<iframe id="frame_datos" name="frame_datos" width="0" height="0" frameborder="0">
				<ilayer width="0" height="0" id="frame_datos" name="frame_datos"></ilayer>
			</iframe>
		</form>
	</div>
</div>
</div>
</body>
</html>
