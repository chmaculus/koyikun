
<?php

include_once("../../includes/connect.php");
include_once("../../includes/funciones_varias.php");

include("../../login/login_verifica2.inc.php");
include("seguridad.inc.php");
include_once("cabecera.inc.php");

$id_sucursal=$_COOKIE["id_sucursal"];

#include_once("../../includes/funciones_costos.php");
#include_once("../../includes/funciones_precios.php");

$fecha=date("Y-n-d");
$nombre_sucursal=nombre_sucursal($id_sucursal);


#---------------------------------------------------------------
if($_POST["marca"]!="" AND $_POST["clasificacion"]=="" AND $_POST["subclasificacion"]=="" ){
	$query='select * from articulos where marca="'.$_POST["marca"].'" order by marca, clasificacion, subclasificacion, descripcion';
}

if($_POST["marca"]!="" AND $_POST["clasificacion"]!="" AND $_POST["subclasificacion"]=="" ){
	$query='select * from articulos where marca="'.$_POST["marca"].'" and clasificacion="'.$_POST["clasificacion"].'" order by marca, clasificacion, subclasificacion, descripcion';
}

if($_POST["marca"]!="" AND $_POST["clasificacion"]!="" AND $_POST["subclasificacion"]!="" ){
	$query='select * from articulos where marca="'.$_POST["marca"].'" and clasificacion="'.$_POST["clasificacion"].'" and subclasificacion="'.$_POST["subclasificacion"].'" order by marca, clasificacion, subclasificacion, descripcion';
}

$result=mysql_query($query)or die(mysql_error());
$numrows=mysql_num_rows($result);
#---------------------------------------------------------------

echo '<center>';
echo 'Sucursal: '.$nombre_sucursal.'<br>';

echo '<br>Cantidad de articulos: '.$numrows.'<br>';

?>

<table class="t1">
<tr>
	<th>ID</th>
	<th>Cod Int</th>
	<th>Descripcion</th>
	<th>Color</th>
	<th>Contenido</th>
	<th>Pesentacion</th>
	<th>Clasificacion</th>
	<th>Sub-clasificacion</th>
	<th>cod barra</th>
	<th>Acc.</th>
	<th>Acc.</th>
	<th>Stock</th>
	<th>Fijo</th>
	<th>Minimo</th>
	<th>Maximo</th>
	<th>Fecha</th>
	<th>Hora</th>



<?php
while($row=mysql_fetch_array($result)){
	//$precio_costo=calcula_precio_costo( array_costo($row["id"]) );
	$seg=seg_stock($row["id"], $id_sucursal);
	$array_stock=stock_sucursal($row["id"],$id_sucursal);
	
	echo "<tr>";
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["codigo_interno"].'</td>';
	echo '<td>'.$row["descripcion"].'</td>';
	echo '<td>'.$row["color"].'</td>';
	echo '<td>'.$row["contenido"].'</td>';
	echo '<td>'.$row["presentacion"].'</td>';
	echo '<td>'.$row["clasificacion"].'</td>';
	echo '<td>'.$row["subclasificacion"].'</td>';
	echo '<td>'.$row["codigo_barra"].'</td>';
	echo '<td><form action="stock_modifica.php" method="post" target="FrameMedio2"><input type="hidden" name="id_articulos" value="'.$row["id"].'" /> <input type="hidden" name="id_sucursal" value="'.$id_sucursal.'" /><input type="submit" name="stock" value="stock" /></form></td>';
	echo '<td>';if($seg>0){ echo '<form action="aa.php" method="post" target="FrameMedio2"><input type="hidden" name="id_articulos" value="'.$row["id"].'" /> <input type="hidden" name="id_sucursal" value="'.$id_sucursal.'" /><input type="submit" name="seguir" value="seguir '.$seg.'" /></form>';} echo '</td>';
	echo '<td>'.$array_stock["stock"].'</td>';
	echo '<td>'.$array_stock["fijo"].'</td>';
	echo '<td>'.$array_stock["minimo"].'</td>';
	echo '<td>'.$array_stock["maximo"].'</td>';
	echo '<td>'.$array_stock["fecha"].'</td>';
	echo '<td>'.$array_stock["hora"].'</td>';


	echo "</tr>".chr(13);
}




#---------------------------------------------------------------------------------------------
function aa1($id_articulo, $id_sucursal){
	$q='select stock, maximo from stock where id_articulo="'.$id_articulo.'" and id_sucursal="'.$id_sucursal.'"';
	//echo $q."<br>";
	$r=mysql_query($q);
	$rows=mysql_num_rows($r);
	
	if($rows==1){
		$row=mysql_fetch_array($r);
		$reponer = ($row["maximo"] - $row["stock"]) ;
		if ($reponer<0){
			$reponer=0;
		}
		return $reponer;
		 
	}
}
#---------------------------------------------------------------------------------------------




#---------------------------------------------------------------------------------------------
function array_costo($id_articulos){
	$query='select * from costos where id_articulos="'.$id_articulos.'"';
	$result=mysql_query($query);
	$rows=mysql_num_rows($result);
	if($rows=="1"){
		$array=mysql_fetch_array($result);
		return $array;
	}else{
		return "0";
	}
}
#---------------------------------------------------------------------------------------------


#---------------------------------------------------------------------------------------------
function calcula_precio_costo( $array_costos ){
	$temp1=( ( $array_costos["precio_costo"] * ( $array_costos["descuento1"] * -1 ) ) / 100 )+ $array_costos["precio_costo"];
	$temp1=( ( $temp1 * ( $array_costos["descuento2"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento3"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento4"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento5"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento6"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento7"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento8"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento9"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento10"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * $array_costos["iva"] ) / 100 )+ $temp1;
	return round($temp1,6);
}
#---------------------------------------------------------------------------------------------


#-----------------------------------------------------------------
function stock_sucursal($id_articulo,$id_sucursal){
	$query='select * from stock where 	id_articulo="'.$id_articulo.'" and id_sucursal="'.$id_sucursal.'"';
	$res=mysql_query($query) or die(mysql_error()." ".$SCRIPT_NAME);
	$rows=mysql_num_rows($res);
	if($rows==1){
		$array=mysql_fetch_array($res);
		$array["rows"]=$rows;
		return $array;		  
	}
	if($rows<1){
		$array["stock"]="0";
		$array["maximo"]="0";
		$array["minimo"]="0";
		$array["id_sucursal"]=$id_sucursal;
		$array["rows"]=0;
		return $array;		
	}
}
#-----------------------------------------------------------------


#-----------------------------------------------------------------
function seg_stock($id_articulo, $id_sucursal){
	//$q='select id from seguimiento_stock where id_articulo="'.$id_articulo.'" and (origen="'.$id_sucursal.'" or destino="'.$id_sucursal.'")';
	$q='select * from seguimiento_stock where id_articulo="'.$id_articulo.'" and 	(
																																(	(origen="'.$id_sucursal.'" and tipo="EN") or  
																																	(destino="'.$id_sucursal.'" and tipo="RE") or
																																	(origen="'.$id_sucursal.'" and tipo="VE") or
																																	(origen="'.$id_sucursal.'" and tipo="MD")
																													 			)  
																													 		)   order by fecha, hora';

	$res=mysql_query($q);
	$rows=mysql_num_rows($res);
	return $rows;
}
#-----------------------------------------------------------------



?>









</table>

</center>
</body>
</html>
