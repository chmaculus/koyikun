<?php
//se llama desde modifica1.php


$result=mysql_query("select * from sucursales");
while($row=mysql_fetch_array($result)){
	$precio_base=$_POST["precio_base".$row["id"]];
	$porcentaje_contado=$_POST["porcentaje_contado".$row["id"]];
	$porcentaje_tarjeta=$_POST["porcentaje_tarjeta".$row["id"]];

	verifica_precio_sucursal($id_articulo,$row["id"]);
	$query='update precios set precio_base="'.$precio_base.'",
										porcentaje_contado="'.$porcentaje_contado.'",
										porcentaje_tarjeta="'.$porcentaje_tarjeta.'",
										fecha="'.$fecha.'",
										hora="'.$hora.'"
											where id_articulo="'.$id_articulo.'" and
													id_sucursal="'.$row["id"].'"
													';
	mysql_query($query)or die(mysql_error()." ".$SCRIPT_NAME."<br>");
}
mysql_free_result($result);

function verifica_precio_sucursal($id_articulo,$id_sucursal){
	$query='select * from precios where id_articulo="'.$id_articulo.'" and id_sucursal="'.$id_sucursal.'"';
	$res=mysql_query($query) or die(mysql_error()." ".$SCRIPT_NAME);
	$rows=mysql_num_rows($res);
	if($rows>1){
		$q='delete from stock where id_articulo="'.$id_articulo.'" and id_sucursal="'.$id_sucursal.'"';
//		echo "q: ".$q."<br>".chr(13);	
		mysql_query($q)or die(mysql_error()." ".$SCRIPT_NAME."<br>");
		$q='insert into precios set	id_articulo="'.$id_articulo.'", 
												id_sucursal="'.$id_sucursal.'",
												precio_base="0",
												porcentaje_contado="0",
												porcentaje_tarjeta="0"
												';
		mysql_query($q)or die(mysql_error()." ".$SCRIPT_NAME."<br>");
		return "1";
	}elseif($rows==1){
		return "1";
	}elseif($rows<1){
		$q='insert into precios set	id_articulo="'.$id_articulo.'", 
												id_sucursal="'.$id_sucursal.'",
												precio_base="0",
												porcentaje_contado="0",
												porcentaje_tarjeta="0"
												';
//		echo "q: ".$q."<br>".chr(13);	
		mysql_query($q)or die(mysql_error()." ".$SCRIPT_NAME."<br>");
		return "1";
	}
}
?>
