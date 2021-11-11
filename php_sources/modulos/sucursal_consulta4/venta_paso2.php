<?php
/*
	paso tipo de pago
*/

include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");

#jrarquia 0 coresponde a administrador
if($jerarquia!="2"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 

include_once("../../includes/funciones_costos.php");
include_once("../../includes/funciones_precios.php");
include_once("../../includes/funciones_promocion.php");
include_once("../../includes/funciones_valores.php");
include_once("../../includes/funciones_varias.php");
include_once("../../includes/funciones_ventas.php");
include_once("../../includes/funciones_stock.php");
include_once("../../includes/funciones_articulos.php");
//include_once("includes/funciones_promocion.php");

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

if($_GET["pago"]=="NO"){
	echo "<br>debe seleccionar el tipo de pago<br>";
}

include("includes/venta_muestra1.inc.php");

echo "<br>";

echo '<form method="POST" action="venta_paso3.php">';

echo '<table class="t1">';

echo '<tr>';
echo '<td><input type="radio" name="tipo_pago" value="contado" id="radio08"></td>';
echo '<td><font1>Contado</font1></td>';
echo '<td><font1>$'.$total_contado.'</font1></td>';
echo '</tr>';

echo '<tr>';
echo '<td><input type="radio" name="tipo_pago" value="debito" id="radio08"></td>';
echo '<td><font1>Débito</font1></td>';
echo '<td><font1>$'.$total_contado.'</font1></td>';
echo '</tr>';

echo '<tr>';
echo '<td><input type="radio" name="tipo_pago" value="tarjeta" id="radio08"></td>';
echo '<td><font1>Tarjeta</font1></td>';
echo '<td><font1>Ver cantidad de pagos</font1></td>';
echo '</tr>';
echo '</table>';

echo "<br>";
echo '<input type="submit" name="ACEPTAR" value="ACEPTAR">';
echo "</form>";

?>