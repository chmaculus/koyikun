<?php
include_once("../includes/connect.php");
include("cabecera.inc.php"); 
include_once("../includes/funciones_costos.php");
include_once("../includes/funciones_promocion.php");
include_once("../includes/funciones_precios.php");
include_once("../includes/funciones_valores.php");
include_once("../includes/funciones_varias.php");
include_once("../includes/funciones_ventas.php");
include_once("../includes/funciones_stock.php");
include_once("../includes/funciones_articulos.php");
?>
<body>
<center>
<form action="ventas_update.php" method="post">

<?php

$id_session=$_COOKIE["id_session"];
$id_sucursal=$_COOKIE["id_sucursal"];

$porcentaje_tarjeta=get_valor(7);

$query='select * from ventas_temp2 where id_session="'.$id_session.'" order by marca, clasificacion, subclasificacion, descripcion, contenido, presentacion';

echo $query."<br>";

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

if($_GET["sexo"]=="NO"){
	echo "<alerta1>No ha seleccionado sexo<alerta1><br><br><br>";
}

if($_GET["pais"]=="NO"){
	echo "<alerta1>No ha seleccionado Pais<alerta1><br><br><br>";
}

if($_GET["rango"]=="NO"){
	echo "<alerta1>No ha seleccionado Rango<alerta1><br><br><br>";
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

	#----------------------
	$por_tarj=get_valor(7);
	$total_tarjeta=((($total_contado * $por_tarj) / 100 ) + $total_contado);
echo '<tr>';
echo '<td><input type="radio" name="tipo_pago" value="tarjeta" id="radio08"></td>';
echo '<td><font1>Tarjeta hasta 3 pagos</font1></td>';
echo '<td><font1>$'.round($total_tarjeta,2).'</font1></td>';
echo '<td><font1>3 pagos de $'.round(($total_tarjeta /3),2).'</font1></td>';
echo '</tr>';
	#----------------------

	#----------------------
	$por_tarj=get_valor(10);
	$tarj6=((($total_contado * $por_tarj) / 100 ) + $total_contado);
echo '<tr>';
echo '<td><input type="radio" name="tipo_pago" value="tarj6" id="radio08"></td>';
echo '<td><font1>Tarjeta 6 pagos</font1></td>';
echo '<td><font1>$'.round($tarj6,2).'</font1></td>';
echo '<td><font1>6 pagos de $'.round(($tarj6 /6),2).'</font1></td>';
echo '</tr>';
	#----------------------

echo '</table>';
#-------------------------------------------


#-------------------------------------------
#datos cliente
echo '<br><table  class="t1">';

echo '<tr>';
echo '<td>Sexo</td><td>Masculino<input type="radio" name="sexo" value="m" class="radio01"></td><td>Femenino<input type="radio" name="sexo" value="f" class="radio01"></td>';
echo '</tr>';
echo '<tr>';
echo '<td>Rango de edad</td><td>
<select name="rango">
<option value="0" selected>Seleccione</option>
<option value="1">Menos de 20</option>
<option value="2">Entre 21 y 30</option>
<option value="3">Entre 31 y 45</option>
<option value="4">Entre 36 y 60</option>
<option value="5">Mas de 60</option>
</select>
</td>';
echo '</tr>';

echo '<tr>';
echo '<td>Pais</td>';
echo '<td>
<select name="pais">
<option value="Argentina" selected>Argentina</option>
<option value="Chile">Chile</option>
<option value="Brasil">Brasil</option>
<option value="EEUU">EEUU</option>
<option value="Europa">Europa</option>
<option value="Otro">Otro</option>
</td>';   
echo '</tr>';

echo '</table><br>';
#-------------------------------------------


#-------------------------------------------
#datos cliente
echo 'Obtené mas descuentos!!!<br>';
echo '<br><table  class="t1">';

echo '<tr>';
echo '<td>Nombre</td><td><input type="text" name="nombre" size="30"></td>';   
echo '</tr>';
echo '<tr>';
echo '<td>Celular</td><td><input type="text" name="celular" size="30"></td>';   
echo '</tr>';

echo '<tr>';
echo '<td>Localidad</td><td><input type="text" name="localidad"></td>';   
echo '</tr>';
echo '<tr>';
echo '<td>Provincia</td><td><input type="text" name="provincia" value="Mendoza"></td>';   
echo '</tr>';

echo '</table><br>';
#-------------------------------------------




#-------------------------------------------
echo '<br><table  class="t1">';

echo '<tr><td><font1>vendedor/a: </font1></td>';
echo '<td><input type="text" name="vendedor" size="5"></td></tr>';
echo '<tr><td><font1>Descuento: </font1></td>';
echo '<td><input type="text" name="descuento" size="5"></td></tr>';
echo '</table><br>';

echo '<input type="hidden" name="total_contado" value="'.$total_contado.'">';
echo '<input type="hidden" name="total_tarjeta" value="'.$total_tarjeta.'">';

echo'<input type="submit" name="accion" value="FINALIZAR">';


echo '</form>';
echo '</body>';
echo '</html>';



?>