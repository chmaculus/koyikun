<?php
include_once("tarjetas_base.php");
echo "<br><br>";
?>
<center>
<?php
include_once("../includes/connect.php");
$query="select * from tarjetas limit 0,1000";
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<table class="t1">';
echo "<tr>";
	echo "<th>id</th>";
	echo "<th>tarjeta</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["tarjeta"].'</td>';
	echo '<td><A class="w3-btn w3-purple" HREF="tarjetas_coeficientes_listado.php?id_tarjetas='.$row["id"].'">Coeficientes</A></td>';
	echo '<td><A class="w3-btn w3-purple" HREF="tarjetas_modifica.php?id_tarjetas='.$row["id"].'">Modificar</A></td>';
	echo '<td><A class="w3-btn w3-purple" HREF="tarjetas_eliminar.php?id_tarjetas='.$row["id"].'">Eliminar</A></td>';
	echo "</tr>".chr(10);
}
?>
</table></center>
