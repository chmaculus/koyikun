<?php
include("../../login/login_verifica.inc.php");
include_once("../seguridad.inc.php"); 

include_once("../../includes/connect.php");
include_once("articulos_base.php");

?>

<center>
<?php
include("connect.php");
$query="select * from pedidos_control limit 0,1000";
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<table class="t1">';
echo "<tr>";
	echo "<th>id</th>";
	echo "<th>empresa</th>";
	echo "<th>responsable</th>";
	echo "<th>importe_pedido</th>";
	echo "<th>fecha_envio</th>";
	echo "<th>rceptor</th>";
	echo "<th>import_recibido_a</th>";
	echo "<th>import_recibido_b</th>";
	echo "<th>fecha_recepcion</th>";
	echo "<th>n_correo</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["empresa"].'</td>';
	echo '<td>'.$row["responsable"].'</td>';
	echo '<td>'.$row["importe_pedido"].'</td>';
	echo '<td>'.$row["fecha_envio"].'</td>';
	echo '<td>'.$row["rceptor"].'</td>';
	echo '<td>'.$row["import_recibido_a"].'</td>';
	echo '<td>'.$row["import_recibido_b"].'</td>';
	echo '<td>'.$row["fecha_recepcion"].'</td>';
	echo '<td>'.$row["n_correo"].'</td>';
	echo "</tr>".chr(10);
}
?>
</table></center>
