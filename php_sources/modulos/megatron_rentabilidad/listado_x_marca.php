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
if($_POST["id_sucursal"]=="TODAS"){
    $sucursal="TODAS";
}else{
    $sucursal=nombre_sucursal($_POST["id_sucursal"]);
}


echo '<font1>Total Venta desde '.$_POST["fecha_desde"].' Hasta '.$_POST["fecha_hasta"].'</font1><br>';
echo '<font1>Sucursal: '.$sucursal.'</font1><br>'.chr(13);

if($sucursal=="TODAS"){
    $query='select distinct marca from ventas where fecha>="'.fecha_conv("/",$_POST["fecha_desde"]).'" and fecha<="'.fecha_conv("/",$_POST["fecha_hasta"]).'"order by marca';
}else{
    $query='select distinct marca from ventas where sucursal="'.$sucursal.'" and fecha>="'.fecha_conv("/",$_POST["fecha_desde"]).'" and fecha<="'.fecha_conv("/",$_POST["fecha_hasta"]).'"order by marca';
}

$result=mysql_query($query)or die(mysql_error());
?>


<table border="1" class="t1">
<tr>
	<th>Marca</th>
	<th>Total</th>
	<th>Tot cos</th>
	<th>T bruto</th>
	<th></th>
</tr><?php echo chr(13);?>

<?php
while($row=mysql_fetch_array($result)){
	$total_marca=calcula_total_marca( $row["marca"], $sucursal ,fecha_conv("/",$_POST["fecha_desde"]), fecha_conv("/",$_POST["fecha_hasta"] ));
	$total_marca_costo=calcula_total_marca_costo( $row["marca"], $sucursal ,fecha_conv("/",$_POST["fecha_desde"]), fecha_conv("/",$_POST["fecha_hasta"] ));
	$tot=( $total_marca - $total_marca_costo );
	echo "<tr>";
	echo '<td>'.$row["marca"].'</td>';
	echo '<td>'.round($total_marca,2).'</td>';
	echo '<td>'.round($total_marca_costo,2).'</td>';
	echo '<td>'.round($tot,2).'</td>';
	echo '<td><A HREF="detalle_marca.php?id_sucursal='.$id_sucursal.'&marca='.$row["marca"].'&fecha_desde='.fecha_conv("/",$_POST["fecha_desde"]).'&fecha_hasta='.fecha_conv("/",$_POST["fecha_hasta"]).'" onClick="return popup(this, \'notes\')"><button>Detalle</button></A></td>';
	echo "</tr>".chr(13);
}
echo "</table>";


$fecha_desde=fecha_conv("/",$_POST["fecha_desde"]);
$fecha_hasta=fecha_conv("/",$_POST["fecha_hasta"]);



#-----------------------------------------------------------------------------
#total venta incluidos descuentos
if($sucursal=="TODAS"){
    $query='select sum( cantidad * precio_unitario ) from ventas where 
	fecha>="'.$fecha_desde.'" and 
	fecha<="'.$fecha_hasta.'"';
}else{
    $query='select sum( cantidad * precio_unitario ) from ventas where 
	    sucursal="'.$sucursal.'" and 
	fecha>="'.$fecha_desde.'" and 
	fecha<="'.$fecha_hasta.'"';
}
//echo $query."<br>";
		
$result=mysql_query($query)or die(mysql_error());
$total_venta=mysql_result($result,0);	
#-----------------------------------------------------------------------------



#-----------------------------------------------------------------------------
#total costo
if($sucursal=="TODAS"){
	$query='select sum( cantidad * costo ) from ventas where fecha>="'.$fecha_desde.'" and 
								fecha<="'.$fecha_hasta.'"';
}else{
	$query='select sum( cantidad * costo ) from ventas where sucursal="'.$sucursal.'" and 
								fecha>="'.$fecha_desde.'" and 
								fecha<="'.$fecha_hasta.'"';
}
//echo $query."<br>";
	$result=mysql_query($query)or die(mysql_error());
	$total_costo_bruto=mysql_result($result,0);	
#-----------------------------------------------------------------------------


#-----------------------------------------------------------------------------
#total ventas que tienen costo cargado
if($sucursal=="TODAS"){
	$query='select sum( cantidad * precio_unitario ) from ventas where fecha>="'.$fecha_desde.'" and 
							    fecha<="'.$fecha_hasta.'" and 
							    costo>0';
}else{
	$query='select sum( cantidad * precio_unitario ) from ventas where sucursal="'.$sucursal.'" and 
							    fecha>="'.$fecha_desde.'" and 
							    fecha<="'.$fecha_hasta.'" and 
							    costo>0';
}

	$result=mysql_query($query)or die(mysql_error());
	$total_venta_ccosto=mysql_result($result,0);	
#-----------------------------------------------------------------------------


$tttt=((($total_venta / $total_costo_bruto)*100)-100);


$rentabilidad_bruta=( $total_venta - $total_costo_bruto );

$descuento=suma_descuentos( $sucursal, fecha_conv("/",$_POST["fecha_desde"]), fecha_conv("/",$_POST["fecha_hasta"]) );

$total_venta_s_descuentos=total_venta_s_descuentos( $sucursal, fecha_conv("/",$_POST["fecha_desde"]), fecha_conv("/",$_POST["fecha_hasta"]) );





