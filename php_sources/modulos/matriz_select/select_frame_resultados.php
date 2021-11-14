
<?php

include_once("../../includes/connect.php");
include_once("../../includes/funciones_varias.php");

include("../../login/login_verifica2.inc.php");
$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a administrador
if($jerarquia!="1"){
	echo "No tiene Permiso para acceder<br>";
	exit;
}


#-----------------------------------------------
$hora=time();

$ultimo_mes=$hora-(60 * 60 * 24 * 30);
$ultimo_tres=$hora-(60 * 60 * 24 * 30 * 3);
$ultimo_seis=$hora-(60 * 60 * 24 * 30 * 6);

$fecha=date("Y-n-d");

$u_mes=date("Y-n-d",$ultimo_mes);
$u_tres=date("Y-n-d",$ultimo_tres);
$u_seis=date("Y-n-d",$ultimo_seis);
#-----------------------------------------------




$id_sucursal=$_COOKIE["id_sucursal"];


include_once("cabecera.inc.php");

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

echo '<br>Cantidad de articulos: '.$numrows.'<br>';
echo '<br>Sucursal: '.$nombre_sucursal.'<br>';

?>

<table class="t1">
<tr>
	<th>ID</th>
	<th>Cod Int</th>
	<th>Descripcion</th>
	<th>Contenido</th>
	<th>Pesentacion</th>
	<th>Clasificacion</th>
	<th>Sub-clasificacion</th>
	<th>cod barra</th>
	<th>Accion</th>
	<th>Fijo</th>
	<th>Stock Suc</th>
	<th>Stock Dep.</th>
	<th>Rot Suc Mes</th>
	<th>Rot Suc Tres</th>
	<th>Rot Suc Seis</th>
	<th>Rot gral Mes</th>
	<th>Rot gral Tres</th>
	<th>Rot gral Seis</th>



<?php
while($row=mysql_fetch_array($result)){
	$array_stock=stock_sucursal($row["id"],$id_sucursal);
	$array_dep=stock_sucursal($row["id"],1);
	#----------------------------------------
   #muestra registro ingresado
	$query='select * from ventas_estadistica where id_articulo="'.$row["id"].'"';
   $array_ventas_estadistica=mysql_fetch_array(mysql_query($query));
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
	#----------------------------------------
   
$u_mes=date("Y-n-d",$ultimo_mes);
$u_tres=date("Y-n-d",$ultimo_tres);
$u_seis=date("Y-n-d",$ultimo_seis);

	#----------------------------------------
   $q='select sum(cantidad) from ventas where id_articulos="'.$row["id"].'" and sucursal="'.$nombre_sucursal.'" and fecha>="'.$u_mes.'"';
	$mes=mysql_result(mysql_query($q),0,0);
	
   $q='select sum(cantidad) from ventas where id_articulos="'.$row["id"].'" and sucursal="'.$nombre_sucursal.'" and  fecha>="'.$u_tres.'"';
	$tres=mysql_result(mysql_query($q),0,0);
	
   $q='select sum(cantidad) from ventas where id_articulos="'.$row["id"].'" and sucursal="'.$nombre_sucursal.'" and  fecha>="'.$u_seis.'"';
	$seis=mysql_result(mysql_query($q),0,0);
	
	#----------------------------------------



	echo "<tr>";
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["codigo_interno"].'</td>';
	echo '<td>'.$row["descripcion"].'</td>';
	echo '<td>'.$row["contenido"].'</td>';
	echo '<td>'.$row["presentacion"].'</td>';
	echo '<td>'.$row["clasificacion"].'</td>';
	echo '<td>'.$row["subclasificacion"].'</td>';
	echo '<td>'.$row["codigo_barra"].'</td>';
	echo '<td><A HREF="fijo_modifica.php?id_articulo='.$row["id"].'" onClick="return popup(this, \'notes\')"><button>Modificar</button></A></td>';
	echo '<td>'.$array_stock["fijo"].'</td>';
	echo '<td>'.$array_stock["stock"].'</td>';
	echo '<td>'.$array_dep["stock"].'</td>';
	echo '<td>'.$mes.'</td>';
	echo '<td>'.$tres.'</td>';
	echo '<td>'.$seis.'</td>';
	echo '<td>'.$array_ventas_estadistica["mes"].'</td>';
	echo '<td>'.$array_ventas_estadistica["tres"].'</td>';
	echo '<td>'.$array_ventas_estadistica["seis"].'</td>';


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




?>









</table>

</center>
</body>
</html>
