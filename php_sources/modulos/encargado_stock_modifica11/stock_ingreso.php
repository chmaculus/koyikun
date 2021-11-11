<?php 
include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");
include_once("seguridad.inc.php");
include_once("cabecera.inc.php");
?>

<script language="javascript" src="js/jquery-1.3.min.js"></script>
<script language="javascript" src="funciones.js"></script>

<?php
include_once("../../includes/funciones_varias.php");
include_once("../../includes/funciones_stock.php");
echo "<center>";
$id_sucursal=$_COOKIE["id_sucursal"];

echo '<font1>Modificacion de Stock</font1><br>';
echo '<font1>Sucursal: '.nombre_sucursal($id_sucursal).'</font1>';
echo '<form action="'.$SCRIPT_NAME.'" method="post">';

echo '<table class="t1">';
	echo '<tr><td>Marca</td>';

	echo "<td>";	
	echo '<select name="marca" id="marca" onChange="fun_marca();">';	
	include("select_marca.inc.php"); 
	echo '</select>';
	echo "<td>";	
	

	echo '<tr><td>clasificacion</td>';
	echo "<td>";
	echo '<select name="clasificacion" id="clasificacion" onchange="fun_clasificacion();">';	
	include("select_clasificacion.inc.php");  
	echo '</select>';
	echo "</td>";	

	echo '<tr><td>Sub-clasificacion</td>';
	echo "<td>";
	echo '<select name="subclasificacion" id="subclasificacion">';	
	include("select_subclasificacion.inc.php");  
	echo '</select>';
	echo "</td>";	


echo "</table>";
echo '<input type="hidden" name="marca2" value="'.$_POST["marca"].'">';
echo '<input type="submit" name="ACEPTAR" value="ACEPTAR"><br>';
echo "</form>";

if($_POST["marca"]!="" AND $_POST["clasificacion"]=="" AND $_POST["subclasificacion"]=="" ){
	$query='select * from articulos where marca="'.$_POST["marca"].'" order by marca, clasificacion, subclasificacion, descripcion';
}

if($_POST["marca"]!="" AND $_POST["clasificacion"]!="" AND $_POST["subclasificacion"]=="" ){
	$query='select * from articulos where marca="'.$_POST["marca"].'" and clasificacion="'.$_POST["clasificacion"].'" order by marca, clasificacion, subclasificacion, descripcion';
}

if($_POST["marca"]!="" AND $_POST["clasificacion"]!="" AND $_POST["subclasificacion"]!="" ){
	$query='select * from articulos where marca="'.$_POST["marca"].'" and clasificacion="'.$_POST["clasificacion"].'" and subclasificacion="'.$_POST["subclasificacion"].'" order by marca, clasificacion, subclasificacion, descripcion';
}

$result=mysql_query($query)or die(mysql_error());
$numrows=mysql_num_rows($result);


echo '<font1>Cantidad de articulos: '.$numrows.'</font1<br><br>';
echo '<font1>Marca: '.$_POST["marca"].'</font1<br>';
?>
<form action="stock_update.php" method="post">
<table class="t1">
<tr>
	<td>Codigo</td>
	<td>Descripcion</td>
	<td>Contenido</td>
	<td>Presentacion</td>
	<td>Clasificacion</td>
	<td>Sub-clasificacion</td>
	<td>S.Actual</td>
	<td>Minimo</td>
	<td>Maximo</td>
	<td>Fecha</td>
	<td>Hora</td>
</tr>

<?php
while($row=mysql_fetch_array($result)){
	$array_stock=stock_sucursal($row[id], $id_sucursal);
	echo "<tr>";
	echo '<td>'.$row["codigo_interno"].'</td>';
	echo '<td>'.$row["descripcion"].'</td>';
	echo '<td>'.$row["contenido"].'</td>';
	echo '<td>'.$row["presentacion"].'</td>';
	echo '<td>'.$row["clasificacion"].'</td>';
	echo '<td>'.$row["subclasificacion"].'</td>';
	echo '<td><input type="text" name="stock'.$row["id"].'" value="'.$array_stock["stock"].'" size="6"></td>';
	echo '<td><input type="text" name="minimo'.$row["id"].'" value="'.$array_stock["minimo"].'" size="6" ></td>';
	echo '<td><input type="text" name="maximo'.$row["id"].'" value="'.$array_stock["maximo"].'" size="6" ></td>';
	echo '<td>'.$array_stock["fecha"].'</td>';
	echo '<td>'.$array_stock["hora"].'</td>';
	echo "</tr>".chr(13);
}

?>
</table>
<input type="hidden" name="query" value="<?php echo base64_encode($query);?>">
<input type="submit" name="INGRESAR" value="INGRESAR">

</form>
</center>
</body>
</html>