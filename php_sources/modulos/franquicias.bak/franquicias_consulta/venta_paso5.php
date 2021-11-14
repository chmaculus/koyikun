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

include("includes/venta_muestra1.inc.php");

$cod_descuento=get_valor(8);

echo "<br>";
echo "<br>";

if($_GET["vendedor"]=="NO"){
		echo "<alerta1>Debe introducir un numero de vendedor valido</alerta1><br>";
		$tipo_pago=get_ventas_temp_valores2($id_session,1);
		$id_tarjeta=get_ventas_temp_valores2($id_session,2);
		$tarjeta=get_ventas_temp_valores2($id_session,3);
		$pagos=get_ventas_temp_valores2($id_session,4);
	
}

if($_GET["autoriz"]=="NO"){
		echo "<alerta1>El codigo de autorizacion no es valido</alerta1><br>";
		$tipo_pago=get_ventas_temp_valores2($id_session,1);
		$id_tarjeta=get_ventas_temp_valores2($id_session,2);
		$tarjeta=get_ventas_temp_valores2($id_session,3);
		$pagos=get_ventas_temp_valores2($id_session,4);
	
}



if($_GET["tipo_pago"]){
	$tipo_pago=$_GET["tipo_pago"];
}elseif($_POST["tipo_pago"]){
	$tipo_pago=$_POST["tipo_pago"];
}


echo '<form action="venta_paso6_graba.php" method="post">';

echo '<br><table  class="t1">';

echo '<tr><td><font1>vendedor/a: </font1></td>';
echo '<td>';
include("includes/vendedores.inc.php");
echo '</td></tr>';


echo '<tr><td><font1>Descuento: </font1></td>';
echo '<td><input type="text" name="descuento" size="5"></td></tr>';
echo '<tr><td><font1>INGRESO CODIGO DE AUTORIZACION </font1></td>';
echo '<td><input type="text" name="cod_autoriz" size="5"></td> <td>Autorizacion N°</td> <td>'.$cod_descuento.'</td></tr>';
echo '</table><br>';

echo '<input type="hidden" name="tipo_pago" value="'.$tipo_pago.'">';
echo '<input type="hidden" name="id_tarjeta" value="'.$_POST["id_tarjeta"].'">';
echo '<input type="hidden" name="tarjeta" value="'.$_POST["tarjeta"].'">';
echo '<input type="hidden" name="pagos" value="'.$_POST["pagos"].'">';





$array["id_session"]=$id_session;
$array["id"]="1";
$array["descripcion"]="tipo_pago";
$array["valor"]=$tipo_pago;
insert_or_update_ventas_temp_valores($array);

#-------------------------------------------------------------------------------------------------


?>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</table></center>
</form>



