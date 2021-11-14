<?php
include("cabecera.inc.php");
echo "<center>";

include("../includes/connect.php");


if($_POST["id_articulos"]){
	$id_articulos=$_POST["id_articulos"];
}
if($_GET["id_articulos"]){
	$id_articulos=$_GET["id_articulos"];
}


echo '<form action="'.$_SERVER["SCRIPT_NAME"].'" method="post">';
echo '<select name="id_sucursal">';
include_once("../includes/select_sucursal.inc.php");
echo '</select>';
echo '<input type="hidden" name="id_articulos" value="'.$id_articulos.'">';
echo '<input type="submit" name="ACEPTAR" value="ACEPTAR">';
echo '</form>';

echo "<br>";

#----------------------------------------
#muestra registro ingresado
$query='select * from articulos where id="'.$id_articulos.'"';
$array_articulos=mysql_fetch_array(mysql_query($query));
if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
#----------------------------------------



#----------------------------------------
echo '<table border="1">';
	echo '<tr>';
		echo '<th>id</th>';
		echo '<th>codigo_interno</th>';
		echo '<th>marca</th>';
		echo '<th>descripcion</th>';
		echo '<th>contenido</th>';
		echo '<th>presentacion</th>';
		echo '<th>codigo_barra</th>';
		echo '<th>fecha</th>';
		echo '<th>hora</th>';
		echo '<th>clasificacion</th>';
		echo '<th>subclasificacion</th>';
		echo '<th>id_web</th>';
		echo '<th>publicar_web</th>';
		echo '<th>discontinuo</th>';
	echo '</tr>';
	echo '<tr>';
		echo '<td>'.$array_articulos["id"].'</td>';
		echo '<td>'.$array_articulos["codigo_interno"].'</td>';
		echo '<td>'.$array_articulos["marca"].'</td>';
		echo '<td>'.$array_articulos["descripcion"].'</td>';
		echo '<td>'.$array_articulos["contenido"].'</td>';
		echo '<td>'.$array_articulos["presentacion"].'</td>';
		echo '<td>'.$array_articulos["codigo_barra"].'</td>';
		echo '<td>'.$array_articulos["fecha"].'</td>';
		echo '<td>'.$array_articulos["hora"].'</td>';
		echo '<td>'.$array_articulos["clasificacion"].'</td>';
		echo '<td>'.$array_articulos["subclasificacion"].'</td>';
		echo '<td>'.$array_articulos["id_web"].'</td>';
		echo '<td>'.$array_articulos["publicar_web"].'</td>';
		echo '<td>'.$array_articulos["discontinuo"].'</td>';
	echo '</tr>';
echo "</table>";
#----------------------------------------
















if(!$_POST["id_sucursal"]){
	echo "<font1>Seleccione sucursal<font1>";
	exit;
}



$query='select * from seguimiento_stock where id_articulo="'.$id_articulos.'" and ( origen="'.$_POST["id_sucursal"].'" or destino="'.$_POST["id_sucursal"].'") order by fecha, hora';
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<table class="t1">';
echo "<tr>";
	echo "<th>id</th>";
	echo "<th>id_articulo</th>";
	echo "<th>stock_anterior</th>";
	echo "<th>stock_nuevo</th>";
	echo "<th>tipo</th>";
	echo "<th>origen</th>";
	echo "<th>destino</th>";
	echo "<th>fecha</th>";
	echo "<th>hora</th>";
	echo "<th>cantidad</th>";
	echo "<th>numero_venta</th>";
	echo "<th>vendedor</th>";
	echo "<th>envio</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["id_articulo"].'</td>';
	echo '<td>'.$row["stock_anterior"].'</td>';
	echo '<td>'.$row["stock_nuevo"].'</td>';
	echo '<td>'.$row["tipo"].'</td>';
	echo '<td>'.$row["origen"].'</td>';
	echo '<td>'.$row["destino"].'</td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["hora"].'</td>';
	echo '<td>'.$row["cantidad"].'</td>';
	echo '<td>'.$row["numero_venta"].'</td>';
	echo '<td>'.$row["vendedor"].'</td>';
	echo '<td>'.$row["envio"].'</td>';
	echo "</tr>".chr(10);
}
?>
</table></center>
