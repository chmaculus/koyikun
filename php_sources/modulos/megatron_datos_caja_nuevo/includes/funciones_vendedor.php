<?php



#-----------------------------------------------------------------
function nombre_vendedor($vendedor){
	$query='select * from vendedores where numero="'.$vendedor.'"';
	$res=mysql_query($query);
	$rows=mysql_num_rows($res);
	if($rows<1){
		$array="NULL";
		return $array;
	}else{
		$array=mysql_fetch_array($res);
		//echo $query;
		return $array;
	}
}
#-----------------------------------------------------------------

#------------------------------------------------
function totales_vendedor( $fecha, $sucursal, $hora_desde, $hora_hasta ){
	$q0='select distinct vendedor from ventas where fecha="'.$fecha.'" and sucursal="'.$sucursal.'" and hora>="'.$hora_desde.'" and hora<="'.$hora_hasta.'" order by vendedor';
	$r0=mysql_query($q0);
	while($row=mysql_fetch_array($r0)){
		$mes=date("Y-n");
		$q1='select sum(cantidad * precio_unitario) from ventas where vendedor="'.$row[0].'" and fecha="'.$fecha.'" and sucursal="'.$sucursal.'" and hora>="'.$hora_desde.'" and hora<="'.$hora_hasta.'"';
		$r1=mysql_query($q1);
		$tot=mysql_result($r1,0,0);
		$array=nombre_vendedor($row[0]);
		if($array!="NULL"){
			$nombre=$array["nombres"]." ".$array["apellido"];
		}else{
			$nombre=$row[0];
		}
		echo "<tr>";
				if(file_exists ( "./vendedores/".$array["id"].".jpg" )==1){
		echo '<td><A HREF="detalle.php?id_articulo='.$$array["id"].'" onClick="return popup(this, \'notes\')">
		<img  src="./vendedores/'.$array["id"].'".jpg" width="100" height="100">
		</A></td>';


		//echo '<td><img src="./imagenes/miniaturas/'.$row["id"].'".jpg" alt=""></td>';
		
	}else{
	echo '<td>'.$array["id"].'</td>';
	}
		
		echo "<td>Vend: ".$nombre."</td>";
		echo "<td>$".$tot."</td>";
		echo "</tr>";
		$res=mysql_query('select sum(cantidad * precio_unitario),sucursal from ventas where vendedor="'.$row[0].'" and fecha>="'.$mes.'-01" and fecha<="'.$mes.'-31" group by sucursal');
		echo '<!-- jajajaja -->';
		if(mysql_error()){echo '<tr><td><!-- jejeje -->'.mysql_error().'</td></tr>';}
		while($row2=mysql_fetch_array($res)){
			echo '<tr><!-- jejeje -->';
			echo "<td>$row2[0]</td>";
			echo "<td>$row2[1]</td>";
			echo '</tr>';
		}
	}
}
#------------------------------------------------


#------------------------------------------------
function totales_vendedor2( $fecha ){
	$q4='truncate table temp_vendedores ';
	mysql_query($q4);
	
	$q0='select distinct vendedor from ventas where fecha="'.$fecha.'" order by vendedor';
	$r0=mysql_query($q0);
	if(mysql_error()){echo mysql_error();}
	while($row=mysql_fetch_array($r0)){
		$q1='select sum(cantidad * precio_unitario) from ventas where vendedor="'.$row[0].'" and fecha="'.$fecha.'"';
		$r1=mysql_query($q1);
		if(mysql_error()){echo mysql_error();}
		$tot=mysql_result($r1,0,0);
		$q3='insert into temp_vendedores set numero="'.$row[0].'", total="'.$tot.'"';
		mysql_query($q3);
		if(mysql_error()){echo mysql_error();}
	}
	$q4='select * from temp_vendedores order by total desc';
	$r1=mysql_query($q4);
	if(mysql_error()){echo mysql_error();}

	while($row=mysql_fetch_array($r1)){
		$count++;
		$array=nombre_vendedor($row["numero"]);
		if($array!="NULL"){
			$nombre=$array["nombres"]." ".$array["apellido"];
		}else{
			$nombre=$row["numero"];
		}
		echo "<tr>";
				if(file_exists ( "./vendedores/".$array["id"].".jpg" )==1){
		echo '<td><A HREF="detalle.php?id_articulo='.$$array["id"].'" onClick="return popup(this, \'notes\')">
		<img  src="./vendedores/'.$array["id"].'".jpg" width="100" height="100">
		</A></td>';
	}else{
	echo '<td>'.$array["id"].'</td>';
	}

		echo "<td>".$count." Vend: ".$nombre."</td>";
		echo "<td>$".$row["total"]."</td>";
		echo "</tr>";
		}
	
	
}
#------------------------------------------------

