<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link type="text/css" href="style.css" rel="stylesheet" />

	<link type="text/css" href="js/themes/base/ui.all.css" rel="stylesheet" />
	<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
	<script type="text/javascript" src="js/ui/ui.core.js"></script>
	<script type="text/javascript" src="js/ui/ui.datepicker.js"></script>
	<script type="text/javascript" src="js/ui/i18n/ui.datepicker-es.js"></script>
	<link type="text/css" href="../demos.css" rel="stylesheet" />
<meta content="text/html; charset=ISO8859-1" http-equiv="content-type" />
	<script type="text/javascript">
	$(function() {
		$('#desde').datepicker({
			changeMonth: true,
			changeYear: true
		});
		$('#hasta').datepicker({
			changeMonth: true,
			changeYear: true
		});
	});
	</script>

<title>Tablabla ventas By Christian Máculus</title>
</head>



<center>

<?php
#	$fecha=date("d/n/Y");
	$fecha_desde='01'.date("/n/Y");
	$fecha_hasta='31'.date("/n/Y");

?>
<form method="POST" action="<?php echo $SCRIPT_NAME ?>">

<p>Desde: <input type="text" name="desde" id="desde" value="<?php if($_POST["desde"]){echo $_POST["desde"];}else{ echo $fecha_desde;} ?>"> Hasta: <input type="text" name="hasta" id="hasta" value="<?php if ($_POST["hasta"]){ echo $_POST["hasta"]; }else{ echo $fecha_hasta; }?>"></p>
<input type="submit" name="ACEPTAR" value="ACEPTAR" />

</form>
<?php
if(!$_POST["ACEPTAR"]){
		exit;
}

include_once("../../includes/connect.php");
include_once("../../includes/funciones_varias.php");

$query='select distinct id_articulos from ventas where fecha>="'.fecha_conv("/", $_POST["desde"]).'" and fecha<="'.fecha_conv("/", $_POST["hasta"]).'"';

$result=mysql_query($query);
$rows=mysql_num_rows($result);
if(mysql_error()){
	echo mysql_error()."<br>".$query."<br>";
}

echo "articulos activos: ".$rows."<br>";

while($row=mysql_fetch_array($result)){
	$query='select * from ventas where id_articulos="'.$row[0].'" and fecha>="'.fecha_conv("/", $_POST["desde"]).'" and fecha<="'.fecha_conv("/", $_POST["hasta"]).'" limit 0,1';
	$array_ventas_temp3=mysql_fetch_array(mysql_query($query));
	if(mysql_error()){
   	 echo "Q: ".$query."<br>";
    	echo "E: ".mysql_error()."<br>";
    	echo "S: ".$_SERVER["SCRIPT_NAME"]."<br>";
	}
	
	#----------------------------------------
	$query='insert into koyikun.ventas_temp3 set
		id_articulo="'.$array_ventas_temp3["id_articulos"].'",
		marca="'.$array_ventas_temp3["marca"].'",
		descripcion="'.$array_ventas_temp3["descripcion"].'",
		contenido="'.$array_ventas_temp3["contenido"].'",
		presentacion="'.$array_ventas_temp3["presentacion"].'",
		clasificacion="'.$array_ventas_temp3["clasificacion"].'",
		subclasificacion="'.$array_ventas_temp3["subclasificacion"].'",
		precio_unitario="'.$array_ventas_temp3["precio_unitario"].'",
		costo="'.$array_ventas_temp3["costo"].'"';
	mysql_query($query);

	if(mysql_error()){
   	 echo "Q: ".$query."<br>";
    	echo "E: ".mysql_error()."<br>";
    	echo "S: ".$_SERVER["SCRIPT_NAME"]."<br>";
	}
	#----------------------------------------	
}


$query="select * from ventas_temp3 order by marca, clasificacion, subclasificacion, descripcion";
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}
?>


<table class="t1">
<tr>
    <th>marca</th>
    <th>descripcion</th>
    <th>contenido</th>
    <th>presentacion</th>
    <th>clasificacion</th>
    <th>subclasificacion</th>
    <th>costo</th>
    <th>p/unitario</th>
    <th>R bruta</th>
    <th>T costo</th>
    <th>T p/unitario</th>
    <th>T R bruta</th>
    <th>cant</th>
</tr>

<?php

while($row=mysql_fetch_array($result)){
	$stock=salida_stock( $row["id_articulo"], fecha_conv("/", $_POST["desde"]), fecha_conv("/",$_POST["hasta"]) );
    echo "<tr>";
    echo '<td>'.$row["marca"].'</td>';
    echo '<td>'.$row["descripcion"].'</td>';
    echo '<td>'.$row["contenido"].'</td>';
    echo '<td>'.$row["presentacion"].'</td>';
    echo '<td>'.$row["clasificacion"].'</td>';
    echo '<td>'.$row["subclasificacion"].'</td>';

    echo '<td>'.$row["costo"].'</td>';
    echo '<td>'.$row["precio_unitario"].'</td>';
    echo '<td>'.($row["precio_unitario"] - $row["costo"]).'</td>';

    echo '<td>'.($row["costo"] * $stock) .'</td>';
    echo '<td>'.($row["precio_unitario"] * $stock).'</td>';
    echo '<td>'.(($row["precio_unitario"] - $row["costo"]) * $stock).'</td>';

    echo '<td>'.$stock.'</td>';
    echo "</tr>".chr(10);
}

$q='truncate table ventas_temp3';
mysql_query($q);


#----------------------------------------------------------------------------
#esta funcion devuelve la cantidad de articulos vendidos en un rango de fechas
function salida_stock( $id_articulo, $fecha_desde, $fecha_hasta ){
	$q='select sum(cantidad) from ventas where id_articulos="'.$id_articulo.'" and fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'"';
	$r=mysql_query($q);
	if(mysql_error()){
		echo mysql_error()."<br>";
		echo $q."<br>";
		
	}
	$tot=mysql_result($r,0,0);
	#mysql_resul
	return $tot;
		
}
#----------------------------------------------------------------------------



?>
</table>
</center>