<?php 
header('Cache-Control: no-cache');
header('Pragma: no-cache'); 
include ("../includes/cabecera_utf-8.inc.php"); 

include ("../includes/connect.php");
include ("../funciones/fechas.php"); 
include("../barcode/barcode.php");

$id_articulo=$_GET["id_articulo"];


$query="SELECT * FROM koyikun.articulos WHERE id='$id_articulo'";
echo "q: ".$query."<br>";
echo "a:".$array_articulos["codigo_interno"]."<br>";
$res=mysql_query($query);
$array_articulos=mysql_fetch_array($res);


?>
<html>
<head>
	<title>Principal</title>
	<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
	<script type="text/javascript" src="../funciones/validar.js"></script>
	<script language="javascript" src="./modificar_articulo.js"></script>

	<!-- funciones select articulos -->
	<script language="javascript" src="js/jquery-1.3.min.js"></script>
	<script language="javascript" src="./select/funciones.js"></script>
	<!-- fin funciones select articulos -->

</head>
<body>
	<div id="pagina">
		<div id="zonaContenido">
			<div align="center">
				<div id="tituloForm" class="header">MODIFICAR ARTICULO </div>
				<div id="frmBusqueda">
					
					<form id="formulario" name="formulario" method="post" action="guardar_articulo.php" enctype="multipart/form-data">
						<input id="accion" name="accion" value="modificar" type="hidden">
						<input id="id" name="id" value="<?php echo $id_articulo;?>" type="hidden">
						<input id="codarticulo" name="codarticulo" value="<?php echo $codarticulo?>" type="hidden">

						<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
							<tr>


								<td width="20%">Codigo Interno</td>
								<td colspan="2">
									<input name="codigo_interno" id="codigo_interno" 
									value="<?php if($array_articulos["codigo_interno"]){echo $array_articulos["codigo_interno"];}?>" 
									maxlength="20" class="cajaPequena" type="text">
								</td>
								<td width="4%" rowspan="15" align="left" valign="top">
									<ul id="lista-errores"></ul></td>
								</tr>

								
								<tr>
									<td width="11%">Marca</td>
									<td colspan="2">
										<select name="marca" id="marca" onChange="fun_marca();">
											<?php
											$marca=$array_articulos["marca"]; 
											include("./select/select_marca.inc.php");?>
										</select>
									</td>
								</tr>

								<tr>
									<td width="11%">Clasificacion</td>
									<td colspan="2">
										<select name="clasificacion" id="clasificacion" onchange="fun_clasificacion();">
											<?php 
											$clasificacion=$array_articulos["clasificacion"]; 
											include("./select/select_clasificacion.inc.php");?>
										</select>
									</td>
								</tr>

								<tr>
									<td width="11%">Sub Clasificacion</td>
									<td colspan="2">
										<select name="subclasificacion" id="subclasificacion">
											<?php
											$subclasificacion=$array_articulos["subclasificacion"]; 
											include("./select/select_subclasificacion.inc.php");?>
										</select>
									</td>
								</tr>

								<tr>
									<td width="11%">Descripci&oacute;n</td>
									<td colspan="2">
										<input name="descripcion" id="descripcion" 
										value="<?php if($array_articulos["descripcion"]){echo $array_articulos["descripcion"];}?>" 
										class="cajaGrande" type="text">
									</td>
								</tr>

								<tr>
									<td width="11%">Color</td>
									<td colspan="2">
										<input name="color" id="color" 
										value="<?php if($array_articulos["color"]){echo $array_articulos["color"];}?>" 
										class="cajaGrande" type="text">
									</td>
								</tr>


								<tr>
									<td width="11%">Codigo barras</td>
									<td colspan="2">
										<input name="codigo_barra" id="codigo_barra" 
										value="<?php if($array_articulos["codigo_barra"]){echo $array_articulos["codigo_barra"];}?>" 
										class="cajaGrande" type="text">
									</td>
								</tr>


								<tr>
									<td width="11%">Contenido</td>
									<td colspan="2">
										<input name="contenido" id="contenido" 
										value="<?php if($array_articulos["contenido"]){echo $array_articulos["contenido"];}?>" 
										class="cajaGrande" type="text">
									</td>
								</tr>


								<tr>
									<td width="11%">Presentacion</td>
									<td colspan="2">
										<input name="presentacion" id="presentacion" 
										value="<?php if($array_articulos["presentacion"]){echo $array_articulos["presentacion"];}?>" 
										class="cajaGrande" type="text">
									</td>
								</tr>


								<tr>
									<td>Proveedor 1</td>
									<td colspan="2"> include proveedor.php jejeje
									</td>
								</tr>


								<tr>
									<td>Embalaje</td>
									<td colspan="2">incluir tipos de embalaje</td>
								</tr>


								<tr>
									<td>Unidades por caja</td>
									<td colspan="2"><input NAME="nunidades_caja" type="text" class="cajaPequena" id="unidades_caja" size="10" maxlength="10" 
										value="<?php echo mysql_result($rs_query,0,"unidades_caja")?>"> unidades</td>
									</tr>

									<tr>
										<td width="11%">Observaciones</td>
										<td colspan="2"><textarea name="aobservaciones" cols="41" rows="2" id="observaciones" class="areaTexto">
											<?php echo mysql_result($rs_query,0,"observaciones")?></textarea></td>
										</tr>
										<tr>
											<td>Costo</td>
											<td colspan="2">Incluir costos</td>
										</tr>

										<tr>
											<td>Precio con iva</td>
											<td colspan="2"><input NAME="qprecio_iva" type="text" class="cajaPequena" id="precio_iva" size="10" maxlength="10" 
												value="<?php echo mysql_result($rs_query,0,"precio_iva")?>">
											</td>
										</tr>
										<tr>
											<td>Imagen [Formato jpg] [200x200]</td>
											<td width="55%"><input type="file" name="foto" id="foto" class="cajaMedia" accept="image/jpg" /></td>
											<td width="30%" align="center" valign="top"><img src="../fotos/<? echo mysql_result($rs_query,0,"imagen")?>" 
												width="160px" height="140px" border="1">
											</td>
										</tr>
										
										<tr>
											<td>Codigo de barras</td>
											<td colspan="2">
												<?php 
												if($array_articulos["codigo_barra"]>0){
													echo "<img src='../barcode/barcode.php?encode=EAN-13&bdata=".$array_articulos["codigo_barra"]."&height=50&scale=2&bgcolor=%23FFFFFF&color=%23333366&type=jpg'>";
													echo "<br>"; 
													echo $array_articulos["codigo_barra"];
												}
												?>
											</td>
										</tr>
									</table>
								</div>

								<div id="botonBusqueda">
									<input type="hidden" name="id" id="id" value="<?php echo $array_articulos["id"];?>">
									<img src="../img/botonaceptar.jpg" width="85" height="22" onClick="validar(formulario,true)" border="1" onMouseOver="style.cursor=cursor">
									<img src="../img/botonlimpiar.jpg" width="69" height="22" onClick="limpiar()" border="1" onMouseOver="style.cursor=cursor">
									<img src="../img/botoncancelar.jpg" width="85" height="22" onClick="cancelar()" 
									border="1" onMouseOver="style.cursor=cursor">					
								</div>

							</form>
						</div>				
					</div>
				</div>
			</body>
			</html>			
