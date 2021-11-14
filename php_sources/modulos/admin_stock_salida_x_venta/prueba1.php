<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" href="style.css" type="text/css">
<meta content="text/html; charset=ISO-8859-1" http-equiv="content-type" />
<title>Tablabla ventas By Christian Máculus</title>
</head>



<center>
<?php


$fecha_desde="2012-08-02";
$fecha_hasta="2012-08-02";

include("../../includes/connect.php");
$query='select distinct id_articulos from ventas where fecha="2012-08-02"';



$result=mysql_query($query);
if(mysql_error()){
	echo mysql_error()."<br>".$query."<br>";
}
?>

<?php
while($row=mysql_fetch_array($result)){
	$query='select * from ventas where id_articulos="'.$row[0].'" and fecha="2012-08-02" limit 0,1';
	$array_ventas_temp3=mysql_fetch_array(mysql_query($query));
	if(mysql_error()){
   	 echo "Q: ".$query."<br>";
    	echo "E: ".mysql_error()."<br>";
    	echo "S: ".$_SERVER["SCRIPT_NAME"]."<br>";
	}
	
	#----------------------------------------
	$query='insert into koyikun.ventas_temp3 set
		id_articulo="'.$array_ventas_temp3["id_articulos"].'",
		marca="'.$array_ventas_temp3["marca"].'",
		descripcion="'.$array_ventas_temp3["descripcion"].'",
		contenido="'.$array_ventas_temp3["contenido"].'",
		presentacion="'.$array_ventas_temp3["presentacion"].'",
		clasificacion="'.$array_ventas_temp3["clasificacion"].'",
		subclasificacion="'.$array_ventas_temp3["subclasificacion"].'",
		precio_unitario="'.$array_ventas_temp3["precio_unitario"].'",
		costo="'.$array_ventas_temp3["costo"].'"';
	mysql_query($query);

	if(mysql_error()){
   	 echo "Q: ".$query."<br>";
    	echo "E: ".mysql_error()."<br>";
    	echo "S: ".$_SERVER["SCRIPT_NAME"]."<br>";
	}
	#----------------------------------------	
}


$query="select * from ventas_temp3 order by marca, clasificacion, subclasificacion, descripcion";
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}
?>


<table class="t1">
<tr>
    <th>marca</th>
    <th>descripcion</th>
    <th>contenido</th>
    <th>presentacion</th>
    <th>clasificacion</th>
    <th>subclasificacion</th>
    <th>costo</th>
    <th>p/unitario</th>
    <th>R bruta</th>
    <th>T costo</th>
    <th>T p/unitario</th>
    <th>T R bruta</th>
    <th>cant</th>
</tr>

<?php

while($row=mysql_fetch_array($result)){
	$stock=salida_stock( $row["id_articulo"], $fecha_desde, $fecha_hasta );
    echo "<tr>";
    echo '<td>'.$row["marca"].'</td>';
    echo '<td>'.$row["descripcion"].'</td>';
    echo '<td>'.$row["contenido"].'</td>';
    echo '<td>'.$row["presentacion"].'</td>';
    echo '<td>'.$row["clasificacion"].'</td>';
    echo '<td>'.$row["subclasificacion"].'</td>';

    echo '<td>'.$row["costo"].'</td>';
    echo '<td>'.$row["precio_unitario"].'</td>';
    echo '<td>'.($row["precio_unitario"] - $row["costo"]).'</td>';

    echo '<td>'.($row["costo"] * $stock) .'</td>';
    echo '<td>'.($row["precio_unitario"] * $stock).'</td>';
    echo '<td>'.(($row["precio_unitario"] - $row["costo"]) * $stock).'</td>';

    echo '<td>'.$stock.'</td>';
    echo "</tr>".chr(10);
}

#----------------------------------------------------------------------------
#esta funcion devuelve la cantidad de articulos vendidos en un rango de fechas
function salida_stock( $id_articulo, $fecha_desde, $fecha_hasta ){
	$q='select sum(cantidad) from ventas where id_articulos="'.$id_articulo.'" and fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'"';
	$r=mysql_query($q);
	if(mysql_error()){
		echo mysql_error()."<br>";
		echo $q."<br>";
		
	}
	$tot=mysql_result($r,0,0);
	#mysql_resul
	return $tot;
		
}
#----------------------------------------------------------------------------



?>
</table>
</center>