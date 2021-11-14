<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type" />
  <title>Tablabla clientes_persona2 By Christian Máculus</title>
</head>



<center>
<?php
include("connect.php");
$query="select * from clientes_persona2 limit 0,1000";
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<table class="t1">';
echo "<tr>";
	echo "<th>id</th>";
	echo "<th>uuid</th>";
	echo "<th>apellido</th>";
	echo "<th>nombres</th>";
	echo "<th>dni</th>";
	echo "<th>estado_civil</th>";
	echo "<th>telefono</th>";
	echo "<th>celular</th>";
	echo "<th>email</th>";
	echo "<th>web</th>";
	echo "<th>calle</th>";
	echo "<th>numero</th>";
	echo "<th>piso</th>";
	echo "<th>dpto</th>";
	echo "<th>localidad</th>";
	echo "<th>departamento</th>";
	echo "<th>provincia</th>";
	echo "<th>pais</th>";
	echo "<th>profesion</th>";
	echo "<th>observaciones</th>";
	echo "<th>usa_tarjeta</th>";
	echo "<th>vendedor</th>";
	echo "<th>sucursal</th>";
	echo "<th>nombre_comercio</th>";
	echo "<th>tel_comercial</th>";
	echo "<th>dom_comercial</th>";
	echo "<th>localidad_comercio</th>";
	echo "<th>dpto_comercio</th>";
	echo "<th>calle_comercio</th>";
	echo "<th>numero_comercio</th>";
	echo "<th>piso_comercio</th>";
	echo "<th>provincia_comercio</th>";
	echo "<th>pais_comercio</th>";
	echo "<th>carnet</th>";
	echo "<th>codigo_barras</th>";
	echo "<th>fecha_entrega</th>";
	echo "<th>radio</th>";
	echo "<th>canal</th>";
	echo "<th>programas</th>";
	echo "<th>fecha</th>";
	echo "<th>hora</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["uuid"].'</td>';
	echo '<td>'.$row["apellido"].'</td>';
	echo '<td>'.$row["nombres"].'</td>';
	echo '<td>'.$row["dni"].'</td>';
	echo '<td>'.$row["estado_civil"].'</td>';
	echo '<td>'.$row["telefono"].'</td>';
	echo '<td>'.$row["celular"].'</td>';
	echo '<td>'.$row["email"].'</td>';
	echo '<td>'.$row["web"].'</td>';
	echo '<td>'.$row["calle"].'</td>';
	echo '<td>'.$row["numero"].'</td>';
	echo '<td>'.$row["piso"].'</td>';
	echo '<td>'.$row["dpto"].'</td>';
	echo '<td>'.$row["localidad"].'</td>';
	echo '<td>'.$row["departamento"].'</td>';
	echo '<td>'.$row["provincia"].'</td>';
	echo '<td>'.$row["pais"].'</td>';
	echo '<td>'.$row["profesion"].'</td>';
	echo '<td>'.$row["observaciones"].'</td>';
	echo '<td>'.$row["usa_tarjeta"].'</td>';
	echo '<td>'.$row["vendedor"].'</td>';
	echo '<td>'.$row["sucursal"].'</td>';
	echo '<td>'.$row["nombre_comercio"].'</td>';
	echo '<td>'.$row["tel_comercial"].'</td>';
	echo '<td>'.$row["dom_comercial"].'</td>';
	echo '<td>'.$row["localidad_comercio"].'</td>';
	echo '<td>'.$row["dpto_comercio"].'</td>';
	echo '<td>'.$row["calle_comercio"].'</td>';
	echo '<td>'.$row["numero_comercio"].'</td>';
	echo '<td>'.$row["piso_comercio"].'</td>';
	echo '<td>'.$row["provincia_comercio"].'</td>';
	echo '<td>'.$row["pais_comercio"].'</td>';
	echo '<td>'.$row["carnet"].'</td>';
	echo '<td>'.$row["codigo_barras"].'</td>';
	echo '<td>'.$row["fecha_entrega"].'</td>';
	echo '<td>'.$row["radio"].'</td>';
	echo '<td>'.$row["canal"].'</td>';
	echo '<td>'.$row["programas"].'</td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["hora"].'</td>';
	echo "</tr>".chr(10);
}
?>
</table></center>
