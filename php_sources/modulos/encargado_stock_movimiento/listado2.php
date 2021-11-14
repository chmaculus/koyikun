<?php
include("cabecera.inc.php");
include("base.php");
include_once("../includes/connect.php");
include_once("../includes/funciones_varias.php");

echo '<center>';
echo '<form action="'.$_SERVER["SCRIPT_NAME"].'" method="post">';
include("fecha_desde_hasta.inc.php");

?>


<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>




<?php

if(!$_POST["fecha_desde"] or !$_POST["fecha_hasta"]){
	exit;
}


$query='select distinct numero_envio, id_origen, id_destino, fecha, hora from stock_movimiento 
						where fecha>="'.fecha_conv("/",$_POST["fecha_desde"]).'"
						and fecha<="'.fecha_conv("/",$_POST["fecha_hasta"]).'"
						order by fecha desc, hora desc
						';

//echo $query."<br>";
						
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<table border="1">';
echo "<tr>";
	echo "<th>numero_envio</th>";
	echo "<th>origen</th>";
	echo "<th>destino</th>";
	echo "<th>fecha</th>";
	echo "<th>hora</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["numero_envio"].'</td>';
	echo '<td>'.nombre_sucursal($row["id_origen"]).'</td>';
	echo '<td>'.nombre_sucursal($row["id_destino"]).'</td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["hora"].'</td>';
	echo '<td><a href="detalle_envio.php?numero_envio='.$row["numero_envio"].'"><button>DETALLE</button></a></td>';
	echo "</tr>".chr(10);
}
?>
</table></center>



