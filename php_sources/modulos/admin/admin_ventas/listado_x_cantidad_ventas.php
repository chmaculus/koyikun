<?php

include("ventas_base.php");
include("../../includes/connect.php");
include("../../includes/funciones_varias.php");

$mes_anio=date("n/Y");


/*
por tipo de pago
estadisticas de vendedores/as
*/

?>

<SCRIPT TYPE="text/javascript">
<!--
function popup(mylink, windowname)
{
if (! window.focus)return true;
var href;
if (typeof(mylink) == 'string')
   href=mylink;
else
   href=mylink.href;
window.open(href, windowname, 'width=750,height=350,scrollbars=yes');
return false;
}
//-->
</SCRIPT>
<center>
<font1>Listado x marca</font1>

<form action="<?php echo $_SERVER["SCRIPT_NAME"]; ?>" method="POST">
<font1>Desde:<input type="text" name="fecha_desde" value="<?php if( $_POST["fecha_desde"] ){ echo $_POST["fecha_desde"]; }else{ echo "1/".$mes_anio; } ?>" size="8"></font1>
<font1>Hasta:<input type="text" name="fecha_hasta" value="<?php if( $_POST["fecha_hasta"] ){ echo $_POST["fecha_hasta"]; }else{ echo "31/".$mes_anio; } ?>" size="8"></font1>

<?php
include("sucursal_select.inc.php");echo "<br>";
echo '<input type="submit" name="ACEPTAR" value="ACEPTAR"><br>';
echo '</form>';

if( !$_POST["ACEPTAR"] ){
	exit;
}

$id_sucursal=$_POST["id_sucursal"];

if($_POST["id_sucursal"]=="TODAS"){
	$sucursal="TODAS";
}else{
	$sucursal=nombre_sucursal($_POST["id_sucursal"]);
}



$total_venta=total( $sucursal, fecha_conv("/",$_POST["fecha_desde"]), fecha_conv("/",$_POST["fecha_hasta"]) );

echo "<br>";
echo '<font1>Total Venta desde '.$_POST["fecha_desde"].' Hasta '.$_POST["fecha_hasta"].' '.$total_venta.'</font1><br>';
echo '<font1>Sucursal: '.$sucursal.'</font1><br>'.chr(13);

if($_POST["id_sucursal"]==""){
	$query='select distinct numero_venta from ventas where fecha>="'.fecha_conv("/",$_POST["fecha_desde"]).'" and fecha<="'.fecha_conv("/",$_POST["fecha_hasta"]).'"order by numero_venta';
}else{
	$query='select distinct numero_venta from ventas where sucursal="'.$sucursal.'" and fecha>="'.fecha_conv("/",$_POST["fecha_desde"]).'" and fecha<="'.fecha_conv("/",$_POST["fecha_hasta"]).'"order by numero_venta';
}
$result=mysql_query($query)or die(mysql_error());
$rows=mysql_num_rows($result);


//echo $query."<br>";


?>


<table border="1" class="t1">
<tr>
	<th>Marca</th>
	<th>Total</th>
	<th></th>
</tr><?php echo chr(13);?>

<?php


$descuentos=calcula_total_ventas_xxx( "Descuento", $sucursal ,fecha_conv("/",$_POST["fecha_desde"]), fecha_conv("/",$_POST["fecha_hasta"] ));
$credito=calcula_total_ventas_xxx( "Dif x financiacion Credito", $sucursal ,fecha_conv("/",$_POST["fecha_desde"]), fecha_conv("/",$_POST["fecha_hasta"] ));
$debito=calcula_total_ventas_xxx( "Dif x financiacion Debito", $sucursal ,fecha_conv("/",$_POST["fecha_desde"]), fecha_conv("/",$_POST["fecha_hasta"] ));
$efectivo=( $rows- ($debito + $credito));

$tot_descuentos=calcula_total_ventas_xxx2( "Descuento", $sucursal ,fecha_conv("/",$_POST["fecha_desde"]), fecha_conv("/",$_POST["fecha_hasta"] ));
$tot_credito=calcula_total_ventas_xxx2( "Dif x financiacion Credito", $sucursal ,fecha_conv("/",$_POST["fecha_desde"]), fecha_conv("/",$_POST["fecha_hasta"] ));
$tot_debito=calcula_total_ventas_xxx2( "Dif x financiacion Debito", $sucursal ,fecha_conv("/",$_POST["fecha_desde"]), fecha_conv("/",$_POST["fecha_hasta"] ));
$tot_efectivo=calcula_total_efectivo($sucursal ,fecha_conv("/",$_POST["fecha_desde"]), fecha_conv("/",$_POST["fecha_hasta"]));

