<?php


include_once("../../includes/connect.php");
include_once("../../includes/funciones_varias.php");
include_once("../../includes/funciones_articulos.php");
include_once("cabecera.inc.php");
//include_once("../../login/login_verifica.inc.php");







echo '<table class="t1">';
echo "<tr>";
	echo "<th>id_articulo</th>";
	echo "<th>num ped</th>";
	echo "<th>marca</th>";
	echo "<th>descripcion</th>";
	echo "<th>contenido</th>";
	echo "<th>presentacion</th>";
	echo "<th>clasificacion</th>";
	echo "<th>subclasificacion</th>";
	echo "<th>cant solic.</th>";
	echo "<th>cant rec</th>";
	echo "<th>suc</th>";
	echo "<th>fecha</th>";
	echo "<th>hora</th>";
	echo "<th>finalizado</th>";
	echo "<th>fecha_envio</th>";
	echo "<th>hora_envio</th>";
	echo "<th>fecha prep</th>";
	echo "<th>fecha transito</th>";
	echo "<th>fecha recibido</th>";
	echo "<th>hora_ped_rec</th>";
	echo "<th>hora_ped_prep</th>";
	echo "<th>hora_ped_tran</th>";
	echo "<th>responsable</th>";
	echo "<th>zona</th>";
	echo "<th>color</th>";
	echo "<th>cajon</th>";
echo "</tr>";


$q='select * from pedidos  where estado="Preparado" and finalizado="S" and cajon="'.$_GET["cajon"].'" order by marca, clasificacion, subclasificacion, color';

echo $q."<br>";
$result=mysql_query($q);
if(mysql_error()){echo mysql_error();}


echo "rows: ".mysql_num_rows($result);


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
	echo '<td>'.$row["cantidad_recibida"].'</td>';
	echo '<td>'.$row["sucursal"].'</td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["hora"].'</td>';
	echo '<td>'.$row["finalizado"].'</td>';
	echo '<td>'.$row["fecha_envio"].'</td>';
	echo '<td>'.$row["hora_envio"].'</td>';
	echo '<td>'.$row["fecha_ped_prep"].'</td>';
	echo '<td>'.$row["fecha_ped_tran"].'</td>';
	echo '<td>'.$row["fecha_ped_rec"].'</td>';
	echo '<td>'.$row["hora_ped_rec"].'</td>';
	echo '<td>'.$row["hora_ped_prep"].'</td>';
	echo '<td>'.$row["hora_ped_tran"].'</td>';
	echo '<td>'.$row["responsable"].'</td>';
	echo '<td>'.$row["zona"].'</td>';
	echo '<td>'.$row["color"].'</td>';
	echo '<td>'.$row["cajon"].'</td>';
	echo "</tr>".chr(10);
}
?>
</table></center>

