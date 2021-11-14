<?php
include_once("tarjetas_base.php");

echo '<script language="javascript" src="js/popup.js"></script>';

echo '<center>';

include_once("../includes/connect.php");

echo '<form action="'.$_SERVER["SCRIPT_NAME"].'" method="post">';
echo '<table border="1">';

echo '<tr>';
echo '	<td>Seleccione tarjeta</td>';

echo '	<td>';
	include_once("tarjetas_select.inc.php");
echo '	</td>';
echo '</tr>';

echo '<tr>';
echo '	<td>Ingrese el monto en ejectivo</td>';

echo '	<td>';
	echo '<input type="text" name="efectivo" value="'.$_POST["efectivo"].'">';
echo '	</td>';
echo '</tr>';

echo '</table>';
ECHO '<input type="submit" name="ACEPTAR" value="ACEPTAR">';
echo '</form><br>';

//////////////////////////////////////////////


if(!$_POST["tarjetas"] OR $_POST["tarjetas"]==""){
	exit;
}

echo "Monto: $".$_POST["efectivo"]."<br><br>";

#----------------------------------------
#muestra registro ingresado
$query='select * from tarjetas where id="'.$_POST["tarjetas"].'"';
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
echo "</table><br>";
#----------------------------------------


$query='select * from tarjetas_coeficientes where id_tarjeta="'.$_POST["tarjetas"].'" order by coeficiente limit 0,1000';
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<table class="t1">';
echo "<tr>";
	echo "<th>cantidad_pagos</th>";
	echo "<th>coeficiente</th>";
echo "</tr>";



while($row=mysql_fetch_array($result)){
	$valor_financiado=round(($_POST["efectivo"] * $row["coeficiente"] ),2);
	$valor_cuota=round(($valor_financiado / $row["cantidad_pagos"]),2);
	echo "<tr>";
	echo '<td>'.$row["cantidad_pagos"].'</td>';
	echo '<td>'.$row["coeficiente"].'</td>';
	echo '<td>'.$valor_financiado.'</td>';
	echo '<td>'.$row["cantidad_pagos"].' x $'.str_replace(".",",",$valor_cuota).'.-</td>';
	echo "</tr>".chr(10);
}


?>
</table></center>
