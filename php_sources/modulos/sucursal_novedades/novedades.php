<?php
include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");

$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a administrador
if($jerarquia!="2"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
  <meta content="text/html; charset=UTF-8" http-equiv="content-type" />
  <title>Sucursal control administrativo</title>

<script language="javascript" type="text/javascript">
function myFunction() {
	setInterval(function () {alert("Hello")}, 3000);
}
</script>

</head>
<body>
<center>




</head>


<?php
include_once("../../includes/connect.php");
include_once("../../includes/funciones_fecha.php");
include_once("cabecera.inc.php");


$fecha=date("Y-n-d");


$query='select * from novedades where ( id_sucursal="'.$id_sucursal.'" OR id_sucursal="T" ) and vigencia_inicio<="'.$fecha.'" and vigencia_finaliza>="'.$fecha.'" order by fecha';  
$result=mysql_query($query)or die(mysql_error());
$rows=mysql_num_rows($result);

?>

<center>
<titulo>Novedades</titulo><br>

<table class="t1">
<tr>
	<th>Motivo</th>
	<th>Texto</th>
</tr>

<?php
while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["motivo"].'</td>';
	echo '<td>'.str_replace( chr(13), "<br>", $row["texto"] ).'</td>';
	echo "</tr>";
}
?>
</table>




<!-- promociones vencidas -->

<titulo>Promociones vencidas</titulo><br>


<table border="1">
<tr>
<td>Marca</td>
<td>Clasificacion</td>
<td>Sub-clasificacion</td>
<td>Contenido</td>
<td>Presentacion</td>
</tr>
<?php
$fecha=date("Y-n-d");
$fecha2=date("Y-n");
$fecha2=resta_fecha($fecha , 4);

$query='select * from promociones where fecha_finaliza>="'.$fecha2.'" and fecha_finaliza<="'.$fecha.'" and id_sucursal="'.$id_sucursal.'"';
$result=mysql_query($query)or die(mysql_error());
$rows=mysql_num_rows($result);

while($row=mysql_fetch_array($result)){
	$array_articulo=detalle_articulo( $row["id_articulos"] );
	echo '<tr>';
	echo '<td>'.$array_articulo["marca"].'</td>';
	echo '<td>'.$array_articulo["clasificacion"].'</td>';
	echo '<td>'.$array_articulo["subclasificacion"].'</td>';
	echo '<td>'.$array_articulo["contenido"].'</td>';
	echo '<td>'.$array_articulo["presentacion"].'</td>';
	echo '</tr>';
}

echo "</table>";


function calcula_mes_vendedor($vendedor, $anio_mes ){
	$q='select sum(cantidad * precio_unitario) from ventas where fecha like "'.$anio_mes.'%" and vendedor="'.$vendedor.'"';
	$r=mysql_query($q);
	$total=mysql_result($r,0,1);
	return $total;
}


?>
