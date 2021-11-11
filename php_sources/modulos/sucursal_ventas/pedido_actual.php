<?php 
include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");
include_once("seguridad.inc.php");
include("cabecera.inc.php");


?>
<body>
<center>
<font1>Pedido Actual</font1><br>
<table class="t1">
<tr>
	<th>ID</th>
	<th>Codigo interno</th>
	<th>Cantidad</th>
	<th>Rotacion</th>
	<th>Marca</th>
	<th>descripcion</th>
	<th>Color</th>
	<th>Contenido</th>
	<th>Presentacion</th>
	<th>Clasificacion</th>
	<th>Sub clasificacion</th>
	<th>Codigo barra</th>
</tr>

<form action="pedidos_update.php" method="post">
<?php
include_once("../../includes/funciones_articulos.php");
//include_once("../../includes/funciones_precios.php");
//include_once("../../includes/funciones_promocion.php");

$id_session=$_COOKIE["id_session"];
$id_sucursal=$_COOKIE["id_sucursal"];

$query='select * from pedidos_temp where id_session="'.$id_session.'"';
$result=mysql_query($query) or die(mysql_error());

while($row=mysql_fetch_array($result)){
	$array_articulos=detalle_articulo($row["id_articulos"]);
	//$array_precios=precio_sucursal($row["id_articulos"], $id_sucursal);


    #----------------------------------------
    $query='select * from ventas_estadistica where id_articulo="'.$array_articulos["id"].'"';
    $array_ventas_estadistica=mysql_fetch_array(mysql_query($query));
    if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
    #----------------------------------------



	//$contado=$array_precios["precio_base"] * ( $array_precios["porcentaje_contado"] / 100 ) + $array_precios["precio_base"];
	$contado=$array_precios["precio_base"];
	$tarjeta=$array_precios["precio_base"] * ( $array_precios["porcentaje_tarjeta"] / 100 ) + $array_precios["precio_base"];


	echo "<tr>";
	echo "<td>".$array_articulos["id"]."</td>";
	echo "<td>".$array_articulos["codigo_interno"]."</td>";
	echo '<td><input type="text" name="cantidad'.$row["id"].'" value="'.$row["cantidad"].'" size="3" maxlength="3"></td>';
	echo "<td>";
	    echo '<table border="1">';
	    echo "<tr>";
	    echo '<td>Mes</td>';
	    echo '<td>'.$array_ventas_estadistica["mes"].'</td>';
	    echo "</tr>";
	    echo "<tr>";
	    echo '<td>Tres</td>';
	    echo '<td>'.$array_ventas_estadistica["tres"].'</td>';
	    echo "</tr>";
	    echo "</table>";
	echo "</td>";
	echo "<td>".$array_articulos["marca"]."</td>";
	echo "<td>".$array_articulos["descripcion"]."</td>";
	echo "<td>".$array_articulos["color"]."</td>";
	echo "<td>".$array_articulos["contenido"]."</td>";
	echo "<td>".$array_articulos["presentacion"]."</td>";
	echo "<td>".$array_articulos["clasificacion"]."</td>";
	echo "<td>".$array_articulos["subclasificacion"]."</td>";
	echo "<td>".$array_articulos["codigo_barra"]."</td>";
	echo "</tr>".chr(13);
}
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

