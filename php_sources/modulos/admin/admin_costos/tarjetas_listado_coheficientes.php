<?php
include_once("../../includes/connect.php");

include("../../login/login_verifica.inc.php");
include_once("../seguridad.inc.php"); 

include_once("cabecera.inc.php");
include_once("funciones.php");?>


<center>
<?php


#----------------------------------------
#muestra registro ingresado
$query='select * from articulos where id="'.$_GET["id_articulo"].'"';
$array_articulos=mysql_fetch_array(mysql_query($query));
if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
#----------------------------------------

#----------------------------------------
echo '<table class="t1">';
	echo '<tr>';
		echo '<th>id</th>';
		echo '<td>'.$array_articulos["id"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>codigo_interno</th>';
		echo '<td>'.$array_articulos["codigo_interno"].'</td>';
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
		echo '<th>fecha</th>';
		echo '<td>'.$array_articulos["fecha"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>hora</th>';
		echo '<td>'.$array_articulos["hora"].'</td>';
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
		echo '<th>id_web</th>';
		echo '<td>'.$array_articulos["id_web"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>publicar_web</th>';
		echo '<td>'.$array_articulos["publicar_web"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>discontinuo</th>';
		echo '<td>'.$array_articulos["discontinuo"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>observaciones</th>';
		echo '<td>'.$array_articulos["observaciones"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>lanzamiento</th>';
		echo '<td>'.$array_articulos["lanzamiento"].'</td>';
	echo '</tr>';
echo "</table>";

echo '<br>';
echo '<br>';

#----------------------------------------

$array_costos=precio_costo($array_articulos["id"]);
$precio_venta=calcula_precio_venta( $array_costos );


echo '<font color="#000000"> Precio de venta: '.round($precio_venta,2)."</font><br><br>";

$query="select * from tarjetas limit 0,1000";
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


$query='select * from tarjetas_coeficientes where id_tarjeta="'.$_GET["id_tarjetas"].'" limit 0,1000';
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<table class="t1">';
echo "<tr>";
	echo "<th>id</th>";
	echo "<th>id_tarjeta</th>";
	echo "<th>cantidad_pagos</th>";
	echo "<th>coeficiente</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["id_tarjeta"].'</td>';
	echo '<td>'.$row["cantidad_pagos"].'</td>';
	echo '<td>'.$row["coeficiente"].'</td>';
	echo '<td>'.round (($row["coeficiente"] * $precio_venta) ,2).'</td>';
	echo "</tr>".chr(10);
}


?>
</table></center>

