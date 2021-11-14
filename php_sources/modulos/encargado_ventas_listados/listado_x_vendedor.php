<?php

include("cabecera.inc.php");
include("../../includes/connect.php");
include("../../includes/funciones_varias.php");

$fecha=date("Y-n-d");

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
<font1>Listado x vendedor</font1><br>

<?php

$id_sucursal=$_COOKIE["id_sucursal"];
$sucursal=nombre_sucursal($id_sucursal);

$total_venta=total( fecha_conv("/",$_POST["fecha_desde"]), fecha_conv("/",$_POST["fecha_hasta"]) );

echo '<font1>Sucursal: '.$sucursal.'</font1><br>'.chr(13);
echo '<font1>fecha: '.fecha_conv("-",$fecha).'</font1><br>'.chr(13);

$query='select distinct vendedor from ventas where fecha="'.$fecha.'" and sucursal="'.$sucursal.'" order by vendedor';
$result=mysql_query($query)or die(mysql_error());
?>


<table border="1" class="t1">
<tr>
	<th>Vendedor</th>
	<th>Total</th>
	<th></th>
</tr><?php echo chr(13);?>

<?php
while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["vendedor"].'</td>';
	echo '<td>'.calcula_total_vendedor( $row["vendedor"], $fecha, $fecha ).'</td>';
	echo '<td><A HREF="detalle_vendedor_x_marca.php?vendedor='.$row["vendedor"].'&fecha_desde='.$fecha.'&fecha_hasta='.$fecha.'" onClick="return popup(this, \'notes\')"><button>Marca</button></A></td>';
	echo "</tr>".chr(13);
}


#-----------------------------------------------------------------
function calcula_total_vendedor($vendedor, $fecha_desde, $fecha_hasta){
	$query='select sum( cantidad * precio_unitario ) from ventas where vendedor="'.$vendedor.'" and fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'"';
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
function total( $fecha_desde, $fecha_hasta ){
	$query='select sum( cantidad * precio_unitario ) from ventas where fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'"';
	$result=mysql_query($query)or die(mysql_error());
	$total=mysql_result($result,0);	
return $total;
}				
#-----------------------------------------------------------------




?>
</center>
