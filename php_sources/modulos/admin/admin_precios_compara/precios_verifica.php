<?php 
include_once("../../login/login_verifica.inc.php");

include_once("../seguridad.inc.php"); 
include_once('cabecera.inc.php');
?>

<script language="javascript" src="js/jquery-1.3.min.js"></script>
<script language="javascript" src="funciones.js"></script>

<?php
echo "<center>";
echo "<titulo>Compara costos/precios</titulo><br>";

include_once("../../includes/connect.php");
include_once("funciones.php");

echo '<form action="'.$SCRIPT_NAME.'" method="post">';
	include("select.inc.php");
echo '<input type="submit" name="ACEPTAR" value="ACEPTAR"><br>';
echo "</form>";

echo '<br>Cantidad de articulos: '.$numrows.'<br>';

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

?>

<input type="hidden" name="query" value="<?php echo base64_encode($query); ?>">

<table class="t1">
<tr>
	<th>ID</th>
	<th>Descripcion</th>
	<th>Contenido</th>
	<th>Pesentacion</th>
	<th>Clasificacion</th>
	<th>Sub-clasificacion</th>
	<th>P/Costo</th>
	<th>P/Venta</th>
	<th>F Costo</th>
	<th>P/Base</th>
	<th>F precio</th>
	
</tr>

<?php

while($row=mysql_fetch_array($result)){
	$array_precios=precio_sucursal( $row["id"], "1" );
	$array_costos=precio_costo( $row["id"] );
	$precio_venta=calcula_precio_venta( $row["id"] );

	if( $array_precios["precio_base"]!= $precio_venta){
		echo '<tr class="special">';
	}else{
		echo "<tr>";
	}
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["descripcion"].'</td>';
	echo '<td>'.$row["contenido"].'</td>';
	echo '<td>'.$row["presentacion"].'</td>';
	echo '<td>'.$row["clasificacion"].'</td>';
	echo '<td>'.$row["subclasificacion"].'</td>';
	echo '<td>'.$array_costos["precio_costo"].'</td>';
	echo '<td>'.$precio_venta.'</td>';
	echo '<td>'.fecha_conv( "-", $array_costos["fecha"] ) .'</td>';
	echo '<td>'.$array_precios["precio_base"].'</td>';
	echo '<td>'.fecha_conv( "-", $array_precios["fecha"] ).'</td>';
	echo "</tr>";
}

?>
</center>
</body>
</html>
