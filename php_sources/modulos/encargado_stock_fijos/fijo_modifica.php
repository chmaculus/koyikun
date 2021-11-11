<?php
include("cabecera.inc.php");
include("../includes/connect.php");

echo '<body onLoad=document.aa.fijo.focus()>';

$id_articulo=$_GET["id_articulo"];
$id_sucursal=$_COOKIE["id_sucursal"];

#----------------------------------------
#muestra registro ingresado
$query='select * from articulos where id="'.$_GET["id_articulo"].'"';
$array_articulos=mysql_fetch_array(mysql_query($query));
if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
#----------------------------------------

echo '<br><center><titulo1>Modificacion cantidades fijas de stock</titulo1><br>';


#----------------------------------------
echo '<table border="1">';
	echo '<tr>';
		echo '<th>id</th>';
		echo '<td>'.$array_articulos["id"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>marca</th>';
		echo '<td>'.$array_articulos["marca"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>descripcion</th>';
		echo '<td>'.$array_articulos["descripcion"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>color</th>';
		echo '<td>'.$array_articulos["color"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>contenido</th>';
		echo '<td>'.$array_articulos["contenido"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>presentacion</th>';
		echo '<td>'.$array_articulos["presentacion"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>codigo_barra</th>';
		echo '<td>'.$array_articulos["codigo_barra"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>clasificacion</th>';
		echo '<td>'.$array_articulos["clasificacion"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>subclasificacion</th>';
		echo '<td>'.$array_articulos["subclasificacion"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>Fijo</th>';
		echo '<form name="aa" action="fijo_update.php" method="post">';
		echo '<input type="hidden" name="id_articulo" value="'.$id_articulo.'">';
		echo '<input type="hidden" name="id_sucursal" value="'.$id_sucursal.'">';
		echo '<td><input type="text" name="fijo" id="fijo" value="" size="5"></td>';
		echo '</form>';
	echo '</tr>';
echo "</table>";
#----------------------------------------

echo '<br><input type="submit" name="ACEPTAR" value="ACEPTAR">';






?>