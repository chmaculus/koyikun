<?php

include("ventas_base.php");
include("../../includes/connect.php");
include("../../includes/funciones_varias.php");
include("../../includes/funciones_vendedor.php");

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
<font1>Listado x vendedor</font1>

<form action="<?php echo $_SERVER["SCRIPT_NAME"]; ?>" method="POST">
<font1>Desde:<input type="text" name="fecha_desde" value="<?php if( $_POST["fecha_desde"] ){ echo $_POST["fecha_desde"]; }else{ echo "1/".$mes_anio; } ?>" size="8"></font1>
<font1>Hasta:<input type="text" name="fecha_hasta" value="<?php if( $_POST["fecha_hasta"] ){ echo $_POST["fecha_hasta"]; }else{ echo "31/".$mes_anio; } ?>" size="8"></font1>

<?php
echo '<input type="submit" name="ACEPTAR" value="ACEPTAR"><br>';
echo '</form>';

if( !$_POST["ACEPTAR"] ){
	exit;
}

#$id_sucursal=$_POST["id_sucursal"];
#$sucursal=nombre_sucursal($_POST["id_sucursal"]);

//$total_venta=total( fecha_conv("/",$_POST["fecha_desde"]), fecha_conv("/",$_POST["fecha_hasta"]) );

//echo '<font1>Total Venta desde '.$_POST["fecha_desde"].' Hasta '.$_POST["fecha_hasta"].' '.$total_venta.'</font1><br>';
#echo '<font1>Sucursal: '.$sucursal.'</font1><br>'.chr(13);

$query='select distinct vendedor from ventas where fecha>="'.fecha_conv("/",$_POST["fecha_desde"]).'" and fecha<="'.fecha_conv("/",$_POST["fecha_hasta"]).'"order by vendedor';
$result=mysql_query($query)or die(mysql_error());
?>


<table border="1" class="t1">
<tr>
	<th>N. Vendedor</th>
	<th>Vendedor</th>
	<th>Total</th>
	<th>Dias</th>
	<th>Promedio diario</th>
	<th></th>
</tr><?php echo chr(13);?>

<?php
while($row=mysql_fetch_array($result)){
	$total_vendedor=calcula_total_vendedor( $row["vendedor"], fecha_conv("/",$_POST["fecha_desde"]), fecha_conv("/",$_POST["fecha_hasta"] ));
	$dias_vendedor=dias_vendedor( $row["vendedor"], fecha_conv("/",$_POST["fecha_desde"]), fecha_conv("/",$_POST["fecha_hasta"] ));
	$promedio_diario=$total_vendedor / $dias_vendedor;
	if($promedio_diario<800){
		$rendimiento="Bajo";
	}elseif ($promedio_diario>800){
		$rendimiento="Normal";
	}
	$array_vendedor=nombre_vendedor($row["vendedor"]);
	if($array!="NULL"){
	    $nombre=$array_vendedor["nombres"]." ".$array_vendedor["apellido"];
	}else{
	    $nombre=$row["numero"];
	}
	                                                                                
	echo "<tr>";
	echo '<td>'.$row["vendedor"].'</td>';
	echo '<td>'.$nombre.'</td>';
	echo '<td>'.$total_vendedor.'</td>';
	echo '<td>'.$dias_vendedor.'</td>';
	echo '<td>'.round($promedio_diario,2).'</td>';
	echo '<td>'.$rendimiento.'</td>';
	echo '<td><A HREF="detalle_vendedor_x_marca.php?vendedor='.$row["vendedor"].'&fecha_desde='.fecha_conv("/",$_POST["fecha_desde"]).'&fecha_hasta='.fecha_conv("/",$_POST["fecha_hasta"]).'" onClick="return popup(this, \'notes\')"><button>Marca</button></A></td>';
	echo '<td><A HREF="detalle_vendedor_x_sucursal.php?vendedor='.$row["vendedor"].'&fecha_desde='.fecha_conv("/",$_POST["fecha_desde"]).'&fecha_hasta='.fecha_conv("/",$_POST["fecha_hasta"]).'" onClick="return popup(this, \'notes\')"><button>Sucursal</button></A></td>';
	echo '<td><A HREF="detalle_vendedor_x_dia.php?vendedor='.$row["vendedor"].'&fecha_desde='.fecha_conv("/",$_POST["fecha_desde"]).'&fecha_hasta='.fecha_conv("/",$_POST["fecha_hasta"]).'" onClick="return popup(this, \'notes\')"><button>Detalle x Dia</button></A></td>';
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
function dias_vendedor($vendedor, $fecha_desde, $fecha_hasta){
	$q1='select  distinct fecha from ventas where vendedor="'.$vendedor.'" and fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'"';
	$r=mysql_query($q1);
	$rows=mysql_num_rows($r);
return $rows;
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
