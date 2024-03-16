<?php
include_once("tarjetas_base.php");

echo '<script language="javascript" src="js/popup.js"></script>';

echo '<center>';

include_once("../includes/connect.php");

#----------------------------------------
#muestra registro ingresado
$query='select * from tarjetas where id="'.$_GET["id_tarjetas"].'"';
$array_tarjetas=mysql_fetch_array(mysql_query($query));
if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}

echo '<table border="1">';
	echo '<tr>';
		echo '<th>id</th>';
		echo '<th>tarjeta</th>';
	echo '</tr>';
	echo '<tr>';
		echo '<td>'.$array_tarjetas["id"].'</td>';
		echo '<td>'.$array_tarjetas["tarjeta"].'</td>';
	echo '</tr>';
echo "</table>";
#----------------------------------------

$url= 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?id_tarjetas='.$_GET["id_tarjetas"];
//$url=base64_encode($url);

echo '<a class="w3-btn w3-purple" href="'.$url.'"><button>Recargar</button></a>';
echo '<a class="w3-btn w3-purple" href="tarjetas_coeficientes_modifica.php?id_tarjeta='.$array_tarjetas["id"].'" onClick="return popup(this, \'notes\')"><button>Nuevo coeficiente</button></a>';


$query='select * from tarjetas_coeficientes where id_tarjeta="'.$_GET["id_tarjetas"].'" order by coeficiente limit 0,1000';
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<table class="t1">';
echo "<tr>";
	echo "<th>cantidad_pagos</th>";
	echo "<th>coeficiente</th>";
	echo "<th>fecha</th>";
	echo "<th>hora</th>";
echo "</tr>";



while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["cantidad_pagos"].'</td>';
	echo '<td>'.$row["coeficiente"].'</td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["hora"].'</td>';
	echo '<td><A class="w3-btn w3-purple" HREF="tarjetas_coeficientes_modifica.php?id_tarjetas_coeficientes='.$row["id"].'&tarjeta='.base64_encode($array_tarjetas["tarjeta"]).'" onClick="return popup(this, \'notes\')">Modificar</A></td>';
	echo '<td><A class="w3-btn w3-purple" HREF="tarjetas_coeficientes_eliminar.php?id_tarjetas_coeficientes='.$row["id"].'&tarjeta='.base64_encode($array_tarjetas["tarjeta"]).'" onClick="return popup(this, \'notes\')">Eliminar</A></td>';
	echo "</tr>".chr(10);
}


?>
</table></center>
