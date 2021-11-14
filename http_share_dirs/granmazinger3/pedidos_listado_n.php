<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
  <meta content="text/html; charset=UTF-8" http-equiv="content-type" />
  <title>Tablabla pedidos By Christian Máculus</title>
</head>



<center>

<form action="<?php echo $SERVER["SCRIPT_NAME"];?>" method="post">
<input type="submit" name="orden" value="fecham">
<input type="submit" name="orden" value="fechas">
<input type="submit" name="orden" value="marcaf">
<input type="submit" name="orden" value="marcas">
<input type="submit" name="orden" value="sucursalm">
<input type="submit" name="orden" value="sucursalf">


</form>





<?php

if(!$_POST["orden"]){
	exit;
}

include("connect.php");

if($_POST["orden"]=="marcas"){
	$query='select * from pedidos where finalizado="N" order by marca, sucursal';
}

if($_POST["orden"]=="marcaf"){
	$query='select * from pedidos where finalizado="N" order by marca, fecha';
}

if($_POST["orden"]=="sucursalm"){
	$query='select * from pedidos where finalizado="N" order by sucursal, marca, fecha';
}

if($_POST["orden"]=="sucursalf"){
	$query='select * from pedidos where finalizado="N" order by sucursal, fecha';
}

if($_POST["orden"]=="fechas"){
	$query='select * from pedidos where finalizado="N" order by fecha, marca';
}

if($_POST["orden"]=="fecham"){
	$query='select * from pedidos where finalizado="N" order by fecha, sucursal';
}


echo $query;
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<table class="t1">';
echo "<tr>";
	echo "<th>id_articulo</th>";
	echo "<th>numero_pedido</th>";
	echo "<th>marca</th>";
	echo "<th>descripcion</th>";
	echo "<th>contenido</th>";
	echo "<th>presentacion</th>";
	echo "<th>clasificacion</th>";
	echo "<th>subclasificacion</th>";
	echo "<th>cantidad_solicitada</th>";
	echo "<th>sucursal</th>";
	echo "<th>fecha</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["id_articulo"].'</td>';
	echo '<td>'.$row["numero_pedido"].'</td>';
	echo '<td>'.$row["marca"].'</td>';
	echo '<td>'.$row["descripcion"].'</td>';
	echo '<td>'.$row["contenido"].'</td>';
	echo '<td>'.$row["presentacion"].'</td>';
	echo '<td>'.$row["clasificacion"].'</td>';
	echo '<td>'.$row["subclasificacion"].'</td>';
	echo '<td>'.$row["cantidad_solicitada"].'</td>';
	echo '<td>'.$row["sucursal"].'</td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo "</tr>".chr(10);
}
?>
</table></center>



