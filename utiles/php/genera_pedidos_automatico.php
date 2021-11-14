<?php
include("includes/connect.php");
include("includes/funciones_stock.php");
include("includes/funciones_articulos.php");

$fecha=date("Y-n-d");
$hora=date("H:i:s");

//$id_sucursal=$_COOKIE["id_sucursal"];

/*
$q='select stock.* from stock,articulos where stock.fijo>0 and 
																							stock.stock<stock.fijo and 
																							articulos.id=stock.id_articulo and 
																							articulos.discontinuo!="S" 
																									order by stock.id_sucursal ';

*/

$q='delete from pedidos where estado is null and tipo="automatico"';
mysql_query($q);

$q='delete from pedidos_temp_nuevo where tipo="automatico"';
mysql_query($q);





$q='select stock.*,articulos.* from stock,articulos where stock.fijo>0 and
																stock.stock<stock.fijo and
                                                articulos.id=stock.id_articulo and
                                                (articulos.discontinuo!="S" or articulos.discontinuo is NULL)
                                                	order by stock.id_sucursal, articulos.marca, articulos.zona ,articulos.clasificacion, articulos.subclasificacion, articulos.descripcion';






$res=mysql_query($q);
if(mysql_error()){echo mysql_error().chr(10);}

while($row=mysql_fetch_array($res)){

	$arr_dep=stock_sucursal($row["id"],1);
	$stk_dep=$arr_dep["stock"];
	if($row["stock"]<0){$stock=0;}else{$stock=$row["stock"];}
	$pedir=($row["fijo"]-$stock);
	if($pedir>=$stk_dep){$pedir=$stk_dep;}
	$array_articulo=array_articulos($row["id_articulo"]);
/*
	$array_stock=stock_sucursal($row["id_articulo"],1);
	if($array_stock["stock"]>0){
		if($row["stock"]<0){$stock=0;}else{$stock=$row["stock"];}
		$pedir=($row["fijo"]-$stock);
		$array_articulo=array_articulos($row["id_articulo"]);
		
	*/	
	if($pedir>0){	
		$count++;
		$q='insert into pedidos_temp_nuevo set id_sucursal="'.$row["id_sucursal"].'",
																					 id_articulos="'.$array_articulo["id"].'",
																					 cantidad="'.$pedir.'",
																					 marca="'.$array_articulo["marca"].'",
																					 descripcion="'.$array_articulo["descripcion"].'",
																					 color="'.$array_articulo["color"].'",
																					 clasificacion="'.$array_articulo["clasificacion"].'",
																					 subclasificacion="'.$array_articulo["subclasificacion"].'",
																					 presentacion="'.$array_articulo["presentacion"].'",
																					 codigo_barra="'.$array_articulo["codigo_barra"].'",
																					 tipo="AUTOMATICO",
																					 fecha="'.$fecha.'",
																					 hora="'.$hora.'"
																					 ';
		//echo "id:".$row["id_articulo"]."		suc:".$row["id_sucursal"]."		stk:".$row["stock"]."		fi:".$row["fijo"].chr(10);
		echo $q.";".chr(10);
		mysql_query($q);
		if(mysql_error()){echo mysql_error().chr(10);}
	}
	 
}

//echo mysql_num_rows($res).chr(10);

echo "count:$count".chr(10);



?>