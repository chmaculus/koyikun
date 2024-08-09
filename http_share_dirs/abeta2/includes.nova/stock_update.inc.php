<?php
// se llama desde modifica1.php

$result=mysql_query("select * from sucursales");
while($row=mysql_fetch_array($result)){
	$stocksuc=$_POST["stocksuc".$row["id"]];
	$maxsuc=$_POST["maxsuc".$row["id"]];
	$minsuc=$_POST["minsuc".$row["id"]];
	
	verifica_stock_sucursal($id_articulo,$row["id"]);
	$array_stock=stock_sucursal($id_articulo,$row["id"]);
	$stock_anterior=$array_stock["stock"];

//	echo "stock_anterior: ".$stock_anterior."<br>".chr(13);

	seguimiento_stock($id_articulo, $stock_anterior, $stocksuc, "2", $row["id"], $row["id"]);
	/*seguimiento_stock($id_articulo, $stock_anterior, $stock_nuevo, $tipo, $origen, $destino) */
	
	$query='update stock set	stock="'.$stocksuc.'",
										maximo="'.$maxsuc.'",
										minimo="'.$minsuc.'",
										fecha="'.$fecha.'",
										hora="'.$hora.'"
											where id_articulo="'.$id_articulo.'" and
													id_sucursal="'.$row["id"].'"
													';
		//echo "query: ".$query."<br>".chr(13);
		
		mysql_query($query)or die(mysql_error()." ".$SCRIPT_NAME."<br>");

}
mysql_free_result($result);



function verifica_stock_sucursal($id_articulo,$id_sucursal){
	$query='select stock, maximo, minimo from stock where id_articulo="'.$id_articulo.'" and id_sucursal="'.$id_sucursal.'"';
	$res=mysql_query($query) or die(mysql_error()." ".$SCRIPT_NAME);
	$rows=mysql_num_rows($res);
	if($rows>1){
		$q='delete from stock where id_articulo="'.$id_articulo.'" and id_sucursal="'.$id_sucursal.'"';
//		echo "q: ".$q."<br>".chr(13);	
		mysql_query($q)or die(mysql_error()." ".$SCRIPT_NAME."<br>");
		$q='insert into stock set 	id_articulo="'.$id_articulo.'", 
											id_sucursal="'.$id_sucursal.'",
											stock="0",
											maximo="0",
											minimo="0"
											';
//		echo "q: ".$q."<br>".chr(13);	
		mysql_query($q)or die(mysql_error()." ".$SCRIPT_NAME."<br>");
		return "1";
	}elseif($rows==1){
		return "1";
	}elseif($rows<1){
			$q='insert into stock set 	id_articulo="'.$id_articulo.'", 
											id_sucursal="'.$id_sucursal.'",
											stock="0",
											maximo="0",
											minimo="0"
											';
//		echo "q: ".$q."<br>".chr(13);	
		mysql_query($q)or die(mysql_error()." ".$SCRIPT_NAME."<br>");
		return "1";
	}
}

?>
