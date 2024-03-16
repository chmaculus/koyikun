<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
  <meta content="text/html; charset=UTF-8" http-equiv="content-type" />
  <title>Tablabla codigos_autorizados By Christian Máculus</title>
</head>



<center>
<?php
include("connect.php");
$query="select * from codigos_autorizados limit 0,1000";
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<table class="t1">';
echo "<tr>";
	echo "<th>id</th>";
	echo "<th>id_servicio</th>";
	echo "<th>tipo</th>";
	echo "<th>codigo</th>";
	echo "<th>fecha</th>";
	echo "<th>hora</th>";
	echo "<th>fecha_vigencia</th>";
	echo "<th>fecha_caducidad</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["id_servicio"].'</td>';
	echo '<td>'.$row["tipo"].'</td>';
	echo '<td>'.$row["codigo"].'</td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["hora"].'</td>';
	echo '<td>'.$row["fecha_vigencia"].'</td>';
	echo '<td>'.$row["fecha_caducidad"].'</td>';
	echo "</tr>".chr(10);
}
?>
</table></center>
