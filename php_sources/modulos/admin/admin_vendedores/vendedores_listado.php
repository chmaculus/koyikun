<?php
include("vendedores_base.php"); 
?>

<center>
<?php
include("../../includes/connect.php");
$query="select * from vendedores order by apellido, nombres limit 0,10000";
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<table class="t1">';
echo "<tr>";
	echo "<th>ID</th>";
	echo "<th>id_legajo</th>";
	echo "<th>numero</th>";
	echo "<th>apellido</th>";
	echo "<th>nombres</th>";
	echo "<th>Localidad</th>";
	echo "<th>fecha</th>";
	echo "<th>hora</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["id_legajo"].'</td>';
	echo '<td>'.$row["numero"].'</td>';
	echo '<td>'.$row["apellido"].'</td>';
	echo '<td>'.$row["nombres"].'</td>';
	echo '<td>'.$row["localidad"].'</td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["hora"].'</td>';
	echo '<td><a href="vendedores_input_modify.php?id_vendedores='.$row["id"].'"><button>MODIFICAR</button></a></td>';
	echo "</tr>".chr(10);
}
?>
</table></center>
