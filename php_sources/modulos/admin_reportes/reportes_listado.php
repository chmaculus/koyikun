<?php
if($_POST["EXCEL"]=="EXCEL"){
	$fecha_desde=base64_encode($_POST["fecha_desde"]);
	$fecha_hasta=base64_encode($_POST["fecha_hasta"]);
	header('location: reportes_excel.php?fecha_desde='.$fecha_desde.'&fecha_hasta='.$fecha_hasta);
	exit;
}

include("reportes_base.php");
include("../../includes/connect.php");
include("../../includes/funciones_varias.php");
?>

<center>
<?php
echo '<form action="'.$_SERVER["SCRIPT_NAME"].'" method="post">';
include ("fecha_desde_hasta.inc.php");
echo '<input type="submit" name="ACEPTAR" value="ACEPTAR"><br>';
echo '<input type="submit" name="EXCEL" value="EXCEL">';
echo '</form>';

$query='select * from reportes where fecha>="'.fecha_conv("/",$fecha_desde).'" and fecha<="'.fecha_conv("/",$fecha_hasta).'" order by fecha, hora';
$result=mysql_query($query)or die(mysql_error());

?>
<table class="t1">
<tr>
	<th>Sucursal</th>
	<th>motivo</th>
	<th>texto</th>
	<th>fecha</th>
	<th>hora</th>
	<th>Accion</th>
	<th>Accion</th>
</tr>

<?php
while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.nombre_sucursal($row["id_sucursal"]).'</td>';
	echo '<td>'.$row["motivo"].'</td>';
	echo '<td>'.$row["texto"].'</td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["hora"].'</td>';
	echo '<td><A HREF="reportes_ingreso.php?id_reportes='.$row["id"].'"><button>Modificar</button></A></td>';
	echo '<td><A HREF="reportes_eliminar.php?id_reportes='.$row["id"].'"><button>Eliminar</button></A></td>';
	echo "</tr>";
}


?>
</center>
