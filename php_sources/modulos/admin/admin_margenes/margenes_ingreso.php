<?php include("../../login/login_verifica.inc.php");

include_once("../seguridad.inc.php"); 


include_once("cabecera.inc.php");
include_once("../../includes/connect.php");
include_once("../../includes/funciones_precios.php");
include_once("../../includes/funciones_costos.php");
?>
<script language="javascript" src="js/jquery-1.3.min.js"></script>
<script language="javascript" src="funciones.js"></script>

<body>
<center>
<titulo>Modificacion de Margenes</titulo>


<?php
echo '<form action="'.$SCRIPT_NAME.'" method="post">';

include("select.inc.php");

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







echo '<br>Cantidad de articulos: '.$numrows.'<br>';

echo '<form method="post" action="margenes_update.php" name="form_costos" id="form_costos">';

echo '<input type="hidden" name="query" value="'.base64_encode($query).'">';
?>

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
<table class="t1">
<tr>
	<th>Descripcion</th>
	<th>Contenido</th>
	<th>Pesentacion</th>
	<th>Clasificacion</th>
	<th>Sub-clasificacion</th>
	<th>P/base</th>
	<th>D./1</th>
	<th>D./2</th>
	<th>D./3</th>
	<th>D./4</th>
	<th>D./5</th>
	<th>D./6</th>
	<th>IVA</th>
	<th>Margen</th>
	<th>Tarjeta</th>
</tr>

<?php

include_once("margenes_ingreso.inc.php");

echo '<input type="submit" name="APLICAR" value="APLICAR">';
echo "</form>";

while($row=mysql_fetch_array($result)){
	$array_precios=precio_sucursal($row["id"],"1");
	$array_costos=precio_costo($row["id"],"1");

	echo "<tr>";
	echo '<td>'.$row["descripcion"].'</td>';
	echo '<td>'.$row["contenido"].'</td>';
	echo '<td>'.$row["presentacion"].'</td>';
	echo '<td>'.$row["clasificacion"].'</td>';
	echo '<td>'.$row["subclasificacion"].'</td>';
	echo '<td>'.$array_costos["precio_costo"].'</td>';
	echo '<td>'.$array_costos["descuento1"].'</td>';
	echo '<td>'.$array_costos["descuento2"].'</td>';
	echo '<td>'.$array_costos["descuento3"].'</td>';
	echo '<td>'.$array_costos["descuento4"].'</td>';
	echo '<td>'.$array_costos["descuento5"].'</td>';
	echo '<td>'.$array_costos["descuento6"].'</td>';
	echo '<td>'.$array_costos["iva"].'</td>';
	echo '<td>'.$array_costos["margen"].'</td>';
	echo '<td>'.$array_precios["porcentaje_tarjeta"].'</td>';
	echo "</tr>".chr(13);
}

?>
</center>
</body>
</html>
