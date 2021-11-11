<?php
#modulo utilitario para separar en zonas los pedidos existentes

/*

*/

include("./includes/connect.php");

$q='select distinct pedidos.numero_pedido as ped, pedidos.sucursal from pedidos where finalizado="N" order by ped';

//echo "#".$q.chr(10);

$res=mysql_query($q);
if(mysql_error()){echo mysql_error()." #".$q." ".chr(10);}
$count=0;
while($row=mysql_fetch_array($res)){

	$q='select distinct marcas_zonas.zona as zona from pedidos, marcas_zonas where pedidos.marca=marcas_zonas.marca and pedidos.numero_pedido="'.$row[0].'" and sucursal="'.$row[1].'" and finalizado="N" order by zona';
	//echo "#while zonas".chr(10)."#".$q.chr(10);
	
	$res2=mysql_query($q);
	if(mysql_error()){echo mysql_error();}
	$count1=0;
	#---------------------------------------------------------------------------------
	while($zzzz=mysql_fetch_array($res2))
	{
		if($count1>0)
		{
			incrementa_n_pedido($row[1]);
			//echo '#p:'.$row[0].' s:'.$row[1].' z:'.$zzzz[0].' vz:'.$zona.' m:'.$row2[0]." r2:".$row2[0]." vm:".$marca." cou:".$count2.chr(10);
			$q='select distinct pedidos.marca as marca, marcas_zonas.zona as zona from pedidos, marcas_zonas where pedidos.marca=marcas_zonas.marca and pedidos.numero_pedido="'.$row[0].'" and sucursal="'.$row[1].'" and zona="'.$zzzz[0].'" and finalizado="N" order by marca';
			//echo "#while marcas".chr(10).$q.";".chr(10).chr(10);

			$res3=mysql_query($q);
			$count2=0;
			#-----------------------------------------------------------
			while($arr_marca=mysql_fetch_array($res3))
			{
				//echo "#marca: ".$arr_marca[0]." ".$arr_marca[1].chr(10);
				{
					$npedid=get_numero_pedido($row[1]);
					$qq='update pedidos set numero_pedido="'.$npedid.'" where numero_pedido="'.$row[0].'" and sucursal="'.$row[1].'" and marca="'.$arr_marca[0].'"';
					//mysql_query($qq);

					echo $qq.";#q1".chr(10).chr(10);
					$marca=$row2[0];

				}
			}
			#-----------------------------------------------------------
		
		/*
				incrementa_n_pedido($row[1]);
				$pedido=$row[0];
		*/
		}
	$count1++;	
	}
	#-----------------------------------------------------------------------------------------------

//echo '#-----------------------------------------------------------------------------------'.chr(10);
//echo chr(10).chr(10);
//echo '#-----------------------------------------------------------------------------------'.chr(10);
}



/*
//				incrementa_n_pedido($row[1]);
				$npedid=get_numero_pedido($row[1]);
				$qq='update pedidos set numero_pedido="'.$npedid.'" where numero_pedido="'.$row[0].'" and sucursal="'.$row[1].'" and marca="'.$row[2].'"';
				echo $qq.";".chr(10).chr(10);

*/




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