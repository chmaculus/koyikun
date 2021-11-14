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

while($row=mysql_fetch_array($result)){
	$cambio=0;
	verifica_tabla_stock( $row["id"], $id_sucursal );
	$array_stock=array_stock( $row["id"] , $id_sucursal);

	if($_POST["stock".$row["id"]]>=0 AND $array_stock["stock"]!=$_POST["stock".$row["id"]]){
		$stock=$_POST["stock".$row["id"]];
		$cambio=1;
	}else{
		$stock=$array_stock["stock"];
	}
	if($stock<0){
		$stock=0;
	}	
	
	if($_POST["minimo".$row["id"]]>=0 AND $array_stock["minimo"]!=$_POST["minimo".$row["id"]]){
		$minimo=$_POST["minimo".$row["id"]];
		$cambio=1;
	}else{
		$minimo=$array_stock["minimo"];
	}
	if($minimo<0){
		$minimo=0;
	}	
	
	if($_POST["maximo".$row["id"]]>=0 AND $array_stock["maximo"]!=$_POST["maximo".$row["id"]]){
		$maximo=$_POST["maximo".$row["id"]];
		$cambio=1;
	}else{
		$maximo=$array_stock["maximo"];
	}
	if($maximo<0){
		$maximo=0;
	}	
	
	
	if( $cambio==1){
		$q1='update stock set stock="'.$stock.'", maximo="'.$maximo.'", minimo="'.$minimo.'", fecha="'.$fecha.'", hora="'.$hora.'" where id_articulo="'.$row["id"].'" and id_sucursal="'.$id_sucursal.'"';
		echo $q1."<br>";
		mysql_query($q1)or die(mysql_error());

		#----------------------------------------
		$query='insert into seguimiento_stock set 
			id_articulo="'.$row["id"].'",
			stock_anterior="'.$stock_anterior.'",
			stock_nuevo="'.$stock.'",
			tipo="MD1",
			origen="'.$id_sucursal.'",
			destino="'.$id_sucursal.'",
			fecha="'.$fecha.'",
			hora="'.$hora.'"';

		mysql_query($query);

		if(mysql_error()){
			echo $query."<br>";
			echo mysql_error()."<br>";
			echo $_SERVER["SCRIPT_NAME"]."<br>";
		}
		$count++;
	}

}
if($count>0){
	echo "<font1>Se actualizaron ".$count." articulos correctamente</font1>";
}


?>
</center>
</body>
</html>