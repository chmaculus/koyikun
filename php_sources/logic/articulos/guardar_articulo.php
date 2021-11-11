<?
header('Cache-Control: no-cache');
header('Pragma: no-cache'); 

include ("../includes/cabecera_utf-8.inc.php"); 


include ("../includes/connect.php"); 
include ("../funciones/fechas.php"); 

include("../barcode/barcode.php");

$accion=$_POST["accion"];
if (!isset($accion)) { $accion=$_GET["accion"]; }

$referencia=$_POST["Areferencia"];

if ($fecha<>"") { 
	$fecha=explota($fecha); 
} else { 
	$fecha="0000-00-00"; }


	if ($accion=="alta") {

		$query='insert into articulos set
		codigo_interno="'.$_POST["codigo_interno"].'",
		marca="'.$_POST["marca"].'",
		descripcion="'.$_POST["descripcion"].'",
		color="'.$_POST["color"].'",
		contenido="'.$_POST["contenido"].'",
		presentacion="'.$_POST["presentacion"].'",
		codigo_barra="'.$_POST["codigo_barra"].'",
		fecha="'.$_POST["fecha"].'",
		hora="'.$_POST["hora"].'",
		clasificacion="'.$_POST["clasificacion"].'",
		subclasificacion="'.$_POST["subclasificacion"].'",
		discontinuo="'.$_POST["discontinuo"].'",
		lanzamiento="'.$_POST["lanzamiento"].'",
		observaciones="'.$_POST["observaciones"].'",
		';
		
		echo $query."<br>";

		$rs_operacion=mysql_query($query);
		if(mysql_error()){echo mysql_error();}
		
		$id_articulo=mysql_insert_id();
		$array_articulos=mysql_fetch_array(mysql_query('select * from articulos where id="'.$id_articulo.'"'));
		
		if ($rs_operacion) { 
			$mensaje="El articulo ha sido dado de alta correctamente"; 
		}
		$cabecera1="Inicio >> Articulos &gt;&gt; Nuevo Articulo ";
		$cabecera2="INSERTAR ARTICULO ";
}// en if alta

if ($accion=="modificar") {
	$codarticulo=$_POST["id"];
	$cadena=""; 



	$query='update articulos set
	codigo_interno="'.$_POST["codigo_interno"].'",
	marca="'.$_POST["marca"].'",
	descripcion="'.$_POST["descripcion"].'",
	contenido="'.$_POST["contenido"].'",
	presentacion="'.$_POST["presentacion"].'",
	codigo_barra="'.$_POST["codigo_barra"].'",
	fecha="'.$_POST["fecha"].'",
	hora="'.$_POST["hora"].'",
	clasificacion="'.$_POST["clasificacion"].'",
	subclasificacion="'.$_POST["subclasificacion"].'",
	id_web="'.$_POST["id_web"].'",
	publicar_web="'.$_POST["publicar_web"].'",
	discontinuo="'.$_POST["discontinuo"].'",
	lanzamiento="'.$_POST["lanzamiento"].'",
	codigo_af="'.$_POST["codigo_af"].'",
	marca_corta="'.$_POST["marca_corta"].'",
	color="'.$_POST["color"].'",
	observaciones="'.$_POST["observaciones"].'",
	prom_asoc="'.$_POST["prom_asoc"].'"
	where id="'.$id_articulos.'"
	';
	
	echo "query: ".$query."<br>";
	
	$rs_query=mysql_query($query);
	if(mysql_error()){echo mysql_error();}

	if ($rs_query) { 
		$mensaje="Los datos del articulo han sido modificados correctamente"; 
	}

	$cabecera1="Inicio >> Articulos &gt;&gt; Modificar Articulo ";
	$cabecera2="MODIFICAR ARTICULO ";
	/* select imagen codigo barras */
	
}

