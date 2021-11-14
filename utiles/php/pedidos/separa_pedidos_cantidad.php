<?php
#modulo utilitario para separar en zonas los pedidos existentes

/*

*/

//echo "#jejejejeje".chr(10);

include("./includes/connect.php");
include("./includes/funciones_varias.php");

$q='select distinct sucursal,numero_pedido  from pedidos where finalizado="N" order by sucursal, numero_pedido';
echo "#".$q.chr(10);

$res=mysql_query($q);
if(mysql_error()){echo mysql_error()." #".$q." ".chr(10);}


#------------------------------------------------------------------------------
while($row=mysql_fetch_array($res))
{
	$q='select count(*) from pedidos where sucursal="'.$row[0].'" and numero_pedido="'.$row[1].'"';
	echo $q.";".chr(10);
	$rows=mysql_result(mysql_query($q),0,0);
	echo "rows: ".$rows."".chr(10);
	$cantidad=30;

	if($rows>=$cantidad){
		$q='select id from pedidos where sucursal="'.$row[0].'" and numero_pedido="'.$row[1].'" order by marca, clasificacion, subclasificacion  limit 29,1000';
		echo 'rows: '.$rows.' cant: '.$cantidad.' cant2: '.$cantidad2.chr(10); 
 
		echo '# '.$q.chr(10).chr(10);
		$res2=mysql_query($q);
		if(mysql_error()){echo mysql_error()." #".$q." ".chr(10);}
		
		incrementa_n_pedido($row[0]);
		$npedid=get_numero_pedido($row[0]);

		$count1=0;		
		while($row_id=mysql_fetch_array($res2))
		{
			$q2='update pedidos set numero_pedido="'.$npedid.'" where id="'.$row_id[0].'"';
			mysql_query($q2);
			if(mysql_error()){echo mysql_error()." #".$q2." ".chr(10);}
			$count1++;
			echo '#id: '.$row_id[0]." count2: ".$count2." count3: ".$count3.chr(10);
			echo '#'.$q2.chr(10);
			if($count1>=$cantidad)
			{				
				$count1=0;
				echo "#-------------------------------------".chr(10);	
				incrementa_n_pedido($row[0]);
				$npedid=get_numero_pedido($row[0]);

			}
		}
	}
	
}
#------------------------------------------------------------------------------
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