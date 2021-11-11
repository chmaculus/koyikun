<?php
#modulo utilitario para separar en zonas los pedidos existentes

/*

*/

//echo "#jejejejeje".chr(10);

include("./includes/connect.php");
include("./includes/funciones_varias.php");

$q='select distinct pedidos_temp_nuevo.id_sucursal from pedidos_temp_nuevo';
echo "#".$q.chr(10);

$res=mysql_query($q);
if(mysql_error()){echo mysql_error()." #".$q." ".chr(10);}


#------------------------------------------------------------------------------
while($array_sucursal=mysql_fetch_array($res))
{
	echo chr(10).'# sucursal '.$array_sucursal[0].'---------------------------------------------------------------------------------------------'.chr(10);
	$q2='select distinct marcas_zonas.zona as zona from pedidos_temp_nuevo, marcas_zonas where pedidos_temp_nuevo.marca=marcas_zonas.marca and pedidos_temp_nuevo.id_sucursal="'.$array_sucursal[0].'" order by zona';
	echo chr(10)."#".$q2.";".chr(10);
	$res2=mysql_query($q2);


	#------------------------------------------------------------------------------
	while($array_zona=mysql_fetch_array($res2))
	{
		incrementa_n_pedido($array_sucursal[0]);
		$npedid=get_numero_pedido($array_sucursal[0]);
		echo '# zona: '.$array_zona[0].chr(10);
		
		echo "#numero pedido: ".$npedid.chr(10);
		$q3='select distinct pedidos_temp_nuevo.marca, marcas_zonas.zona from pedidos_temp_nuevo, marcas_zonas where pedidos_temp_nuevo.marca=marcas_zonas.marca and pedidos_temp_nuevo.id_sucursal="'.$array_sucursal[0].'" and
		 marcas_zonas.zona="'.$array_zona[0].'"';
		 
		$res3=mysql_query($q3);

		$count1=0;
		#------------------------------------------------------------------------------
		while($array_marca=mysql_fetch_array($res3))
		{
			$q4='select * from pedidos_temp_nuevo where marca="'.$array_marca[0].'" and id_sucursal="'.$array_sucursal[0].'"';
			echo "#q4: ".$q4.";".chr(10);
			$res4=mysql_query($q4);

			#------------------------------------------------------------------------------
			while($array_pedidos=mysql_fetch_array($res4))
			{
				if($count1>=30){
					incrementa_n_pedido($array_sucursal[0]);
					$npedid=get_numero_pedido($array_sucursal[0]);
					$count1=1;
					
				}
				$query='insert into pedidos set 
					id_articulo="'.$array_pedidos["id_articulos"].'",
					numero_pedido="'.$npedid.'",
					marca="'.$array_pedidos["marca"].'",
					descripcion="'.$array_pedidos["descripcion"].'",
					contenido="'.$array_pedidos["contenido"].'",
					presentacion="'.$array_pedidos["presentacion"].'",
					clasificacion="'.$array_pedidos["clasificacion"].'",
					subclasificacion="'.$array_pedidos["subclasificacion"].'",
					cantidad_solicitada="'.$array_pedidos["cantidad"].'",
					sucursal="'.$array_pedidos["id_sucursal"].'",
					fecha="'.$array_pedidos["fecha"].'",
					hora="'.$array_pedidos["hora"].'",
					finalizado="N",
					estado="P"';

				$query=str_replace(chr(9),"",$query);
				$query=str_replace(chr(10),"",$query);
				
				echo $query.";".chr(10);
				mysql_query($query);
				if(mysql_error()){echo mysql_error()." #".$q." ".chr(10);}

				$query='delete from pedidos_temp_nuevo where id="'.$array_pedidos["id"].'"';
				mysql_query($query);
				if(mysql_error()){echo mysql_error()." #".$q." ".chr(10);}
				//echo $query.";".chr(10).chr(10);
				
			}
			#------------------------------------------------------------------------------

		}
		#------------------------------------------------------------------------------
		echo '# fin zona '.$array_zona[0].chr(10).chr(10);

	}
	#------------------------------------------------------------------------------


	echo '# fin sucursal '.$array_sucursal[0].'---------------------------------------------------------------------------------------------'.chr(10).chr(10).chr(10).chr(10);
}
echo '#fin 1er while'.chr(10).chr(10);





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