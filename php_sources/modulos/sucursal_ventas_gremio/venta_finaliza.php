<?php
include_once("../../includes/connect.php");
include("cabecera.inc.php"); 
include_once("../../includes/funciones_costos.php");
include_once("../../includes/funciones_promocion.php");
include_once("../../includes/funciones_precios.php");
include_once("../../includes/funciones_valores.php");
include_once("../../includes/funciones_varias.php");
include_once("../../includes/funciones_ventas.php");
include_once("../../includes/funciones_stock.php");
include_once("../../includes/funciones_articulos.php");
?>
<body>
<center>
<form action="ventas_update.php" method="post">

<?php

$id_session=$_COOKIE["id_session"];
$id_sucursal=$_COOKIE["id_sucursal"];

$porcentaje_tarjeta=get_valor(7);

$query='select * from ventas_temp2 where id_session="'.$id_session.'" order by marca, clasificacion, subclasificacion, descripcion, contenido, presentacion';
$result=mysql_query($query) or die(mysql_error());
//echo $query;
$rows=mysql_num_rows($result);
if($rows<1){ exit; }

if($_GET["autoriz"]=="NO"){
	echo "<alerta1>El codigo de autorizacion no coincide<alerta1><br><br><br>";
}

if($_GET["pago"]=="NO"){
	echo "<alerta1>No ha seleccionado una forma de pago<alerta1><br><br><br>";
}

?>
<table class="t1">
<tr>
	<th>Cantidad</th>
	<th>descripcion</th>
	<th>Precio unitario</th>
	<th>Sub-Total contado</th>
	<th>Precio Tarjeta</th>
	<th>Sub-total tarjeta</th>
</tr>
<?php


while($row=mysql_fetch_array($result)){
	$array_articulos=detalle_articulo($row["id_articulos"]);

	$array_precios=precio_sucursal($row["id_articulos"], $id_sucursal);
	if($array_precios["rows"]<1){
		$array_precios=precio_sucursal($row["id_articulos"], 1);
	}
	
	
	//echo "query: ".$array_precios["query"];

	$contado=$array_precios["precio_base"];
	$tarjeta=( ( $array_precios["precio_base"] * $porcentaje_tarjeta ) / 100 ) + $array_precios["precio_base"];

	$promocion="";
	$tr='<tr>';

	if($array_precios["promocion"]=="S"){
		$array_promocion=get_promo( $row["id_articulos"], $id_sucursal );
		$promo=$array_promocion["precio_promocion"];
		$contado=$array_promocion["precio_promocion"];

		$contado = $promo;
		$tarjeta=$promo * ( $porcentaje_tarjeta / 100 ) + $promo;
		$promocion="  **PROMO AF**";
		$tr='<tr class="special">';
	}

	echo $tr;

	echo "<td>".$row["cantidad"]."</td>";
	echo "<td>".$array_articulos["descripcion"]." - ".$array_articulos["clasificacion"]." - ".$array_articulos["subclasificacion"].$promocion."</td>";
	echo "<td>".$contado."</td>";
	echo "<td>".( $contado * $row["cantidad"] )."</td>";
	echo "<td>".$tarjeta."</td>";
	echo "<td>".($tarjeta * $row["cantidad"] )."</td>";
	$total_contado=$total_contado + ( $contado * $row["cantidad"] ); 
	$total_tarjeta=$total_tarjeta + ( $tarjeta * $row["cantidad"] ); 
	echo "</tr>".chr(13);
}
#-------------------------------------------------------------------

$cod_descuento=get_valor(8);

echo '<tr><td></td><td>Totales:</td><td></td><td>'.$total_contado.'</td><td></td><td>'.$total_tarjeta.'</td></tr>';
echo '</table>';

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
echo '<td><font1>$'.$total_tarjeta.'</font1></td>';
echo '</tr>';

echo '</table>';

echo '<br><table  class="t1">';

echo '<tr><td><font1>vendedor/a: </font1></td>';
echo '<td><input type="text" name="vendedor" size="5"></td></tr>';
echo '<tr><td><font1>Descuento: </font1></td>';
echo '<td><input type="text" name="descuento" size="5"></td></tr>';
echo '<tr><td><font1>INGRESO CODIGO DE AUTORIZACION </font1></td>';
echo '<td><input type="text" name="cod_autoriz" size="5"></td> <td>Autorizacion N°</td> <td>'.$cod_descuento.'</td></tr>';
echo '</table><br>';

echo '<input type="hidden" name="total_contado" value="'.$total_contado.'">';
echo '<input type="hidden" name="total_tarjeta" value="'.$total_tarjeta.'">';

echo'<input type="submit" name="accion" value="FINALIZAR">';


echo '</form>';
echo '</body>';
echo '</html>';



?>