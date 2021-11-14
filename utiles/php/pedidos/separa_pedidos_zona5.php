<?php
#modulo utilitario para separar pedidos zona 5


include("./includes/connect.php");
include("./includes/funciones_varias.php");


#---------------------------------------------------------------------------------------------------------
echo "#---------------------------------------------------------\n";
$query='select distinct pedidos.numero_pedido, 
												pedidos.sucursal, 
												pedidos.fecha, 
												marcas_zonas.zona from pedidos, 
																marcas_zonas where pedidos.finalizado="N" and 
																							pedidos.marca=marcas_zonas.marca and 
																							pedidos.clasificacion=marcas_zonas.clasificacion and 
																							marcas_zonas.subclasificacion is NULL and
																							marcas_zonas.zona="5" order by fecha, sucursal';
$result=mysql_query($query);

while($row=mysql_fetch_array($result)){
	$q='select distinct pedidos.marca, 
							pedidos.clasificacion 
									from pedidos, marcas_zonas 
											where pedidos.marca=marcas_zonas.marca and 
															pedidos.clasificacion=marcas_zonas.clasificacion and
															marcas_zonas.subclasificacion is null and  
															numero_pedido="'.$row[0].'" and 
															sucursal="'.$row[1].'" and 
															finalizado="N"';
	incrementa_n_pedido($row[1]);
	$npedid=get_numero_pedido($row[1]);
	$res=mysql_query($q);

	$q=str_replace(chr(9),"",$q);
	echo str_replace(chr(10),"",$q).";".chr(10);

	while($row2=mysql_fetch_array($res)) {
		$q2='update pedidos set numero_pedido="'.$npedid.'" where sucursal="'.$row[1].'" and numero_pedido="'.$row[0].'" and marca="'.$row2[0].'" and clasificacion="'.$row2[1].'"';
		
		mysql_query($q2);
	$q2=str_replace(chr(9)," ",$q2);
	echo str_replace(chr(10),"",$q2).";".chr(10);
		if(mysql_error()){echo mysql_error().chr(10);}
	}

	echo chr(10);
}
#---------------------------------------------------------------------------------------------------------
echo "#---------------------------------------------------------\n";
echo "#---------------------------------------------------------\n";
echo "#---------------------------------------------------------\n";











#---------------------------------------------------------------------------------------------------------
$query='select distinct pedidos.numero_pedido, 					
												pedidos.sucursal, 
												pedidos.fecha, 
													marcas_zonas.zona from pedidos, marcas_zonas where pedidos.finalizado="N" and 
																										pedidos.marca=marcas_zonas.marca and 
																										pedidos.clasificacion=marcas_zonas.clasificacion and 
																										pedidos.subclasificacion=marcas_zonas.subclasificacion and
																										pedidos.subclasificacion is not null and 
																										marcas_zonas.zona="5" order by fecha, sucursal';
$result=mysql_query($query);

	$q=str_replace(chr(9),"",$query);
	echo str_replace(chr(10),"",$q).";".chr(10);

while($row=mysql_fetch_array($result)){
	$q='select distinct pedidos.marca, 
										pedidos.clasificacion, 
										pedidos.subclasificacion 
												from pedidos, 
																				marcas_zonas where pedidos.marca=marcas_zonas.marca and 
																						 pedidos.clasificacion=marcas_zonas.clasificacion and  
																						pedidos.subclasificacion=marcas_zonas.subclasificacion and
																						marcas_zonas.subclasificacion is not null and 
																						numero_pedido="'.$row[0].'" and 
																						sucursal="'.$row[1].'" and 
																						finalizado="N"';
	incrementa_n_pedido($row[1]);
	$npedid=get_numero_pedido($row[1]);
	$res=mysql_query($q);
	
	$q=str_replace(chr(9),"",$q);
	echo str_replace(chr(10),"",$q).";".chr(10);
	
	while($row2=mysql_fetch_array($res)) {
		$q2='update pedidos set numero_pedido="'.$npedid.'" where sucursal="'.$row[1].'" and numero_pedido="'.$row[0].'" and marca="'.$row2[0].'" and clasificacion="'.$row2[1].'" and
		 subclasificacion="'.$row2[2].'"';
		
			mysql_query($q2);

	$q2=str_replace(chr(9),"",$q2);
	echo str_replace(chr(10),"",$q2).";".chr(10);

		if(mysql_error()){echo mysql_error().chr(10);}
	}

	echo chr(10);
}
#---------------------------------------------------------------------------------------------------------
echo "#---------------------------------------------------------\n";






















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

