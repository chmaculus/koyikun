<?php
include_once("../includes/connect.php");
include("cabecera.inc.php");
?>
<body>
<center>
<table class="t1">
<tr>
	<th>Cantidad</th>
	<th>Marca</th>
	<th>descripcion</th>
	<th>Clasificacion</th>
	<th>Subclasificacion</th>
	<th>contenido</th>
	<th>Presentacion</th>
	<th>Precio unitario</th>
	<th>Sub-Total contado</th>
	<th>Precio Tarjeta</th>
	<th>Sub-total tarjeta</th>
</tr>

<form action="ventas_update.php" method="post">
<?php
include_once("../includes/funciones_precios.php");
include_once("../includes/funciones_promocion.php");
include_once("../includes/funciones_articulos.php");
include_once("../includes/funciones_valores.php");

$id_session=$_COOKIE["id_session"];
$id_sucursal=$_COOKIE["id_sucursal"];
$porcentaje_tarjeta=get_valor(7);

$query='select * from ventas_temp2 where id_session="'.$id_session.'" order by marca, clasificacion, subclasificacion, contenido, presentacion';
$result=mysql_query($query) or die(mysql_error());

while($row=mysql_fetch_array($result)){
	$array_articulos=detalle_articulo($row["id_articulos"]);

	$array_precios=precio_sucursal($row["id_articulos"], $id_sucursal);
	if($array_precios["rows"]<1){
		$array_precios=precio_sucursal($row["id_articulos"], 1);
	}

	//$contado=$array_precios["precio_base"] * ( $array_precios["porcentaje_contado"] / 100 ) + $array_precios["precio_base"];
	$contado=$array_precios["precio_base"];
	$tarjeta=$array_precios["precio_base"] * ( $porcentaje_tarjeta / 100 ) + $array_precios["precio_base"];

	$promocion="";
	$tr='<tr>';

	if($array_precios["promocion"]=="S"){
		
		$array_promocion=get_promo( $row["id_articulos"], $id_sucursal );
		$promo=$array_promocion["precio_promocion"];
		$contado=$array_promocion["precio_promocion"];

		$contado = $promo;
		$tarjeta=$promo * ( $porcentaje_tarjeta / 100 ) + $promo;
		$promocion="  **PROMO AF**";
		$tr='<tr class="special">';
	}

	echo $tr;
	echo '<td><input type="text" name="cantidad'.$row["id"].'" value="'.$row["cantidad"].'" size="3" maxlength="3"></td>';
	echo "<td>".$array_articulos["marca"]."</td>";
	echo "<td>".$array_articulos["descripcion"]."</td>";
	echo "<td>".$array_articulos["clasificacion"]."</td>";
	echo "<td>".$array_articulos["subclasificacion"]."</td>";
	echo "<td>".$array_articulos["contenido"]."</td>";
	echo "<td>".$array_articulos["presentacion"]."</td>";
	echo '<td><input type="text" name="contado'.$row["id"].'" value="'.$contado.'" size="10" readonly="readonly"></td>';
	echo '<td><input type="text" name="sub_contado'.$row["id"].'" value="'.( $contado * $row["cantidad"] ).'" size="10" readonly="readonly"></td>';
	echo '<td><input type="text" name="tarjeta'.$row["id"].'" value="'.$tarjeta.'" size="12" readonly="readonly"></td>';
	echo '<td><input type="text" name="sub_tarjeta'.$row["id"].'" value="'.( $tarjeta * $row["cantidad"] ).'" size="10" readonly="readonly"></td>';
#	echo "<td>".accion($row["id"])."</td>";

	$total_contado=$total_contado + ( $contado * $row["cantidad"] ); 
	$total_tarjeta=$total_tarjeta + ( $tarjeta * $row["cantidad"] ); 

	echo "</tr>".chr(13);
}

echo '<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td>Totales:</td>
		<td></td>';
		echo '<td><input type="text" name="total_contado" value="'.$total_contado.'" size="10" readonly="readonly"></td>';
		echo "<td></td>";
		echo '<td><input type="text" name="total_tarjeta" value="'.$total_tarjeta.'" size="10" readonly="readonly"></td>';		
		echo '</tr>';
echo '</table>';

echo '<br><alerta1>Para eliminar un articulo colocar 0 en la cantidad</alerta1><br><br>';



#-----------------------------------------
#funcion codigo muerto por ahora
function accion($id_ventastemp){
#devuelve 2 columnas en la tabla
	echo '<td><a href="ventas_update.php">
			<input type="hidden" name="id_ventastemp" value="'.$id_ventastemp.'">
			<input type="hidden" name="accion" value="eliminar">
			<button>eliminar</button></a></td>';
}
#-----------------------------------------


?>
<input type="submit" name="accion" value="ACTUALIZAR">
<input type="submit" name="accion" value="FINALIZAR">
<input type="submit" name="accion" value="CANCELAR">
</form>
</center>
</body>
</html>

