<center>
<?php
#include("promociones_base.php");
include("../../includes/connect.php");
include("../../includes/funciones_articulos.php");
include("../../includes/funciones_precios.php");
include("../../includes/funciones_promocion.php");
include("../../includes/funciones_varias.php");
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
  <meta content="text/html; charset=UTF-8" http-equiv="content-type" />
  <title>datos_caja</title>
	<link type="text/css" href="js/themes/base/ui.all.css" rel="stylesheet" />
	<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
	<script type="text/javascript" src="js/ui/ui.core.js"></script>
	<script type="text/javascript" src="js/ui/ui.datepicker.js"></script>
	<script type="text/javascript" src="js/ui/i18n/ui.datepicker-es.js"></script>
	<link type="text/css" href="../demos.css" rel="stylesheet" />
	<script type="text/javascript">
	$(function() {
		$('#fecha').datepicker({
			changeMonth: true,
			changeYear: true
		});
	<?php
	$q='select id from sucursales';
	$res1=mysql_query($q);
	while($row=mysql_fetch_array($res1)){
		echo '		$(\'#fecha_inicio'.$row["id"].'\').datepicker({
			changeMonth: true,
			changeYear: true
		});'.chr(10);
		echo '		$(\'#fecha_finaliza'.$row["id"].'\').datepicker({
			changeMonth: true,
			changeYear: true
		});.chr(10)';
	}
	?>
	});
	</script>
</head>
<body>


<?php

$fecha=date("d/n/Y");

$id_articulos=$_GET["id_articulos"];
$array_articulos=detalle_articulo($id_articulos);
$array_precios=precio_sucursal($id_articulos,"1");


?>
<table border="1" class="t1">
<tr>
	<td>ID</td>
	<td><?php echo $array_articulos["id"]; ?></td>
</tr>
<tr>
	<td>Marca</td>
	<td><?php echo $array_articulos["marca"]; ?></td>
</tr>
<tr>
	<td>Descripcion</td>
	<td><?php echo $array_articulos["descripcion"]; ?></td>
</tr>
<tr>
	<td>Contenido</td>
	<td><?php echo $array_articulos["contenido"]; ?></td>
</tr>
<tr>
	<td>Presentacion</td>
	<td><?php echo $array_articulos["presentacion"]; ?></td>
</tr>
<tr>
	<td>Codigo barras</td>
	<td><?php echo $array_articulos["codigo_barra"]; ?></td>
</tr>
<tr>
	<td>Fecha</td>
	<td><?php echo $array_articulos["fecha"]; ?></td>
</tr>
<tr>
	<td>Hora</td>
	<td><?php echo $array_articulos["hora"]; ?></td>
</tr>
<tr>
	<td>Clasificacion</td>
	<td><?php echo $array_articulos["clasificacion"]; ?></td>
</tr>
<tr>
	<td>Subclasificacion</td>
	<td><?php echo $array_articulos["subclasificacion"]; ?></td>
</tr>
<tr>
	<td>Precio base</td>
	<td><?php echo "$".$array_precios["precio_base"].".- // ".$array_precios["fecha"]." // ".$array_precios["hora"]; ?></td>
</tr>
<tr>
	<td>Porcentaje contado</td>
	<td><?php echo $array_precios["porcentaje_contado"]; ?></td>
</tr>
<tr>
	<td>Porcentaje Tarjeta</td>
	<td><?php echo $array_precios["porcentaje_tarjeta"]; ?></td>
</tr>
</table>

<form action="promociones_update.php" method="post" enctype="multipart/form-data">
<table border="1" class="t1">
<tr>
	<th>Sucursal</th>
	<th>Precio Original</th>
	<th>Precio promocion</th>
	<th>Fecha inicio</th>
	<th>Fecha finaliza</th>
</tr>

<?php
echo '<input type="hidden" name="id_articulos" value="'.$id_articulos.'">';
//echo '<input type="hidden" name="query" value="'.base64_encode($query) .'">'.chr(13);
echo '<input type="hidden" name="query" value="'.$query .'">'.chr(13);

$query="select * from sucursales order by sucursal";
$result=mysql_query($query)or die(mysql_error());

while($row=mysql_fetch_array($result)){
	$array_promo=get_promo( $id_articulos, $row["id"] );

	if($array_promo != "NO"){
		$precio=$array_promo["precio_promocion"];
		$fecha_inicio=fecha_conv("-", $array_promo["fecha_inicio"] );
		$fecha_finaliza=fecha_conv("-", $array_promo["fecha_finaliza"] );
	}else{
		$precio=$array_precios["precio_base"];
		$fecha_inicio=$fecha;
		$fecha_finaliza=$fecha;
	}
	echo "<tr>";
	echo '<td>'.$row["sucursal"].'</td>';
	echo '<td>'.$array_precios["precio_base"].'</td>';
	echo '<td><input type="text" name="precio_promocion'.$row["id"].'" value="'.$precio.'" size="6"></td>';
	echo '<td><input type="text" name="fecha_inicio'.$row["id"].'" id="fecha_inicio'.$row["id"].'" value="'.$fecha_inicio.'" size="10"></td>';
	echo '<td><input type="text" name="fecha_finaliza'.$row["id"].'" id="fecha_finaliza'.$row["id"].'" value="'.$fecha_finaliza.'" size="10"></td>';
	if($array_promo["habilitado"]=="S"){
		$check="checked";
	}else{
		$check="";
	}
	echo '<td><input type="checkbox" name="habilitado'.$row["id"].'" value="S" '.$check.' ></td>';
	echo "</tr>".chr(10);
}
echo '</table>';

?>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>