if ($accion=="baja") {
	$codarticulo=$_GET["codarticulo"];
	$query="UPDATE articulos SET borrado=1 WHERE codarticulo='$codarticulo'";
	$rs_query=mysql_query($query);
	if(mysql_error()){echo mysql_error();}

	if ($rs_query) { $mensaje="El articulo ha sido eliminado correctamente"; }
	$cabecera1="Inicio >> Articulos &gt;&gt; Eliminar Articulo ";
	$cabecera2="ELIMINAR ARTICULO ";
	$query_mostrar="SELECT * FROM articulos WHERE id='$id'";
	$rs_mostrar=mysql_query($query_mostrar);

	if(mysql_error()){echo mysql_error();}
	/* array articulo*/	
	$codarticulo=mysql_result($rs_mostrar,0,"codarticulo");
	$codigobarras=mysql_result($rs_mostrar,0,"codigobarras");
}

?>

<html>
<head>
	<title>Principal</title>
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
	function aceptar() {
		location.href="index.php";
	}
</script>

</head>
<body>
	<div id="pagina">
		<div id="zonaContenido">
			<div align="center">
				<div id="tituloForm" class="header"><?php echo $cabecera2?></div>
				<div id="frmBusqueda">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
						<tr>
							<td width="15%"></td>
							<td colspan="2" class="mensaje"><?php echo $mensaje;?></td>
						</tr>
						<tr>
							<td width="15%">C&oacute;digo</td>
							<td width="58%">
								<?php 
								echo $array_articulo["codigo_interno"];
								?>
							</td>
							<td width="27%" rowspan="11" align="center" valign="top">
								<img src="../fotos/<?php echo $foto_name;?>" width="160px" height="140px" border="1">
							</td>
						</tr>
						<tr>
							<td width="15%">Marca</td>
							<td width="58%"><?php echo $array_articulo["marca"];?></td>
						</tr>

						<tr>
							<td width="15%">Descripci&oacute;n</td>
							<td width="58%"><?php echo $array_articulo["descripcion"];?></td>
						</tr>

						<tr>
							<td width="15%">Color</td>
							<td width="58%"><?php echo $array_articulo["color"];?></td>
						</tr>

						<tr>
							<td width="15%">Clasificacion</td>
							<td width="58%"><?php echo $array_articulo["clasificacion"];?></td>
						</tr>

						<tr>
							<td width="15%">Sub Clasificacion</td>
							<td width="58%"><?php echo $array_articulo["subclasificacion"];?></td>
						</tr>

						<tr>
							<td width="15%">Contenido</td>
							<td width="58%"><?php echo $array_articulo["contenido"];?></td>
						</tr>

						<tr>
							<td width="15%">Presentacion</td>
							<td width="58%"><?php echo $array_articulo["presentacion"];?></td>
						</tr>

						<?php /* codigo proveedor*/ ?> 
						<tr>
							<td width="15%">Proveedor1</td>
							<td width="58%"><?php echo $array_articulo[""];?></td>
						</tr>

						<tr>
							<td>Stock</td>
							<td><?php echo $stock?> unidades</td>
						</tr>
						<tr>
							<td width="15%">Fecha de alta</td>
							<td colspan="2"><?php echo $fechalis?></td>
						</tr>

						<?php /* embalajes */?>
						<tr>
							<td width="15%">Embalaje</td>
							<td colspan="2"><?php echo $nombreembalaje?></td>
						</tr>
						<tr>
							<td>Unidades por caja</td>
							<td colspan="2"><?php echo $unidades_caja?> unidades</td>
						</tr>
						<tr>
							<td>Observaciones</td>
							<td colspan="2"><?php echo $observaciones?></td>
						</tr>
						<tr>
							<td>Codigo de barras</td>
							<td colspan="2">
								<?php echo "<img src='../barcode/barcode.php?encode=EAN-13&bdata=".$codigobarras."&height=50&scale=2&bgcolor=%23FFFFFF&color=%23000000&type=jpg'>"; ?></td>
							</tr>
						</table>
					</div>

					<div id="botonBusqueda">
						<img src="../img/botonaceptar.jpg" width="85" height="22" onClick="aceptar()" border="1" onMouseOver="style.cursor=cursor">
					</div>
				</div>
			</div>
		</div>
	</body>
	</html>