echo '<table border="1" class="t1">';
echo "<tr><td>Total venta con descuentos</td><td>".round($total_venta,2)."</td></tr>";

echo "<tr><td>Total costo bruto</td><td>".round($total_costo_bruto,2)."</td></tr>";
echo "<tr><td>Rentabilidad Bruta con descuentos</td><td>".round($rentabilidad_bruta,2)."</td>";

echo "<tr><td>Total ventas si no hubiera<br>habido descuentos</td><td>".round($total_venta_s_descuentos,2)."</td></tr>";
echo "<tr><td>Total descuento</td><td>".round($descuento,2)."</td></tr>";
echo "<tr><td>rentabilidad real</td><td>".round($tttt,2)."</td></tr>";
echo "</table>";



#-----------------------------------------------------------------
function calcula_total_marca($marca, $sucursal ,$fecha_desde, $fecha_hasta){
    if($sucursal="TODAS"){
	$query='select sum( cantidad * precio_unitario ) from ventas where marca="'.$marca.'" and fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'"';
    }else{
	$query='select sum( cantidad * precio_unitario ) from ventas where sucursal="'.$sucursal.'" and marca="'.$marca.'" and fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'"';
    }
	$result=mysql_query($query)or die(mysql_error());
	$total=mysql_result($result,0);	
return $total;
}				
#-----------------------------------------------------------------

#-----------------------------------------------------------------
function calcula_total_marca_costo($marca, $sucursal ,$fecha_desde, $fecha_hasta){
    if($sucursal="TODAS"){
	$query='select sum( cantidad * costo ) from ventas where marca="'.$marca.'" and fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'"';
    }else{
	$query='select sum( cantidad * costo ) from ventas where sucursal="'.$sucursal.'" and 
	marca="'.$marca.'" and fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'"';
    }
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
	$query='select sum( cantidad * precio_unitario ) from ventas where 
		    sucursal="'.$sucursal.'" and 
		fecha>="'.$fecha_desde.'" and 
		fecha<="'.$fecha_hasta.'"';
		
	$result=mysql_query($query)or die(mysql_error());
	$total=mysql_result($result,0);	
return $total;
}				
#-----------------------------------------------------------------

#-----------------------------------------------------------------
function total__ventas_ccosto( $sucursal, $fecha_desde, $fecha_hasta ){
	$query='select sum( cantidad * precio_unitario ) from ventas where sucursal="'.$sucursal.'" and 
							    fecha>="'.$fecha_desde.'" and 
							    fecha<="'.$fecha_hasta.'" and 
							    costo>0';
	$result=mysql_query($query)or die(mysql_error());
	$total=mysql_result($result,0);	
return $total;
}				
#-----------------------------------------------------------------


#-----------------------------------------------------------------
function calcula_total_costo_bruto($sucursal ,$fecha_desde, $fecha_hasta){
	$query='select sum( cantidad * costo ) from ventas where sucursal="'.$sucursal.'" and 
								fecha>="'.$fecha_desde.'" and 
								fecha<="'.$fecha_hasta.'"';
	$result=mysql_query($query)or die(mysql_error());
	$total=mysql_result($result,0);	
return $total;
}				
#-----------------------------------------------------------------

#-----------------------------------------------------------------
function calcula_total_costo_ccosto($sucursal ,$fecha_desde, $fecha_hasta){
	$query='select sum( cantidad * costo ) from ventas where sucursal="'.$sucursal.'" and 
							fecha>="'.$fecha_desde.'" and 
							fecha<="'.$fecha_hasta.'" and 
							costo>0';
	$result=mysql_query($query)or die(mysql_error());
	$total=mysql_result($result,0);	
return $total;
}				
#-----------------------------------------------------------------


#-----------------------------------------------------------------
function suma_descuentos( $sucursal, $fecha_desde, $fecha_hasta ){
    if($sucursal=="TODAS"){
	$query='select sum( cantidad * precio_unitario ) from ventas where fecha>="'.$fecha_desde.'" and 
									fecha<="'.$fecha_hasta.'" and 
									marca="Descuento"';
    }else{
	$query='select sum( cantidad * precio_unitario ) from ventas where sucursal="'.$sucursal.'" and 
									fecha>="'.$fecha_desde.'" and 
									fecha<="'.$fecha_hasta.'" and 
									marca="Descuento"';
    }
    
	$result=mysql_query($query)or die(mysql_error());
	$total=mysql_result($result,0);	
return $total;
}				
#-----------------------------------------------------------------

#-----------------------------------------------------------------
function total_venta_s_descuentos( $sucursal, $fecha_desde, $fecha_hasta ){
    if($sucursal=="TODAS"){
	$query='select sum( cantidad * precio_unitario ) from ventas where fecha>="'.$fecha_desde.'" and 
									fecha<="'.$fecha_hasta.'" and 
									marca!="Descuento"';
    }else{
	$query='select sum( cantidad * precio_unitario ) from ventas where sucursal="'.$sucursal.'" and 
									fecha>="'.$fecha_desde.'" and 
									fecha<="'.$fecha_hasta.'" and 
									marca!="Descuento"';
    }
	$result=mysql_query($query)or die(mysql_error());
	$total=mysql_result($result,0);	
return $total;
}				
#-----------------------------------------------------------------


?>
</center>
