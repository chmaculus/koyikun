<?php
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
		$array["fijo"]="0";
		$array["id_sucursal"]=$id_sucursal;
		$array["rows"]=0;
		return $array;		
	}
}
#-----------------------------------------------------------------

#-----------------------------------------------------------------
function seguimiento_stock($id_articulo, $stock_anterior, $stock_nuevo, $tipo, $origen, $destino){
	$fecha=date("Y-n-d");
	$hora=date("H:i:s");
	$query='insert into seguimiento_stock set id_articulo="'.$id_articulo.'",
															stock_anterior="'.$stock_anterior.'",
															stock_nuevo="'.$stock_nuevo.'",
															tipo="'.$tipo.'",
															origen="'.$origen.'",
															destino="'.$destino.'",
															fecha="'.$fecha.'",
															hora="'.$hora.'"
															'; 	
	mysql_query($query)or die( mysql_error() ."<br>".$SCRIPT_NAME."<br>".$query."<br><br>");
}
#-----------------------------------------------------------------



#-----------------------------------------------------------------
function verifica_tabla_stock( $id_articulo, $id_sucursal ){
	$query='select * from stock where 	id_articulo="'.$id_articulo.'" and id_sucursal="'.$id_sucursal.'"';
	$res=mysql_query($query) or die(mysql_error()." ".$SCRIPT_NAME);
	$rows=mysql_num_rows($res);
	if($rows==1){
		return 1;		
	}
	if($rows<1){
		$q='insert into stock set stock=0, id_articulo="'.$id_articulo.'", id_sucursal="'.$id_sucursal.'"';
		mysql_query($q);
		return;
	}
	if($rows>1){
		$q='delete from stock where id_articulo="'.$id_articulo.'" and id_sucursal="'.$id_sucursal.'"';
		mysql_query($q);
		$q='insert into stock set stock=0, id_articulo="'.$id_articulo.'", id_sucursal="'.$id_sucursal.'"';
		mysql_query($q);
		return;
	}
}
#-----------------------------------------------------------------





#-----------------------------------------------------------------
function descuenta_stock($cantidad, $id_articulos, $id_sucursal){
	$query='select * from stock where id_articulo="'.$id_articulos.'" and id_sucursal="'.$id_sucursal.'"';
	$result=mysql_query($query)or die(mysql_error());
	$rows=mysql_num_rows($result);
	$array=mysql_fetch_array($result);

	
	if($rows<"1"){
		$stock_anterior="0";
		$stock_nuevo=0; 
		$q1='insert into stock set id_articulo="'.$id_articulos.'", id_sucursal="'.$id_sucursal.'", stock="0", maximo="0", minimo="0"';
	}
	if($rows=="1"){
		$stock_anterior=$array["stock"];
		$stock_nuevo=( $stock_anterior - $cantidad );
		$q1='update stock  set stock="'.$stock_nuevo.'" where id="'.$array["id"].'"';
	}
//	echo $q1;
	mysql_query($q1);
	if(mysql_error()){
			echo mysql_error().$_SERVER["script_name"];
	}
	$array2["stock_nuevo"]=$stock_nuevo;
	$array2["stock_anterior"]=$stock_anterior;
	$array2["query"]=$q1;
	return $array2;
	
}
#-----------------------------------------------------------------

#--------------------------------------------------------------------------
function ingresa_stock($id_articulos, $id_sucursal, $cantidad, $maximo, $minimo){
	$fecha=date("Y-n-d");
	$hora=date("H:i:s");

	$query='select * from stock where id_articulo="'.$id_articulos.'" and id_sucursal="'.$id_sucursal.'"';
	echo "q: ".$query."<br>";
	$res=mysql_query($query) or die(mysql_error()." ".$SCRIPT_NAME);
	$rows=mysql_num_rows($res);

	#OK
	if($rows==1){
		$array_stock=mysql_fetch_array($res);
		$id_stock=$array_stock["id"];
	}	
	#no existe articulo, sucursal en tabla stock

	$stock_anterior=$array_stock["stock"];
	$stock_nuevo=( $stock_anterior + $cantidad );
}
#--------------------------------------------------------------------------

#-----------------------------------------------------------------
function get_stock($id_articulo,$id_sucursal){
	$query='select * from stock where id_articulo="'.$id_articulo.'" and id_sucursal="'.$id_sucursal.'"';
	$res=mysql_query($query) or die(mysql_error()." ".$SCRIPT_NAME);
	$rows=mysql_num_rows($res);

	if($rows==1){
		$array_stock=mysql_fetch_array($res);
		return $array_stock["stock"];		
	}

	if($rows<1){
		$array_stock["stock"]=0;
		return $array_stock["stock"];
	}
}
#-----------------------------------------------------------------

#-----------------------------------------------------------------
function array_stock($id_articulo,$id_sucursal){
	$query='select * from stock where id_articulo="'.$id_articulo.'" and id_sucursal="'.$id_sucursal.'"';
	$res=mysql_query($query);
	if(mysql_error()){
		$array_stock["error"]=mysql_error();
		$array_stock["query"]=$query;
		return $array_stock;
	}
	$rows=mysql_num_rows($res);

	if($rows==1){
		$array_stock=mysql_fetch_array($res);
		$array_stock["rows"]=$rows;
		$array_stock["query"]=$query;
		return $array_stock;		
	}

	if($rows<1){
		$array_stock["stock"]=0;
		$array_stock["rows"]=$rows;
		$array_stock["query"]=$query;
		return $array_stock;
	}
}
#-----------------------------------------------------------------




?>
