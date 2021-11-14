<?php
include ("../includes/connect.php");

//$=$_POST[""];

$cadena_busqueda=$_POST["cadena_busqueda"];

$where="1=1";
$id=$_POST["id"];
$marca=$_POST["marca"];
$clasificacion=$_POST["clasificacion"];
$subclasificacion=$_POST["subclasificacion"];
$descripcion=$_POST["descripcion"];

/*
echo "a: ".$id."<br>";
echo "a: ".$marca."<br>";
echo "a: ".$clasificacion."<br>";
echo "a: ".$subclasificacion."<br>";
echo "a: ".$descripcion."<br>";
*/

if ($marca!="") { 
	$where.=" AND articulos.marca='$marca'"; 
}

if ($clasificacion!="") { 
	$where.=" AND articulos.clasificacion='$clasificacion'"; 
}

if ($subclasificacion!="") { 
	$where.=" AND articulos.subclasificacion='$subclasificacion'"; 
}

if ($descripcion!="") { 
	$where.=" AND articulos.descripcion like '%$descripcion%'"; 
}

if ($id!="") { 
	$where=" articulos.id = '$id'"; 
}



//34263
$consulta="SELECT * FROM koyikun.articulos where ".$where;

//echo "consulta11: ".$consulta;

$result=mysql_query($consulta);
if(mysql_error()){
	echo "error: ".mysql_error()."<br>";
}
$filas=mysql_num_rows($result);

//echo "rows1: ".mysql_num_rows($result)."<br>";

?>
<html>
<head>
	<title>Articulos</title>
	<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
	<meta content="text/html; charset=UTF-8" http-equiv="content-type" />
	<script language="javascript" src="listado.js"></script>
</head>

<body onload=inicio()>	
	
	<div id="pagina">
		<div id="zonaContenido">
			<div align="center">
				<table class="fuente8" width="87%" cellspacing=0 cellpadding=3 border=0 ID="Table1">
					<input type="hidden" name="numfilas" id="numfilas" value="<? echo $filas?>">
					
					
					<tr class="cabeceraTabla">
						<td width="4%">ID</td>
						<td width="5%">COD INT</td>
						<td width="19%">MARCA</td>
						<td width="30%">DESCRIPCION </td>
						<td width="11%">COLOR</td>
						<td width="11%">CONTENIDO</td>
						<td width="11%">PRESENTACION</td>
						<td width="11%">BARRAS</td>
						<td width="11%">CLASIFICACION</td>
						<td width="11%">SUB CLASIF</td>
						<td width="11%">PRECIO T.</td>
						<td width="5%">STOCK</td>
						<td width="5%">STOCK</td>
						<td width="5%">&nbsp;</td>
						<td width="5%">&nbsp;</td>
						<td width="5%">&nbsp;</td>
					</tr>
					
					
					
					
					<? 
					$iniciopagina=$_POST["iniciopagina"];
					if (empty($iniciopagina)) { 
						$iniciopagina=$_GET["iniciopagina"]; 
					} else { 
						$iniciopagina=$iniciopagina-1;
					}

					if (empty($iniciopagina)) { 
						$iniciopagina=0; 
					}
					if ($iniciopagina>$filas) { $iniciopagina=0; }
					if ($filas > 0) {
						$sel_resultado="SELECT * FROM koyikun.articulos where ".$where;
						$sel_resultado=$sel_resultado."  limit ".$iniciopagina.",50";
						echo "sel_resultado: ".$sel_resultado."<br>";
						$res_resultado=mysql_query($sel_resultado);
						if(mysql_error()){
							echo "error: ".mysql_error()."<br>";
						}
		//echo "rows: ".mysql_num_rows($res_resultado)."<br>";
						$contador=0;
						while ($contador < mysql_num_rows($res_resultado)) { 
							if ($contador % 2) { 
								$fondolinea="itemParTabla"; 
							} else { 
								$fondolinea="itemImparTabla";	
							}
							echo '<tr class="'.$fondolinea.'">';
							echo '<td width="4%"><div align="left">'.mysql_result($res_resultado,$contador,"id").'</div></td>';
							echo '<td width="5%"><div align="left">'.mysql_result($res_resultado,$contador,"codigo_interno").'</div></td>';
							echo '<td width="19%"><div align="left">'.mysql_result($res_resultado,$contador,"marca").'</div></td>';
							echo '<td width="30%"><div align="left">'.mysql_result($res_resultado,$contador,"descripcion").'</div></td>';
							echo '<td width="19%"><div align="left">'.mysql_result($res_resultado,$contador,"color").'</div></td>';
							echo '<td width="19%"><div align="left">'.mysql_result($res_resultado,$contador,"contenido").'</div></td>';
							echo '<td width="19%"><div align="left">'.mysql_result($res_resultado,$contador,"presentacion").'</div></td>';
							echo '<td width="19%"><div align="left">'.mysql_result($res_resultado,$contador,"codigo_barra").'</div></td>';
							echo '<td width="19%"><div align="left">'.mysql_result($res_resultado,$contador,"clasificacion").'</div></td>';
							echo '<td width="19%"><div align="left">'.mysql_result($res_resultado,$contador,"subclasificacion").'</div></td>'.chr(10);

/*
			#--------------------------------------------
			echo '<td width="11%"><div align="left">';
			$codfamilia=mysql_result($res_resultado,$contador,"codfamilia");
			$rs_familia=mysql_query("SELECT nombre FROM familias WHERE codfamilia='$codfamilia'");
			echo mysql_result($rs_familia,0,"nombre");
			echo '</div></td>';
			#--------------------------------------------
*/
			echo '<td class="aCentro" width="11%"><div align="center">'.mysql_result($res_resultado,$contador,"precio_tienda").'</div></td>';
			echo '<td class="aCentro" width="5%">'.mysql_result($res_resultado,$contador,"stock").'</td>';
			echo '<td width="5%">
			<div align="center"><a href="#">
			<img src="../img/modificar.png" width="16" height="16" border="0" 
			onClick="modificar_articulo('.mysql_result($res_resultado,$contador,"id").')" title="Modificar">
			</a></div></td>';
			echo '<td width="5%">
			<div align="center">
			<a href="#">
			<img src="../img/ver.png" width="16" height="16" border="0" 
			onClick="ver_articulo('.mysql_result($res_resultado,$contador,"id").')" title="Visualizar">
			</a></div></td>';

			echo '<td width="5%">
			<div align="center">
			<a href="#"><img src="../img/eliminar.png" width="16" height="16" border="0" 
			onClick="eliminar_articulo('.mysql_result($res_resultado,$contador,"id").')" title="Eliminar">
			</a></div></td>';
			echo '</tr>';

			$contador++; 
		}//end while

		echo '</table>';
	} else { 
		echo '<table class="fuente8" width="87%" cellspacing=0 cellpadding=3 border=0>';
		echo '<tr><td width="100%" class="mensaje">No hay ning&uacute;n art&iacute;culo que cumpla con los criterios de b&uacute;squeda</td></tr>';
		echo '</table>';					
	} 
	?>					
</div>
</div>
</div>			
</div>
</body>
</html>
