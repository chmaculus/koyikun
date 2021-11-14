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

if( !$_POST["ACEPTAR"] OR $_POST["id_sucursal"]=="" ){
	exit;
}

$id_sucursal=$_POST["id_sucursal"];
$sucursal=nombre_sucursal($_POST["id_sucursal"]);

$total_venta=total( $sucursal, fecha_conv("/",$_POST["fecha_desde"]), fecha_conv("/",$_POST["fecha_hasta"]) );

echo '<font1>Total Venta desde '.$_POST["fecha_desde"].' Hasta '.$_POST["fecha_hasta"].' '.$total_venta.'</font1><br>';
echo '<font1>Sucursal: '.$sucursal.'</font1><br>'.chr(13);

$query='select distinct marca from ventas where sucursal="'.$sucursal.'" and fecha>="'.fecha_conv("/",$_POST["fecha_desde"]).'" and fecha<="'.fecha_conv("/",$_POST["fecha_hasta"]).'"order by marca';
$result=mysql_query($query)or die(mysql_error());
?>


<table border="1" class="t1">
<tr>
	<th>Marca</th>
	<th>Total</th>
	<th></th>
</tr><?php echo chr(13);?>

<?php
while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["marca"].'</td>';
	echo '<td>'.calcula_total_marca( $row["marca"], $sucursal ,fecha_conv("/",$_POST["fecha_desde"]), fecha_conv("/",$_POST["fecha_hasta"] )).'</td>';
	echo '<td><A HREF="detalle_marca.php?id_sucursal='.$id_sucursal.'&marca='.$row["marca"].'&fecha_desde='.fecha_conv("/",$_POST["fecha_desde"]).'&fecha_hasta='.fecha_conv("/",$_POST["fecha_hasta"]).'" onClick="return popup(this, \'notes\')"><button>Detalle</button></A></td>';
	echo "</tr>".chr(13);
}


#-----------------------------------------------------------------
function calcula_total_marca($marca, $sucursal ,$fecha_desde, $fecha_hasta){
	$query='select sum( cantidad * precio_unitario ) from ventas where sucursal="'.$sucursal.'" and marca="'.$marca.'" and fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'"';
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
