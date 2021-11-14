$query='select distinct pedidos.numero_pedido, 
												pedidos.sucursal, 
												pedidos.fecha, 
												marcas_zonas.zona from pedidos, 
																					 marcas_zonas where pedidos.finalizado="N" and 
																						pedidos.marca=marcas_zonas.marca and 
																						pedidos.clasificacion=marcas_zonas.clasificacion and 
																						pedidos.subclasificacion=marcas_zonas.subclasificacion and 
																						marcas_zonas.zona="5" order by fecha, sucursal';
$result=mysql_query($query);

while($row=mysql_fetch_array($result)){
	$q='select distinct pedidos.marca, 
										pedidos.clasificacion 
										pedidos.subclasificacion 
										from pedidos, 
																				marcas_zonas where pedidos.marca=marcas_zonas.marca and 
																						 pedidos.clasificacion=marcas_zonas.clasificacion and  
																						pedidos.subclasificacion=marcas_zonas.subclasificacion and 
																						numero_pedido="'.$row[0].'" and 
																						sucursal="'.$row[1].'" and 
																						finalizado="N"';
	echo $q.";".chr(10);
	incrementa_n_pedido($row[1]);
	$npedid=get_numero_pedido($row[1]);
	$res=mysql_query($q);
	while($row2=mysql_fetch_array($res)) {
		$q2='update pedidos set numero_pedido="'.$npedid.'" where sucursal="'.$row[1].'" and numero_pedido="'.$row[0].'" and marca="'.$row2[0].'" and clasificacion="'.$row2[1].'" and subclasificacion="'.$row2[2].'"';
		
		echo $q2.";".chr(10);
		mysql_query($q2);
		if(mysql_error()){echo mysql_error().chr(10);}
	}

	echo chr(10);
}


