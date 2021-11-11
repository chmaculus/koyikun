<?php 
include_once("../includes/connect.php");
include_once("../login/login_verifica.inc.php");
include_once("seguridad.inc.php");
include("cabecera.inc.php");


if(!$_GET["id_sucursal"] OR !$_GET["numero_venta"]){
	echo "salio aca";
	exit;
}


include("../includes/funciones.php");


if($_GET["id_sucursal"] AND $_GET["numero_venta"]){
	$id_sucursal=$_GET["id_sucursal"];
	$numero_venta=$_GET["numero_venta"];
}
$sucursal=nombre_sucursal($_GET["id_sucursal"]);

$valores=valores($numero_venta, $sucursal);

$query='select * from ventas where sucursal="'.$sucursal.'" and numero_venta="'.$numero_venta.'"';
$result=mysql_query($query)or die(mysql_error());


echo "Numero de venta: ".$_GET["numero_venta"]."<br>";
echo "Sucursal: ".$sucursal."<br>";
echo "Fecha: ".$valores["fecha"]."<br>";
echo "Hora: ".$valores["hora"]."<br>";
echo "Vendedor: ".$valores["vendedor"]."<br>";
echo "Tipo de pago: ".$valores["tipo_pago"]."<br>";
echo "Total venta: ".calcula_total_venta2( $_GET["numero_venta"], $sucursal )."<br>";
?>

<table class="t1">
<tr>
	<th>Marca</th>
	<th>Descripcion</th>
	<th>Clasificacion</th>
	<th>Subclasificacion</th>
	<th>Cantidad</th>
	<th>P/unitario</th>
	<th>Sub-total</th>
</tr>

<?php
while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["marca"].'</td>';
	echo '<td>'.$row["descripcion"].'</td>';
	echo '<td>'.$row["clasificacion"].'</td>';
	echo '<td>'.$row["subclasificacion"].'</td>';
	echo '<td>'.$row["cantidad"].'</td>';
	echo '<td>'.$row["precio_unitario"].'</td>';
	echo '<td>'.( $row["cantidad"] * $row["precio_unitario"] ).'</td>';
	echo "</tr>";
}



#-----------------------------------------------------------------
function valores($numero_venta, $sucursal){
	$query='select * from ventas where numero_venta="'.$numero_venta.'" and sucursal="'.$sucursal.'" limit 0,1';
	$result=mysql_query($query)or die(mysql_error());
	$array=mysql_fetch_array($result);	
return $array;
}				
#-----------------------------------------------------------------

#-----------------------------------------------------------------
function calcula_total_venta2($numero_venta, $sucursal){
	$query='select sum( cantidad * precio_unitario ) from ventas where numero_venta="'.$numero_venta.'" and sucursal="'.$sucursal.'"';
	$result=mysql_query($query)or die(mysql_error());
	$total_venta=mysql_result($result,0);	
return $total_venta;
}				
#-----------------------------------------------------------------


?>
</center>

</body>
</html>