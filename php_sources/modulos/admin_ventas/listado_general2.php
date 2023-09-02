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
echo '<input type="submit" name="ACEPTAR" value="ACEPTAR"><br>';
echo '</form>';

if( !$_POST["ACEPTAR"] ){
	exit;
}

$id_sucursal=$_POST["id_sucursal"];




$total_venta=total( $sucursal, fecha_conv("/",$_POST["fecha_desde"]), fecha_conv("/",$_POST["fecha_hasta"]) );

echo '<font1>Total Venta desde '.$_POST["fecha_desde"].' Hasta '.$_POST["fecha_hasta"].' '.$total_venta.'</font1><br>';
echo '<font1>Sucursal: '.$sucursal.'</font1><br>'.chr(13);

$query='select * from ventas where fecha>="'.fecha_conv("/",$_POST["fecha_desde"]).'" and fecha<="'.fecha_conv("/",$_POST["fecha_hasta"]).'"order by marca, clasificacion, subclasificacion, contenido, presentacion';
$result=mysql_query($query)or die(mysql_error());


echo '<table class="t1">';
echo "<tr>";
    echo "<th>id_articulos</th>";
    echo "<th>marca</th>";
    echo "<th>descripcion</th>";
    echo "<th>color</th>";
    echo "<th>clasificacion</th>";
    echo "<th>subclasificacion</th>";
    echo "<th>cantidad</th>";
    echo "<th>contenido</th>";
    echo "<th>presentacion</th>";
    echo "<th>precio_unitario</th>";
echo "</tr>";


while($row=mysql_fetch_array($result)){
    echo "<tr>";
    echo '<td>'.$row["id_articulos"].'</td>';
    echo '<td>'.$row["marca"].'</td>';
    echo '<td>'.$row["descripcion"].'</td>';
    echo '<td>'.$row["color"].'</td>';
    echo '<td>'.$row["clasificacion"].'</td>';
    echo '<td>'.$row["subclasificacion"].'</td>';
    echo '<td>'.$row["cantidad"].'</td>';
    echo '<td>'.$row["contenido"].'</td>';
    echo '<td>'.$row["presentacion"].'</td>';
    echo '<td>'.$row["precio_unitario"].'</td>';
    echo "</tr>".chr(10);
}

echo '</table></center>';



#-----------------------------------------------------------------
function calcula_total_marca($marca, $sucursal ,$fecha_desde, $fecha_hasta){
	if($sucursal=="TODAS"){
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
function calcula_total_unidades_marca($marca, $sucursal ,$fecha_desde, $fecha_hasta){
	if($sucursal=="TODAS"){
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
