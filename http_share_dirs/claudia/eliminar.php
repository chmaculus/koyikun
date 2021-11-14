<?php
include_once("./includes/connect.php");
include_once("./cabecera.php");
echo "<center>";
if($_GET["id_ventas"]){
	$id_ventas=$_GET["id_ventas"];
}
if($_POST["id_ventas"]){
	$id_ventas=$_POST["id_ventas"];
}if($_POST["decision"]=="ELIMINAR"){
	include("ventas_update.php");
echo "<center>";
	echo "<font1>Los datos se eliminaron correctamente</font1>";
	exit;
}
if($_POST["decision"]=="CANCELAR"){
	include("ventas_muestra.inc.php");
	echo "<font1>Los datos no se han eliminado</font1>";
	exit;
}
//$query='select * from ventas where id="'.$id_ventas.'"';
$query='select * from ventas where numero_venta ="'.$_GET["numero_venta"].'" and sucursal="'.$_GET["sucursal"].'"';
echo $query."<br>";
$result=mysql_query($query);




echo '<table border="1">';
echo "<tr>";
	echo "<th>numero_venta</th>";
	echo "<th>marca</th>";
	echo "<th>descripcion</th>";
	echo "<th>color</th>";
	echo "<th>clasificacion</th>";
	echo "<th>subclasificacion</th>";
	echo "<th>cantidad</th>";
	echo "<th>sucursal</th>";
	echo "<th>fecha</th>";
	echo "<th>hora</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["numero_venta"].'</td>';
	echo '<td>'.$row["marca"].'</td>';
	echo '<td>'.$row["descripcion"].'</td>';
	echo '<td>'.$row["color"].'</td>';
	echo '<td>'.$row["clasificacion"].'</td>';
	echo '<td>'.$row["subclasificacion"].'</td>';
	echo '<td>'.$row["cantidad"].'</td>';
	echo '<td>'.$row["sucursal"].'</td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["hora"].'</td>';
	echo "</tr>".chr(10);
}





echo '
<form action="eliminar.php" method="post">
		<input type="hidden" name="id_ventas" value="'.$id_ventas.'">
		<input type="hidden" name="numero_venta" value="'.$_GET["numero_venta"].'">
		<input type="hidden" name="sucursal" value="'.$_GET["sucursal"].'">
		<input type="hidden" name="accion" value="ELIMINAR">
		<input type="submit" name="decision" value="ELIMINAR">
		<input type="submit" name="decision" value="CANCELAR">
</form>';
?>
</center>
