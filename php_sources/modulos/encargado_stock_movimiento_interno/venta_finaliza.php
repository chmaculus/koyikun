<?php 
include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");
include_once("seguridad.inc.php");
include("base.php");


include_once("../../includes/funciones_articulos.php");
include_once("../../includes/funciones_precios.php");
?>
<body>
<center>
<form action="ventas_update.php" method="post">

<?php

$id_session=$_COOKIE["id_session"];
$id_sucursal=$_COOKIE["id_sucursal"];


$query='select * from ventas_temp where id_session="'.$id_session.'"';
$result=mysql_query($query) or die(mysql_error());

$rows=mysql_num_rows($result);
if($rows<1){ exit; }

?>
<table class="t1">
<tr>
	<th>Cantidad</th>
	<th>ID</th>
	<th>Marca</th>
	<th>descripcion</th>
	<th>Contenido</th>
	<th>Presentacion</th>
	<th>Clasificacion</th>
	<th>Sub clasificacion</th>
	<th>Precio</th>
	<th>Total $</th>
</tr>
<?php


while($row=mysql_fetch_array($result)){
	$array_articulos=detalle_articulo($row["id_articulos"]);
	$array_precios=precio_sucursal($row["id_articulos"], $id_sucursal);
	$total=$array_precios["precio_base"] * $row["cantidad"]; 


	echo "<tr>";
	echo "<td>".$row["cantidad"]."</td>";
	echo "<td>".$array_articulos["id"]."</td>";
	echo "<td>".$array_articulos["marca"]."</td>";
	echo "<td>".$array_articulos["descripcion"]."</td>";
	echo "<td>".$array_articulos["contenido"]."</td>";
	echo "<td>".$array_articulos["presentacion"]."</td>";
	echo "<td>".$array_articulos["clasificacion"]."</td>";
	echo "<td>".$array_articulos["subclasificacion"]."</td>";
	echo "<td>".$array_articulos["codigo_barra"]."</td>";
	echo "<td>".round($array_precios["precio_base"],2)."</td>";
	echo "<td>".round($total,2)."</td>";
	echo "</tr>".chr(13);
}
echo '</table>';


echo '<table class="t1">';
echo '<tr>';
echo '	<td>Apellido</td>';
echo '	<td><input type="text" name="apellido" size="15"></td>';
echo '</tr>';
echo '<tr>';
echo '	<td>Nombre</td>';
echo '	<td><input type="text" name="nombre" size="20"></td>';
echo '</tr>';
echo '<tr>';
echo '	<td>Direccion</td>';
echo '	<td><input type="text" name="direccion" size="30"></td>';
echo '</tr>';
echo '<tr>';
echo '	<td>Localidad</td>';
echo '	<td><input type="text" name="localidad" size="15"></td>';
echo '</tr>';
echo '<tr>';
echo '	<td>Cuotas</td>';
echo '	<td><input type="text" name="cuotas" size="5"></td>';
echo '</tr>';
echo '</table>';


//include("sucursal_select.inc.php");
echo'<input type="submit" name="accion" value="FINALIZAR">';


echo '</form>';
echo '</body>';
echo '</html>';



?>