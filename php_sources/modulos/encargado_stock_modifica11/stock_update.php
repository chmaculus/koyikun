<?php 
include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");
include_once("seguridad.inc.php");
include_once("cabecera.inc.php");
include_once("../../includes/funciones_varias.php");
include_once("../../includes/funciones_stock.php");

echo "<center>";
$id_sucursal=$_COOKIE["id_sucursal"];
$count="0";

$fecha=date("Y-n-d");
$hora=date("H:i:s");

#fundamental agregar encargados correspondintes a sucursal

$query=base64_decode($_POST["query"]);
$result=mysql_query($query)or die(mysql_error());
//echo $query."<br>";
while($row=mysql_fetch_array($result)){
	$cambio="0";
	verifica_tabla_stock( $row["id"], $id_sucursal );

	$array_stock=array_stock( $row["id"] , $id_sucursal);
	echo "stk: ".$array_stock["stock"]." Min: ".$array_stock["minimo"]. " Max: ".$array_stock["maximo"]."<br>";

	if( $array_stock["stock"]!=$_POST["stock".$row["id"]]){
		$stock=$_POST["stock".$row["id"]];
		$cambio="1";
	}else{
		$stock=$array_stock["stock"];
	}

	if($stock<0){
		$stock="0";
	}	
	
	if($array_stock["minimo"]!=$_POST["minimo".$row["id"]]){
		$minimo=$_POST["minimo".$row["id"]];
		$cambio="1";
	}else{
		$minimo=$array_stock["minimo"];
	}
	if($minimo<0){
		$minimo="0";
	}	
	
	if($array_stock["maximo"]!=$_POST["maximo".$row["id"]]){
		$maximo=$_POST["maximo".$row["id"]];
		$cambio="1";
	}else{
		$maximo=$array_stock["maximo"];
	}
	if($maximo<0){
		$maximo="0";
	}	
	
	
	if( $cambio=="1"){
		$q1='update stock set stock="'.$stock.'", maximo="'.$maximo.'", minimo="'.$minimo.'", fecha="'.$fecha.'", hora="'.$hora.'" where id_articulo="'.$row["id"].'" and id_sucursal="'.$id_sucursal.'"';
		#echo $q1."<br>";
		mysql_query($q1);
		if(mysql_error()){echo mysql_error()."<br>";}
		
		$count++;

		$query='insert into seguimiento_stock set
			id_articulo="'.$row["id"].'",
			stock_anterior="'.$array_stock["stock"].'",
			stock_nuevo="'.$stock.'",
			tipo="MODIFICACION4",
			origen="'.$id_sucursal.'",
			destino="'.$id_sucursal.'",
			fecha="'.$fecha.'",
			hora="'.$hora.'"
			';
			mysql_query($query);
			if(mysql_error()){echo mysql_error()."<br>";}
	}
}

if($count>0){
	echo "<font1>Se actualizaron ".$count." articulos correctamente</font1>";
}


?>
</center>
</body>
</html>