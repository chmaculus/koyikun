<?php 
include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");
include_once("seguridad.inc.php");
include("base.php");


echo '<center>';


if($_GET["error"]=="1"){
	echo '<alerta1>DESCUENTO NO AUTORIZADO, SUPERA EL MAXIMO PERMITIDO!</alerta1><br>';
}



?>

<table class="t1">
<tr>
	<th>Count</th>
	<th>ID</th>
	<th>Codigo interno</th>
	<th>Cantidad</th>
	<th>Marca</th>
	<th>descripcion</th>
	<th>Contenido</th>
	<th>Presentacion</th>
	<th>Clasificacion</th>
	<th>Sub clasificacion</th>
	<th>Codigo barra</th>
	<th>Descuento</th>
	<th>Desc maximo mayorista</th>
	<th>Contado</th>
	<th>Contadoc descuento</th>
</tr>

<form action="ventas_update.php" method="post">
<?php
include_once("../../includes/funciones_articulos.php");
include_once("../../includes/funciones_precios.php");
include_once("../includes/funciones_costos.php");
include_once("../../includes/funciones_promocion.php");

$id_session=$_COOKIE["id_session"];
$id_sucursal=$_COOKIE["id_sucursal"];


$query='select * from ventas_temp where id_session="'.$id_session.'"';
$result=mysql_query($query) or die(mysql_error());


$count=0;
while($row=mysql_fetch_array($result)){
	$count++;
	$array_articulos=detalle_articulo($row["id_articulos"]);
	$array_precios=precio_sucursal($row["id_articulos"], $id_sucursal);
	$array_costo=array_costo($row["id_articulos"]);

	//$contado=$array_precios["precio_base"] * ( $array_precios["porcentaje_contado"] / 100 ) + $array_precios["precio_base"];
	$contado=$array_precios["precio_base"];
	$tarjeta=$array_precios["precio_base"] * ( $array_precios["porcentaje_tarjeta"] / 100 ) + $array_precios["precio_base"];

	$q3='select descuento from margenes_descuentos where margen="'.$array_costo["margen"].'"';
 //echo $q3."<br>";
  $array3=mysql_fetch_array(mysql_query($q3));
         
	echo "<tr>";
	echo "<td>".$count."</td>";
	echo "<td>".$array_articulos["id"]."</td>";
	echo "<td>".$array_articulos["codigo_interno"]."</td>";
	echo '<td><input type="text" name="cantidad'.$row["id"].'" value="'.$row["cantidad"].'" size="3" maxlength="6"></td>';
	echo "<td>".$array_articulos["marca"]."</td>";
	echo "<td>".$array_articulos["descripcion"]."</td>";
	echo "<td>".$array_articulos["contenido"]."</td>";
	echo "<td>".$array_articulos["presentacion"]."</td>";
	echo "<td>".$array_articulos["clasificacion"]."</td>";
	echo "<td>".$array_articulos["subclasificacion"]."</td>";
	echo "<td>".$array_articulos["codigo_barra"]."</td>";
	echo '<td><input type="text" name="descuento'.$row["id"].'" value="'.$row["descuento"].'" size="3" maxlength="6"></td>';
	echo "<td>".$array3[0]."</td>";
	echo "<td>".$contado."</td>";
	echo "<td>".($contado-(($contado * $row["descuento"])/100))."</td>";
	echo "</tr>".chr(13);
}

$q='select sum(cantidad) from ventas_temp where id_session="'.$id_session.'"';
$aaa=mysql_result(mysql_query($q),0,0);

$array1=calcula_totalventa($id_session);




echo '<tr>';
echo '<td></td>';
echo '<td></td>';
echo '<td></td>';
echo '<td>t: '.$aaa.'</td>';
echo '<td></td>';
echo '<td></td>';
echo '<td></td>';
echo '<td></td>';
echo '<td></td>';
echo '<td></td>';
echo '<td></td>';
echo '<td></td>';
echo '<td>Total</td>';
echo '<td>'.round($array1[0],2).'</td>';
echo '</tr>';


echo '<tr>';
echo '<td></td>';
echo '<td></td>';
echo '<td></td>';
echo '<td></td>';
echo '<td></td>';
echo '<td></td>';
echo '<td></td>';
echo '<td></td>';
echo '<td></td>';
echo '<td></td>';
echo '<td></td>';
echo '<td></td>';
echo '<td>Total con descuento</td>';
echo '<td>'.round($array1[1],2).'</td>';
echo '</tr>';


echo '</table>';

echo '<br><alerta1>Para eliminar un articulo colocar 0 en la cantidad</alerta1><br><br>';





#---------------------------------------------------------------
function calcula_totalventa($id_session){
	$q='select sum(cantidad*contado) as total, 
						sum(
								(cantidad*contado)-
									(
										(cantidad*contado)*
										(descuento/100)
									)
							) as totaldes from ventas_temp where id_session="'.$id_session.'"';
	$total=mysql_fetch_array(mysql_query($q));
	return $total;
}
#---------------------------------------------------------------



?>
<input type="submit" name="accion" value="ACTUALIZAR">
<input type="submit" name="accion" value="FINALIZAR">
<input type="submit" name="accion" value="CANCELAR">
</form>
</center>
</body>
</html>

