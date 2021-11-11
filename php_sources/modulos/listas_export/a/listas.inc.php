<?php



$qa='select * from listas';
$resb=mysql_query($qa);
if(mysql_error()){echo mysql_error()." ".$qa."<br>";}
while($rowss=mysql_fetch_array($resb)){
	$array_listas[]=$rowss;
}



?>


<table class="t1">
<tr>
	<th>Costo</th>
	<th>Margen</th>
	<th>Precio<br>venta</th>
	<?php
		foreach($array_listas as $value){
			echo '<th>'.$value["nombre"].'</th>';
		}
	?>
	<th>fecha</th>
</tr>

<?php

	$array_costo=array_costos($id_articulo);
	$costo=calcula_precio_costo($id_articulo);
	$array_precios=precio_sucursal($id_articulo,"1");

	echo '<td>$'.round($costo,2).'</td>';
	echo '<td>'.$array_costo["margen"].'%</td>';
	echo '<td>$'.$array_precios["precio_base"].'</td>';

	////////////////////////////////////////
	foreach($array_listas as $value){
	/*
		$array1=trae_valor_lista($value["id"], $array_precios["id_articulo"]);
		*/
		$precio1=(($array_precios["precio_base"] * $array1["porcentaje"])/100) + $array_precios["precio_base"];
		$margen1=((($precio1 / $costo)*100)-100);
		echo '<td><table border="1">';
		echo "<tr>";
		echo '<td>% desc</td>';
		echo '<td>'.$array1["porcentaje"].'%</td>';
		echo "</tr>";
		echo "<tr>";
		echo '<td>Precio</td>';
		echo '<td>$'.round($precio1,2).'</td>';
		echo "</tr>";
		echo "<tr>";
		echo '<td>Margen</td>';
		echo '<td>'.round($margen1,2).'%</td>';
		echo "</tr>";
		echo '</table></td>';
	}
	////////////////////////////////////////
	///vsphere
	
	echo '<td>'.$array_precios["fecha"].'</td>';
	
	echo "</tr>";


echo "</table>";
#---------------------------------------------------------------------------------




#---------------------------------------------------------------------------------
function precio_sucursal($id_articulo,$id_sucursal){
	$query='select * from precios where id_articulo="'.$id_articulo.'" and id_sucursal="'.$id_sucursal.'"';
	echo $query."<br>";
	$res=mysql_query($query) or die(mysql_error()." ".$SCRIPT_NAME);
	$rows=mysql_num_rows($res);
	if($rows==1){
		$array_precios=mysql_fetch_array($res);
		return $array_precios;		
	}
	if($rows<1){
		$array_precios["precio_base"]="0";
		$array_precios["porcentaje_contado"]="0";
		$array_precios["porcentaje_tarjeta"]="0";
		return $array_precios;		
	}
return $array_precios;
}
#---------------------------------------------------------------------------------




#---------------------------------------------------------------------------------
function trae_valor_lista($id_lista, $id_articulo){
	$q='select * from listas_porcentaje where id_lista="'.$id_lista.'" and id_articulos="'.$id_articulo.'"';
	echo $query."<br>";
	$res=mysql_query($q);
	//if(mysql_error()){echo "<td>".mysql_error()."</td>";}
	$rows=mysql_num_rows($res);
	//echo "<td>".$q."<br>";
	//echo "rows: ".$rows."</td>";
	if($rows==1){
		$array=mysql_fetch_array($res);
		return $array;
	}else{
		return NULL;
	}
#---------------------------------------------------------------------------------
}


?>