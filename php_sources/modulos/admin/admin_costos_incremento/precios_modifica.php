<?php include_once("../login/login_verifica.inc.php");

include_once("../seguridad.inc.php"); 

include_once('cabecera.inc.php');
?>

<script language="javascript" src="js/jquery-1.3.min.js"></script>
<script language="javascript" src="funciones.js"></script>

<?php

echo "<titulo>Incremento de costos</titulo><br>";

include_once("../../includes/connect.php");
include_once("funciones.php");

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
echo '<input type="submit" name="ACEPTAR" value="ACEPTAR"><br><br>';
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

echo 'Cantidad de articulos: '.$numrows.'<br><br>';
?>
<form action="update.php" method="post">



<input type="hidden" name="clasificacion" value="<?php echo $_POST["clasificacion"]; ?>">
<input type="hidden" name="subclasificacion" value="<?php echo $_POST["subclasificacion"]; ?>">
<input type="hidden" name="query" value="<?php echo base64_encode($query); ?>">

<table class="t1">
	<tr>
	<td>
	<table class="t1">
		<tr>
		<td>Fabrica</td>
		<td><input type="radio" name="tipo_cambio" value="fabrica" checked ></td>
		</tr>
		<tr>
		<td>Gerencia</td>
		<td><input type="radio" name="tipo_cambio" value="gerencia"></td>
		</tr>
	</table>
	</td>
	<td>
	<font1>Detalle</font1><br>
	<textarea name="detalle" rows="4" cols="20"></textarea>
	</td>
	</tr>
</table>

<br>
Porcentaje contado<input type="text" name="porcentaje_contado" value="" size="4">
<input type="hidden" name="marca" value="<?php echo $_POST["marca"];?>">
<input type="submit" name="APLICAR" value="APLICAR"><br><br>
</form>
<table class="t1">
<tr>
	<th>Descripcion</th>
	<th>Contenido</th>
	<th>Pesentacion</th>
	<th>Clasificacion</th>
	<th>Sub-clasificacion</th>
	<th>P/Costo</th>
	<th>P/Base</th>
	<th>F precios</th>
	<th>Costo Fab</th>
	<th>Costo Ger</th>
	
</tr>

<?php

while($row=mysql_fetch_array($result)){
	$array_precios=precio_sucursal( $row["id"], "1" );
	$array_costos=precio_costo( $row["id"] );
	echo "<tr>";
	echo '<td>'.$row["descripcion"].'</td>';
	echo '<td>'.$row["contenido"].'</td>';
	echo '<td>'.$row["presentacion"].'</td>';
	echo '<td>'.$row["clasificacion"].'</td>';
	echo '<td>'.$row["subclasificacion"].'</td>';
	echo '<td>'.$array_costos["precio_costo"].'</td>';
	echo '<td>'.$array_precios["precio_base"].'</td>';
	echo '<td>'.fecha_conv( "-", $array_costos["fecha"] ) .'</td>';
	echo '<td>'.fecha_conv( "-", $array_precios["fecha"] ).'</td>';
	echo '<td>'.fecha_conv( "-", $array_costos["fecha_gerencia"] ).'</td>';
	echo "</tr>";
}

?>
</table>
</center>
</body>
</html>