#------------------------------------------------
function totales_vendedor2_mes( $fecha ){
	$fa=explode("-",$fecha);
	$fecha_desde=$fa[0]."-".$fa[1]."-01";
	$fecha_hasta=$fa[0]."-".$fa[1]."-31";
	$q4='truncate table temp_vendedores ';
	mysql_query($q4);
	
	$q0='select distinct vendedor from ventas where fecha>="'.$fa[0]."-".$fa[1].'-01" and fecha<="'.$fa[0]."-".$fa[1].'-31" order by vendedor';
	$r0=mysql_query($q0);
	if(mysql_error()){echo mysql_error();}

	while($row=mysql_fetch_array($r0)){
		$q1='select sum(cantidad * precio_unitario) from ventas where vendedor="'.$row[0].'" and fecha>="'.$fa[0]."-".$fa[1].'-01" and fecha<="'.$fa[0]."-".$fa[1].'-31"';
		$r1=mysql_query($q1);
		if(mysql_error()){echo mysql_error();}
		$tot=mysql_result($r1,0,0);
		$q3='insert into temp_vendedores set numero="'.$row[0].'", total="'.$tot.'"';
		mysql_query($q3);
		if(mysql_error()){echo mysql_error();}
	}
	$q4='select * from temp_vendedores order by total desc';
	$r1=mysql_query($q4);
	if(mysql_error()){echo mysql_error();}
	while($row=mysql_fetch_array($r1)){
		$count++;
		$array=nombre_vendedor($row["numero"]);
		if($array!="NULL"){
			$nombre=$array["nombres"]." ".$array["apellido"];
		}else{
			$nombre=$row["numero"];
		}
		echo "<tr>";

		if(file_exists ( "./vendedores/".$array["id"].".jpg" )==1){
		echo '<td><A HREF="detalle.php?id_articulo='.$$array["id"].'" onClick="return popup(this, \'notes\')">
		<img  src="./vendedores/'.$array["id"].'".jpg" width="100" height="100">
		</A></td>';
	}else{
	echo '<td>'.$array["id"].'</td>';
	}
	$dias=dias_vendedor($row["numero"], $fecha_desde, $fecha_hasta);
	$promedio=$row["total"] / $dias;
		echo "<td>".$count." Vend: ".$row["vendedor"]." ".$nombre."</td>";
		echo "<td>$".$row["total"]."</td>";
		echo "<td>D ".$dias."</td>";
		echo "<td>Prom: $".round($promedio,2)."</td>";
		echo "<td>Proy: $".round(($promedio * 26),2)."</td>";
		
		echo "</tr>";
		}
	
	
}
#------------------------------------------------

#-----------------------------------------------------------------
function dias_vendedor($vendedor, $fecha_desde, $fecha_hasta){
	$q1='select  distinct fecha from ventas where vendedor="'.$vendedor.'" and fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'"';
	$r=mysql_query($q1);
	$rows=mysql_num_rows($r);
return $rows;
}				
#-----------------------------------------------------------------



?>