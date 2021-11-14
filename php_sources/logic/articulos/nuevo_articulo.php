<?php 
header('Cache-Control: no-cache');
header('Pragma: no-cache'); 

include ("../conectar.php"); ?>
<html>
<head>
	<title>Principal</title>
	<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
	<link href="../calendario/calendar-blue.css" rel="stylesheet" type="text/css">
	<script type="text/JavaScript" language="javascript" src="../calendario/calendar.js"></script>
	<script type="text/JavaScript" language="javascript" src="../calendario/lang/calendar-sp.js"></script>
	<script type="text/JavaScript" language="javascript" src="../calendario/calendar-setup.js"></script>
	<script type="text/javascript" src="../funciones/validar.js"></script>
	<script language="javascript" src="nuevo_articulo.js"></script>
</head>
<body>

	<div id="pagina">
		<div id="zonaContenido">
			<div align="center">
				<div id="tituloForm" class="header">INSERTAR ARTICULO </div>
				<div id="frmBusqueda">
					<form id="formulario" name="formulario" method="post" action="guardar_articulo.php" enctype="multipart/form-data">
						<input id="accion" name="accion" value="alta" type="hidden">
						<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
							<tr>
								<td width="15%">Referencia</td>
								<td width="30%"><input name="Areferencia" id="referencia" value="" maxlength="20" class="cajaGrande" type="text"></td>
								<td width="55%" rowspan="15" align="left" valign="top"><ul id="lista-errores"></ul></td>
							</tr>

							<tr><?php include("familias.inc.php");?></tr>

							<tr>
								<td width="17%">Descripci&oacute;n</td>
								<td><textarea name="Adescripcion" cols="41" rows="2" id="descripcion" class="areaTexto"></textarea></td>
							</tr>

							<tr><?php include("./includes/impuestos.inc.php");?></tr>
							<tr>
								<td>Proveedor 1</td>
								<td><?php include("./includes/proveedores.inc.php");?></td>
							</tr>
							<tr>
								<td>Proveedor 2</td>
								<td><?php include("./includes/proveedores.inc.php");?></td>
							</tr>

							<tr>
								<td>Descripci&oacute;n corta</td>
								<td><input NAME="Adescripcion_corta" id="descripcion_corta" type="text" class="cajaGrande"  maxlength="30"></td>
							</tr>

							<tr>
								<td>Ubicaci&oacute;n</td>
								<td><?php include("./includes/ubicaciones.php");?></td>
							</tr>

							<tr>
								<td>Stock</td>
								<td><input NAME="nstock" type="text" class="cajaPequena" id="stock" size="10" maxlength="10"> unidades</td>
							</tr>

							<tr>
								<td>Stock m&iacute;nimo</td>
								<td><input NAME="nstock_minimo" type="text" class="cajaPequena" id="stock_minimo" size="8" maxlength="8"> unidades</td>
							</tr>

							<tr>
								<td>Aviso m&iacute;nimo</td>
								<td><select name="aaviso_minimo" id="aviso_minimo" class="comboPequeno">
									<option value="0" selected="selected">No</option>
									<option value="1">Si</option>
								</select></td>
							</tr>

							<tr>
								<td width="17%">Datos del producto</td>
								<td><textarea name="adatos" cols="41" rows="2" id="datos" class="areaTexto"></textarea></td>
							</tr>

							<tr>
								<td>Fecha de alta</td>
								<td><input NAME="fecha" type="text" class="cajaPequena" id="fecha" size="10" maxlength="10" readonly> 
									<img src="../img/calendario.png" name="Image1" id="Image1" 
									width="16" height="16" border="0" id="Image1" onMouseOver="this.style.cursor='pointer'">
									<script type="text/javascript">
										Calendar.setup({
											inputField : "fecha",
											ifFormat   : "%d/%m/%Y",
											button     : "Image1" });
										</script>
									</td>
								</tr>

								<tr>
									<td>Embalaje</td>
									<td><?php include("./includes/embalajes.inc.php");?></td>
								</tr>
								<tr>
									<td>Unidades por caja</td>
									<td><input NAME="nunidades_caja" type="text" class="cajaPequena" id="unidades_caja" size="10" maxlength="10"> unidades</td>
								</tr>
								<tr>
									<td>Preguntar precio ticket</td>
									<td><select name="aprecio_ticket" id="precio_ticket" class="comboPequeno">
										<option value="0" selected="selected">No</option>
										<option value="1">Si</option>
									</select></td>
								</tr>
								<tr>
									<td>Modificar descrip. en ticket</td>
									<td><select name="amodif_descrip" id="modif_descrip" class="comboPequeno">
										<option value="0" selected="selected">No</option>
										<option value="1">Si</option>
									</select></td>
								</tr>
								<tr>
									<td width="17%">Observaciones</td>
									<td><textarea name="aobservaciones" cols="41" rows="2" id="observaciones" class="areaTexto"></textarea></td>
								</tr>
								<tr>
									<td>Precio de compra</td>
									<td><input NAME="qprecio_compra" type="text" class="cajaPequena" id="precio_compra" size="10" maxlength="10"> &#8364;</td>
								</tr>
								<tr>
									<td>Precio de almac&eacute;n</td>
									<td><input NAME="qprecio_almacen" type="text" class="cajaPequena" id="precio_almacen" size="10" maxlength="10"> &#8364;</td>
								</tr>
								<tr>
									<td>Precio de tienda</td>
									<td><input NAME="qprecio_tienda" type="text" class="cajaPequena" id="precio_tienda" size="10" maxlength="10"> &#8364;</td>
								</tr>
								<tr>
							<td>Precio con iva</td>
							<td><input NAME="qprecio_iva" type="text" class="cajaPequena" id="precio_iva" size="10" maxlength="10"> &#8364;</td>
						</tr>
						<tr>
							<td>Imagen [Formato jpg] [200x200]</td>
							<td><input type="file" name="foto" id="foto" class="cajaMedia" accept="image/jpg" /></td>
						</tr>
					</table>
				</div>
				<div id="botonBusqueda">
					<img src="../img/botonaceptar.jpg" width="85" height="22" onClick="validar(formulario,true)" border="1" onMouseOver="style.cursor=cursor">
					<img src="../img/botonlimpiar.jpg" width="69" height="22" onClick="limpiar()" border="1" onMouseOver="style.cursor=cursor">
					<img src="../img/botoncancelar.jpg" width="85" height="22" onClick="cancelar()" border="1" onMouseOver="style.cursor=cursor">
					<input type="hidden" name="id" id="id" value="">					
				</div>
			</form>	
		</div>			
	</div>
</div>
</body>
</html>
