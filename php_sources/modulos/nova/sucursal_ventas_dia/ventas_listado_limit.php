<?php
include_once("../includes/connect.php");
include("cabecera.inc.php");
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


<?php


include_once("../includes/funciones.php");

$id_session=$_COOKIE["id_session"];
$id_sucursal=$_COOKIE["id_sucursal"];
$sucursal=nombre_sucursal($_COOKIE["id_sucursal"]);
$fecha=date("Y-n-d");

//$total_venta=total( $sucursal, $fecha, $fecha );

//echo '<font1>Total Venta: '.fecha_conv("-",$fecha).' '.$total_venta.'</font1><br>';
echo '<font1>Sucursal: '.$sucursal.'</font1><br>'.chr(13);

$query='select distinct numero_venta from ventas where sucursal="'.$sucursal.'" and fecha="'.$fecha.'" order by fecha, hora desc limit 0,20';
//echo "query: ".$query."<br>".chr(13);
$result=mysql_query($query)or die(mysql_error());
$rows=mysql_num_rows($result);
//echo "rows: ".$rows."<br>".chr(13);


?>

<table border="1" class="t1">
<tr>
	<th>numero_venta</th>
	<th>tipo_pago</th>
	<th>vendedor</th>
	<th>Total</th>
	<th>fecha</th>
	<th>hora</th>
	<th>des</th>
	<th></th>
</tr><?php echo chr(13);?>

<?php
while($row=mysql_fetch_array($result)){
	echo "<tr>";
	$array=valores( $row["numero_venta"], $sucursal );
	echo '<td>'.$row["numero_venta"].'</td>';
	echo '<td>'.$array["tipo_pago"].'</td>';
	echo '<td>'.$array["vendedor"].'</td>';
	echo '<td>'.calcula_total_venta2( $row["numero_venta"], $sucursal ).'</td>';
	echo '<td>'.fecha_conv("-",$array["fecha"]).'</td>';
	echo '<td>'.$array["hora"].'</td>';
	echo '<td>'.descuento( $row["numero_venta"], $sucursal ).'</td>';
	echo '<td><A HREF="detalle_venta.php?id_sucursal='.$id_sucursal.'&numero_venta='.$row["numero_venta"].'" onClick="return popup(this, \'notes\')"><button>Detalle</button></A></td>';
	echo "</tr>".chr(13);
}


#-----------------------------------------------------------------
function calcula_total_venta2($numero_venta, $sucursal){
	$query='select sum( cantidad * precio_unitario ) from ventas where numero_venta="'.$numero_venta.'" and sucursal="'.$sucursal.'"';
	$result=mysql_query($query)or die(mysql_error());
	$total_venta=mysql_result($result,0);	
return $total_venta;
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
