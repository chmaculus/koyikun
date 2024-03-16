<?php 
include("../../login/login_verifica.inc.php");
include_once("../seguridad.inc.php"); 
?>

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

if(!$_POST["ACEPTAR"]){
	$fecha_desde='01'.date("/n/Y");
	$fecha_hasta='31'.date("/n/Y");
}

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

$fecha_desde=fecha_conv("/", $_POST["desde"]);
$fecha_hasta=fecha_conv("/", $_POST["hasta"]);

echo "desde: ".$fecha_desde."<br>";

$q='insert into ventas_temp3 (id_articulo
										, marca
										, descripcion
										, clasificacion
										, subclasificacion
										, contenido
										, presentacion
										, id_session)  
				 (select
				distinct id_articulos, 
				marca,
				descripcion,
				clasificacion,
				subclasificacion,
				contenido,
				presentacion, "aa"
					from ventas where fecha>="'.$fecha_desde.'" 
						and fecha<="'.$fecha_hasta.'") 
								';
echo "q1: ".$q."<br>";		
$r=mysql_query($q);
if(mysql_error()){
	echo mysql_error()."<br><br>";
	echo $q."<br><br>";
	
}
#---------------------------------------



#---------------------------------------
$qa='update ventas_temp3 set id_articulo="-1" where marca="Descuento"';
mysql_query($qa);
if(mysql_error()){
	echo mysql_error()."<br><br>";
	echo $q."<br><br>";
	
}
$qa='update ventas set id_articulos="-1" where marca="Descuento"';
mysql_query($qa);
if(mysql_error()){
	echo mysql_error()."<br><br>";
	echo $q."<br><br>";
	
}
#---------------------------------------

#---------------------------------------
$qa='update ventas_temp3 set id_articulo="-2" where marca="Dif x financiacion Debito"';
mysql_query($qa);
if(mysql_error()){
	echo mysql_error()."<br><br>";
	echo $q."<br><br>";
	
}
$qa='update ventas set id_articulos="-2" where marca="Dif x financiacion Debito"';
mysql_query($qa);
if(mysql_error()){
	echo mysql_error()."<br><br>";
	echo $q."<br><br>";
	
}
#---------------------------------------

#---------------------------------------
$qa='update ventas_temp3 set id_articulo="-3" where marca="Dif x financiacion Credito"';
mysql_query($qa);
if(mysql_error()){
	echo mysql_error()."<br><br>";
	echo $q."<br><br>";
	
}
$qa='update ventas set id_articulos="-3" where marca="Dif x financiacion Credito"';
mysql_query($qa);
if(mysql_error()){
	echo mysql_error()."<br><br>";
	echo $q."<br><br>";
	
}
#---------------------------------------

#0	id_session	varchar(32)
#1	id_articulo	mediumint(8) unsigned
#2	marca	varchar(30)
#3	descripcion	varchar(60)
#4	clasificacion	varchar(40)
#5	subclasificacion	varchar(40)
#6	contenido	varchar(30)
#7	presentacion	varchar(30)		

		
$q='select * from ventas_temp3 order by marca, clasificacion, subclasificacion, descripcion';
$r=mysql_query($q);
if(mysql_error()){
	echo mysql_error()."<br><br>";
	echo $q."<br><br>";
}
$rows=mysql_num_rows($r);
echo "Total: ".$rows."<br>";

echo '<table border="1">';
echo "<tr>";
echo "<td>ID</td>";		
echo "<td>Marca</td>";		
echo "<td>Descripcion</td>";		
echo "<td>Clasificacion</td>";		
echo "<td>Subclasificacion</td>";		
echo "<td>Contenido</td>";		
echo "<td>Presentacion</td>";		
echo "<td>U. vendidas</td>";		
echo "<td>T costo</td>";		
echo "<td>T Publico</td>";		
echo "<td>Rent. Bruta</td>";		
echo "</tr>";		

while($row=mysql_fetch_array($r)){
	$cantidad=salida_stock( $row["id_articulo"], $fecha_desde, $fecha_hasta );
	if($row[1]>0){
		$total_costo=$total_costo+$cantidad[1];
		$total_pventa=$total_pventa+$cantidad[2];
		$total_uni=$total_uni+$cantidad[0];
	}

	if($row[1]=="-1"){
		$total_descuento=$cantidad[2];
	}
	if($row[1]=="-3"){
		$total_tarjeta=$cantidad[2];
	}


	echo "<tr>";
	echo "<td>".$row[1]."</td>";
	echo "<td>".$row[2]."</td>";
	echo "<td>".$row[3]."</td>";
	echo "<td>".$row[4]."</td>";
	echo "<td>".$row[5]."</td>";
	echo "<td>".$row[6]."</td>";
	echo "<td>".$row[7]."</td>";
	echo "<td>".$cantidad[0]."</td>";
	echo "<td>".round($cantidad[1],2)."</td>";
	echo "<td>".round($cantidad[2],2)."</td>";
	echo "<td>".round(($cantidad[2] - $cantidad[1]) ,2)."</td>";
	echo "</tr>".chr(10);
}
echo "</table>";

echo '<table border="1">';

echo '<tr><td>Total unidades vendidas</td> <td>'.$total_uni.'</td></tr>';
echo '<tr><td>Total Costos</td> <td>'.round($total_costo ,2).'</td></tr>';
echo '<tr><td>Total Precio venta S/Descuento</td> <td>'.($total_pventa + $total_tarjeta).'</td></tr>';
echo '<tr><td>Total Precio venta C/Descuento</td> <td>'.($total_pventa + $total_descuento + $total_tarjeta).'</td></tr>';
echo '<tr><td>Total Rentabilidad bruta S/Descuento</td> <td>'.round(($total_pventa + $total_tarjeta - $total_costo) ,2).'</td></tr>';
echo '<tr><td>Total Rentabilidad bruta C/Descuento</td> <td>'.round((($total_pventa + $total_tarjeta - $total_costo)+$total_descuento) ,2).'</td></tr>';
echo '<tr><td>Total Descuento</td> <td>'.$total_descuento.'</td>';
echo '<tr><td>Total Tarjeta</td> <td>'.$total_tarjeta.'</td>';

echo "</table>";


$q='delete from ventas_temp3 where id_session="aa"';
mysql_query($q);


#----------------------------------------------------------------------------
#esta funcion devuelve la cantidad de articulos vendidos en un rango de fechas
function salida_stock( $id_articulo, $fecha_desde, $fecha_hasta ){
	$q='select sum(cantidad), sum(cantidad*costo), sum(cantidad*precio_unitario) from ventas where id_articulos="'.$id_articulo.'" and fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'"';
	$r=mysql_query($q);
	if(mysql_error()){
		echo mysql_error()."<br>";
		echo $q."<br>";
		
	}
	$tot[0]=mysql_result($r,0,0);
	$tot[1]=mysql_result($r,0,1);
	$tot[2]=mysql_result($r,0,2);
	#mysql_resul
	return $tot;
		
}
#----------------------------------------------------------------------------






?>