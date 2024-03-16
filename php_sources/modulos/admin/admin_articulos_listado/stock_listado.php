<?php include_once("../../login/login_verifica.inc.php");

include_once("../seguridad.inc.php"); 


include("../../includes/funciones_varias.php");
include("../../includes/funciones_stock.php");
if($_POST["excel"]){
	include('stock_listado_export.php');
	exit;
}

include("cabecera.inc.php");
include("../../includes/connect.php");

if($_POST["id_sucursal"] AND $_POST["marca"]){
	$id_sucursal=$_POST["id_sucursal"];
	$marca=$_POST["marca"];
}
echo 'Listado de Stock<br>';
echo "sucursal: ".$id_sucursal."<br>".chr(13);

echo '<form action="'.$_SERVER["SCRIPT_NAME"].'" method="post">';
echo '<input type="hidden" name="id_sucursal2" value="'.$_POST["id_sucursal"].'">';

echo '<table class="t1">';
	echo '<tr><td>Sucursal</td>';
	echo "<td>";include("sucursal_select.inc.php");echo "</td></tr>";

	echo '<tr><td>Marca</td>';
	echo "<td>";include("articulos_select_marca.inc.php");echo "</td></tr>";

if (!$_POST["marca"]){
	echo "</table>";
	echo '<input type="submit" name="ACEPTAR" value="ACEPTAR"><br>';
	exit;
}

if ($marca){
		$query='select *	from articulos  
									where articulos.marca="'.$marca.'" order by articulos.marca, articulos.clasificacion, articulos.subclasificacion, articulos.descripcion'; 
}


if($marca){echo 'Marca: '.$marca.'<br>';}
if($sucursal){echo 'Marca: '.$sucursal.'<br>';}


echo "</table>";
echo '<input type="hidden" name="marca2" value="'.base64_encode($_POST["marca"]).'">';
echo '<input type="hidden" name="id_sucursal" value="'.$_POST["id_sucursal"].'">';
echo '<input type="hidden" name="query" value="'.base64_encode($query).'">';
echo '<input type="submit" name="ACEPTAR" value="ACEPTAR"><br>';
echo '<input type="submit" name="excel" value="EXPORTAR A EXCEL"><br>';

#echo id_sucursal($sucursal);

$result=mysql_query($query)or die(mysql_error());
$numrows=mysql_num_rows($result);

echo '<br>Cantidad de articulos: '.$numrows.'<br>';

echo "</form>";
?>

<table class="t1">
<tr>
	<td>Codigo</td>
	<td>Marca</td>
	<td>Descripcion</td>
	<td>Contenido</td>
	<td>Presentacion</td>
	<td>clasificacion</td>
	<td>sub-clasificacion</td>
	<td>Precio contado</td>
	<td>Precio tarjeta</td>
	<td>F.precio</td>
	<td>Stock</td>
	<td>F.stock</td>
</tr>

<?php
while($row=mysql_fetch_array($result)){
	$array_stock=stock_sucursal($row["id"], $id_sucursal);
	$array_precios=array_precios($row["id"]);
	echo "<tr>";
	echo '<td>'.$row["codigo_interno"].'</td>';
	echo '<td>'.$row["marca"].'</td>';
	echo '<td>'.$row["descripcion"].'</td>';
	echo '<td>'.$row["contenido"].'</td>';
	echo '<td>'.$row["presentacion"].'</td>';
	echo '<td>'.$row["clasificacion"].'</td>';
	echo '<td>'.$row["subclasificacion"].'</td>';
	$precio_contado=(( $array_precios["precio_base"] * $array_precios["porcentaje_contado"] ) / 100) + $array_precios["precio_base"];
	$precio_tarjeta=(( $array_precios["precio_base"] * $array_precios["porcentaje_tarjeta"] ) / 100) + $array_precios["precio_base"];
	echo '<td>'.$precio_contado.'</td>';
	echo '<td>'.$precio_tarjeta.'</td>';
	echo '<td>'.$array_precios["fecha"].'</td>';
	echo '<td>'.$array_stock["stock"].'</td>';
	echo '<td>'.$array_stock["fecha"].'</td>';
	echo "</tr>".chr(13);
}
echo "</table>";

#-----------------------------------------------------------------
function array_precios($id_articulo){
	$query='select * from precios where id_articulo="'.$id_articulo.'" and id_sucursal="1"';
	$res=mysql_query($query) or die(mysql_error()." ".$SCRIPT_NAME);
	$rows=mysql_num_rows($res);

	if($rows==1){
		$array_precios=mysql_fetch_array($res);
		return $array_precios;		
	}
}
#-----------------------------------------------------------------




?>
</center>
</body>
</html>