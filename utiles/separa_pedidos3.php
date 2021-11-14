<?php
#modulo utilitario para separar en zonas los pedidos existentes

/*

*/

//echo "#jejejejeje".chr(10);

include("./includes/connect.php");
include("./includes/funciones_varias.php");


$query='select distinct pedidos.numero_pedido, pedidos.sucursal, pedidos.fecha, marcas_zonas.zona from pedidos, marcas_zonas where pedidos.finalizado="N" and pedidos.marca=marcas_zonas.marca and pedidos.clasificacion=marcas_zonas.clasificacion and marcas_zonas.zona="5" order by fecha, sucursal';

$result=mysql_query($query);

while($row=mysql_fetch_array($result)){
	$q='select distinct pedidos.marca, pedidos.clasificacion from pedidos, marcas_zonas where pedidos.marca=marcas_zonas.marca and pedidos.clasificacion=marcas_zonas.clasificacion and  numero_pedido="'.$row[0].'" and sucursal="'.$row[1].'" and finalizado="N"';
	echo $q.";".chr(10);
	incrementa_n_pedido($row[1]);
	$npedid=get_numero_pedido($row[1]);
	$res=mysql_query($q);
	while($row2=mysql_fetch_array($res)) {
		$q2='update pedidos set numero_pedido="'.$npedid.'" where sucursal="'.$row[1].'" and numero_pedido="'.$row[0].'" and marca="'.$row2[0].'" and clasificacion="'.$row2[1].'"';
		echo $q2.";".chr(10);
	}

	echo chr(10);
}



#-----------------------------------------
function get_numero_pedido($id_sucursal){
	$query='select * from pedido_numero where id_sucursal="'.$id_sucursal.'"';
	$result=mysql_query($query) or die(mysql_error());
	$rows=mysql_num_rows($result);
	if($rows<"1"){
		$numero_venta="1";
		$q1='insert into pedido_numero set numero="1", id_sucursal="'.$id_sucursal.'"';
		mysql_query($q1)or die(mysql_error());
	}else{
		$array_nventa=mysql_fetch_array($result);
		$numero_venta=$array_nventa["numero"];
	}	
	
return $numero_venta;
}
#-----------------------------------------


#-----------------------------------------
function incrementa_n_pedido($id_sucursal){
	$query='select * from pedido_numero where id_sucursal="'.$id_sucursal.'"';
	$result=mysql_query($query) or die(mysql_error());
	$array_pedido=mysql_fetch_array($result);
	$numero_pedido=$array_pedido["numero"];
	$q1='update pedido_numero set numero="'.( $numero_pedido + 1 ).'" where  id_sucursal="'.$id_sucursal.'"';
	mysql_query($q1)or die(mysql_error());
}
#-----------------------------------------


?>