<?php
include_once("../includes/connect.php");

include("../includes/seguridad_franquicia.inc.php");
 

include_once("cabecera.inc.php");
include_once("includes/funciones.php");?>


<center>
<?php


#----------------------------------------
#muestra registro ingresado
$query='select * from koyikun.articulos where id="'.$_GET["id_articulo"].'"';
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
		echo '<th>clasificacion</th>';
		echo '<td>'.$array_articulos["clasificacion"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>subclasificacion</th>';
		echo '<td>'.$array_articulos["subclasificacion"].'</td>';
	echo '</tr>';
echo "</table>";

echo '<br>';
echo '<br>';

#----------------------------------------

$array_costos=precio_costo($array_articulos["id"]);
$precio_venta=calcula_precio_venta( $array_costos );


echo '<font color="#000000"> Precio Contado: '.round($precio_venta,2)."</font><br><br>";

$query1='select * from koyikun.tarjetas where id="'.$_GET["id_tarjetas"].'" limit 0,1';
$result1=mysql_query($query1);
$array1=mysql_fetch_array($result1);
if(mysql_error()){echo mysql_error()."<br>".$query1."<br>";}


$query='select * from koyikun.tarjetas_coeficientes where id_tarjeta="'.$_GET["id_tarjetas"].'" order by cantidad_pagos limit 0,1000';
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<table class="t1">';
echo "<tr>";
	echo '<th>Tarjeta</th>';
	echo "<th>cantidad_pagos</th>";
	echo "<th>pagos de:</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	$total=round (($row["coeficiente"] * $precio_venta) ,2);
	$tot2=($total / $row["cantidad_pagos"]);
	echo "<tr>";
	echo '<td>'.$array1["tarjeta"].'</td>';
	echo '<td>'.$row["cantidad_pagos"].'</td>';
	echo '<td>'.$total.'</td>';
	echo '<td>'.$row["cantidad_pagos"].' x '.round($tot2,2).'</td>';
	echo "</tr>".chr(10);
}


?>
</table></center>

