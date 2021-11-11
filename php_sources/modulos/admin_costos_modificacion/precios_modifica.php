<?php include("../../login/login_verifica.inc.php");

$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a administrador
if($jerarquia!="0"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 
include_once("cabecera.inc.php");
?>

<script language="javascript" src="js/jquery-1.3.min.js"></script>
<script language="javascript" src="funciones.js"></script>

<body>
<center>
<?php
echo "<titulo>Modificacion de costos</titulo><br>";
include("../../includes/connect.php");
include_once("funciones.php");

echo '<form action="'.$SCRIPT_NAME.'" method="post">';


echo '<select name="marca">';
	include("select_marca.inc.php");
echo '</select>';

echo '<input type="hidden" name="marca2" value="'.$_POST["marca"].'">';
echo '<input type="submit" name="ACEPTAR" value="ACEPTAR"><br>';
echo "</form>";

#---------------------------------------------------------------
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
#---------------------------------------------------------------

echo '<font1>Marca: '.$_POST["marca"].'</font1<br>';
echo '<font1>Cantidad de articulos: '.$numrows.'</font1<br>';
?>
<form action="precios_update.php" method="post" name="precios" target="_self" id="precios">
<table class="t1">
<tr>
	<th>Descripcion</th>
	<th>Contenido</th>
	<th>Presentacion</th>
	<th>Clasificacion</th>
	<th>Sub-clasificacion</th>
	<th>Costo Inicial</th>
	<th>Costo nuevo</th>
	<th>P% Inc</th>
	<th>Fecha Fab</th>
	<th>Fecha Ger</th>
</tr>

<?php
while($row=mysql_fetch_array($result)){
	$array_costos=precio_costo( $row[id] );
	echo "<tr>";
	echo '<td>'.$row["descripcion"].'</td>';
	echo '<td>'.$row["contenido"].'</td>';
	echo '<td>'.$row["presentacion"].'</td>';
	echo '<td>'.$row["clasificacion"].'</td>';
	echo '<td>'.$row["subclasificacion"].'</td>';
	echo '<td><input type="text" name="costo_inicial'.$row["id"].'" id="costo_inicial'.$row["id"].'" size="10" value="'.$array_costos["precio_costo"].'" readonly="readonly"></td>';
	echo '<td><input type="text" name="precio_costo'.$row["id"].'" id="precio_costo'.$row["id"].'" size="10" value="'.$array_costos["precio_costo"].'"></td>';
	echo '<td><input type="text" name="porcentaje_incremento'.$row["id"].'" id="porcentaje_incremento'.$row["id"].'" size="4" onchange="calcular('.$row["id"].');" value="0"></td>';
	echo '<td>'.$array_costos["fecha"].'</td>';
	echo '<td>'.$array_costos["fecha_gerencia"].'</td>';
	echo "</tr>".chr(13);
}

?>
</table>

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



<input type="hidden" name="query" value="<?php echo base64_encode($query);?>">
<input type="submit" name="INGRESAR" value="INGRESAR">

</form>
</center>
</body>
</html>