echo '<table border="1">';
echo "<tr>";
echo "<td>cantidad de ventas realizadas:</td><td>".$rows."</td>";
echo "/<tr>";
echo "<tr>";
echo "<td>Descuentos:</td><td>".$descuentos."</td>";
echo "<td> tot Descuentos:</td><td>".$tot_descuentos."</td>";
echo "/<tr>";
echo "<tr>";
echo "<td>Credito:</td><td> ".$credito."</td>";
echo "<td>Credito:</td><td> ".$tot_credito."</td>";
echo "/<tr>";
echo "<tr>";
echo "<td>Debito:</td><td> ".$debito."</td>";
echo "<td>Debito:</td><td> ".$tot_debito."</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Efectivo:</td><td>".$efectivo."</td>";
echo "<td>Efectivo:</td><td>".$tot_efectivo."</td>";
echo "</tr>";
echo "</table>";
exit;


#-----------------------------------------------------------------
function calcula_total_ventas_xxx($marca, $sucursal ,$fecha_desde, $fecha_hasta){
	if($sucursal==""){
		$query='select sum( cantidad ) from ventas where marca="'.$marca.'" and fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'"';
	}else{
		$query='select sum( cantidad ) from ventas where sucursal="'.$sucursal.'" and marca="'.$marca.'" and fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'"';
	}
	
	$result=mysql_query($query)or die(mysql_error());
	$total=mysql_result($result,0);	
return $total;
}				
#-----------------------------------------------------------------

#-----------------------------------------------------------------
function calcula_total_ventas_xxx2($marca, $sucursal ,$fecha_desde, $fecha_hasta){
	if($sucursal==""){
		$query='select sum( cantidad * precio_unitario) from ventas where marca="'.$marca.'" and fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'"';
	}else{
		$query='select sum( cantidad * precio_unitario) from ventas where sucursal="'.$sucursal.'" and marca="'.$marca.'" and fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'"';
	}
	
	$result=mysql_query($query)or die(mysql_error());
	$total=mysql_result($result,0);	
return $total;
}				
#-----------------------------------------------------------------

#-----------------------------------------------------------------
function calcula_total_efectivo($sucursal ,$fecha_desde, $fecha_hasta){
	if($sucursal==""){
		$query='select sum( cantidad * precio_unitario) from ventas where tipo_pago="co" and fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'"';
	}else{
		$query='select sum( cantidad * precio_unitario) from ventas where tipo_pago="co" and sucursal="'.$sucursal.'" and fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'"';
	}
	//echo $query;
	$result=mysql_query($query)or die(mysql_error());
	$total=mysql_result($result,0);	
return $total;
}				
#-----------------------------------------------------------------

#-----------------------------------------------------------------
function valores($numero_venta, $sucursal){
	$query='select * from ventas where numero_venta="'.$numero_venta.'" and sucursal="'.$sucursal.'" limit 0,1';
	$result=mysql_query($query)or die(mysql_error());
	$array=mysql_fetch_array($result);	
return $array;
}				
#-----------------------------------------------------------------


#-----------------------------------------------------------------
function descuento($numero_venta, $sucursal){
	$query='select * from ventas where numero_venta="'.$numero_venta.'" and sucursal="'.$sucursal.'" and descripcion like "Descuento%"';
	$result=mysql_query($query)or die(mysql_error());
	$rows=mysql_num_rows($result);
	if($rows>0){
		return "SI";
	}
	if($rows<1){
		return "NO";
	}
}				
#-----------------------------------------------------------------

#-----------------------------------------------------------------
function total( $sucursal, $fecha_desde, $fecha_hasta ){
	$query='select sum( cantidad * precio_unitario ) from ventas where sucursal="'.$sucursal.'" and fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'"';
	$result=mysql_query($query)or die(mysql_error());
	$total=mysql_result($result,0);	
return $total;
}				
#-----------------------------------------------------------------




?>
</center>
