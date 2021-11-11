<?php
include("../../login/login_verifica.inc.php");
$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a administrador
if($jerarquia!="1"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 

include_once("../../includes/connect.php");
include_once("pedidos_control_base.php");

$query='select * from pedidos_proveedor where numero_pedido="'.$_GET["numero_pedido"].'" limit 0,1000';
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}

echo '<center><br><font size="10">Se enviará el siguiente pedido</font><br>';

echo '<table class="t1">';
echo "<tr>";
	echo "<th>id</th>";
	echo "<th>id_articulo</th>";
	echo "<th>numero_pedido</th>";
	echo "<th>marca</th>";
	echo "<th>descripcion</th>";
	echo "<th>contenido</th>";
	echo "<th>presentacion</th>";
	echo "<th>clasificacion</th>";
	echo "<th>subclasificacion</th>";
	echo "<th>cantidad_solicitada</th>";
	echo "<th>cantidad_recibida</th>";
	echo "<th>sucursal</th>";
	echo "<th>fecha</th>";
	echo "<th>hora</th>";
	echo "<th>finalizado</th>";
	echo "<th>fecha_envio</th>";
	echo "<th>hora_envio</th>";
	echo "<th>stock</th>";
	echo "<th>costo</th>";
	echo "<th>total_pedir</th>";
	echo "<th>enviado</th>";
	echo "<th>fecha_enviado</th>";
	echo "<th>hora_enviado</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["id_articulo"].'</td>';
	echo '<td>'.$row["numero_pedido"].'</td>';
	echo '<td>'.$row["marca"].'</td>';
	echo '<td>'.$row["descripcion"].'</td>';
	echo '<td>'.$row["contenido"].'</td>';
	echo '<td>'.$row["presentacion"].'</td>';
	echo '<td>'.$row["clasificacion"].'</td>';
	echo '<td>'.$row["subclasificacion"].'</td>';
	echo '<td>'.$row["cantidad_solicitada"].'</td>';
	echo '<td>'.$row["cantidad_recibida"].'</td>';
	echo '<td>'.$row["sucursal"].'</td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["hora"].'</td>';
	echo '<td>'.$row["finalizado"].'</td>';
	echo '<td>'.$row["fecha_envio"].'</td>';
	echo '<td>'.$row["hora_envio"].'</td>';
	echo '<td>'.$row["stock"].'</td>';
	echo '<td>'.$row["costo"].'</td>';
	echo '<td>'.$row["total_pedir"].'</td>';
	echo '<td>'.$row["enviado"].'</td>';
	echo '<td>'.$row["fecha_enviado"].'</td>';
	echo '<td>'.$row["hora_enviado"].'</td>';
	echo "</tr>".chr(10);
}
?>
</table>

<form method="POST" action="pedido_enviar_update.php">
<BR><table class="t1">
<tr>
<input type="hidden" name="id_pedido_control" value="<?php echo $_GET["id_pedidos_control"];?>">

<td>Responsable</td><td><input type="text" name="responsable"></td>
</tr>
</table><BR>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>




</center>
