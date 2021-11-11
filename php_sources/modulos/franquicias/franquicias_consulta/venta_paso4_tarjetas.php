<?php
include_once("../includes/connect.php");
include_once("../login/login_verifica.inc.php");

include_once("../includes/seguridad_franquicia.inc.php");


include_once("../includes/funciones_costos.php");
include_once("../includes/funciones_promocion.php");
include_once("../includes/funciones_valores.php");
include_once("../includes/funciones_precios.php");
include_once("../includes/funciones_varias.php");
include_once("../includes/funciones_ventas.php");
include_once("../includes/funciones_stock.php");
include_once("../includes/funciones_articulos.php");

$query='select * from ventas_temp2 where id_session="'.$id_session.'" order by marca, clasificacion, subclasificacion, contenido, presentacion';
$result=mysql_query($query) or die(mysql_error());
$rows=mysql_num_rows($result);
if($rows<1){
	Header ("location: index.php");
}


include("cabecera.inc.php");
?>
<body>
<center>


<?php
$id_session=$_COOKIE["id_session"];
$id_sucursal=$_COOKIE["id_sucursal"];

include("includes/venta_muestra1.inc.php");

echo "<br>";

#-----------------------------------------------------------------------------------------
if(!$_POST["id_tarjeta"]){
	echo '<titulo>Seleccione tarjeta</titulo><br>';
	echo '<table border="1">';
	echo '<form method="POST" action="venta_paso4_tarjetas.php">';

	$q='select * from koyikun.tarjetas';
	$r=mysql_query($q);
	while($row=mysql_fetch_array($r)){
		echo "<tr>";
		echo '<td><input type="radio" name="id_tarjeta" value="'.$row["id"].'"></td><td>'.$row["tarjeta"].'</td>';
		echo "</tr>";
	}

	echo "</table>";
	echo '<input type="hidden" name="tipo_pago" value="'.$_GET["tipo_pago"].'">';
	echo '<input type="submit" name="ACEPTAR" value="ACEPTAR">';
	echo "</form>";
	exit;
}
#-----------------------------------------------------------------------------------------


$total_venta=calcula_total_venta2($id_session);

echo "<font3>total venta: ".$total_contado."</font3><br><br>";

#----------------------------------------
$query='select * from koyikun.tarjetas where id="'.$_POST["id_tarjeta"].'"';
$array_tarjetas=mysql_fetch_array(mysql_query($query));
if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
#----------------------------------------

echo '<font3>'.$array_tarjetas["tarjeta"]."</font3><br><br>";


$query='select * from koyikun.tarjetas_coeficientes where id_tarjeta="'.$_POST["id_tarjeta"].'" limit 0,1000';
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<table class="t1">';
echo "<tr>";
	echo "<th></th>";
	echo "<th>Tarjeta</th>";
	echo "<th>Cantidad de pagos</th>";
	echo "<th>Total financiado</th>";
	echo "<th>Valor cuota</th>";
echo "</tr>";


echo '<form method="POST" action="venta_paso5.php">';
while($row=mysql_fetch_array($result)){
	$tot=($total_contado*$row["coeficiente"]);
	$aa=($tot / $row["cantidad_pagos"]);
	echo "<tr>";
	echo '<td><input type="radio" name="pagos" value="'.$row["cantidad_pagos"].'"></td>';
	echo '<td>'.$array_tarjetas["tarjeta"].'</td>';
	echo '<td>'.$row["cantidad_pagos"].'</td>';
	echo '<td>'.round($tot,2).'</td>';
	echo '<td>'.$row["cantidad_pagos"].' x $'.round($aa,2).'</td>';
	echo "</tr>".chr(10);
}

echo '</table>';

echo '<input type="hidden" name="tipo_pago" value="'.$_POST["tipo_pago"].'">';
echo '<input type="hidden" name="id_tarjeta" value="'.$_POST["id_tarjeta"].'">';
echo '<input type="hidden" name="tarjeta" value="'.$array_tarjetas["tarjeta"].'">';
echo '<input type="submit" name="ACEPTAR" value="ACEPTAR">';

echo '</form>';



#-----------------------------------------------------------------
function calcula_total_venta2($id_session){
	$q='select sum(cantidad * precio) from ventas_temp2 where id_session="'.$id_session.'"';
#	echo  $q."<br>";
	$tot=mysql_result(mysql_query($q),0,1);
#	echo $tot."<br>";
	return $tot;
}
#-----------------------------------------------------------------


?>
</table></center>




