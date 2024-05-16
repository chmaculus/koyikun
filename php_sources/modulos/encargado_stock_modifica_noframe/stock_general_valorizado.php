<?php

include_once("../../includes/connect.php");
include_once("cabecera.inc.php");

include_once("../../includes/funciones_varias.php");
include_once("../../includes/funciones_costos.php");
include_once("../../includes/funciones_precios.php");


?>


<body>



<center>
<titulo>Minimos y Maximos de stock</titulo>

<?php

$fecha=date("Y-n-d");




$fecha=date("Y-n-d");
$nombre_sucursal=nombre_sucursal($id_sucursal);


echo "Sucursal: $nombre_sucursal <br>";

$query='select * from articulos where marca="colorage" 
order by marca, 
                clasificacion, 
                subclasificacion, 
                descripcion';

$result=mysql_query($query)or die(mysql_error());
$numrows=mysql_num_rows($result);
#---------------------------------------------------------------

echo '<center>';
echo 'Sucursal: '.$nombre_sucursal.'<br>';

echo '<br>Cantidad de articulos: '.$numrows.'<br>';

?>

<table border="1">
<tr>
	<th>ID</th>
	<th>Cod Int</th>
	<th>Marca</th>
	<th>Descripcion</th>
	<th>Color</th>
	<th>Contenido</th>
	<th>Pesentacion</th>
	<th>Clasificacion</th>
	<th>Sub-clasificacion</th>
	<th>cod barra</th>
	<th>Costo</th>
	<th>Stock</th>
	<th>Sub total</th>
</tr>


<?php

$array_articulos=array();
while($row=mysql_fetch_array($result)){
    $array_articulos[]=$row;
}

echo date("Y-m-d H:i:s")."<br>";
$count=0;
/*
foreach($array_articulos as $row){
    $count++;

    $array_costo=array_costo($row["id"]);
    $array_stock=stock_sucursal($row["id"],33);

    if($array_stock["stock"]<1){
        $stock=0;
    }else{
        $stock=$array_stock["stock"];
    }
    if($array_costo==0){
        // echo "sin costo ".$row["id"]." ".$row["marca"]." ".$row["descripcion"]." ".$row["clasificacion"]."<br>";
    }else{
        // echo $row["id"]." ".$stock."<br>";
        
    }
    if($stock>0 and $array_costo!=0){
        // echo "arr2: ".print_r($array_stock,true);
        // echo $row["id"]." ".$row["marca"]." ".$row["descripcion"]." ".$row["clasificacion"]."<br>";
        $array_descuento=trae_descuento_franquicia($array_costo["margen"]);
        // echo "ppp".print_r($array_descuento,true);
        $costo=calcula_precio_costo_franquicia( $array_costo, $array_descuento["descuento"] );
        $totcosto=$totcosto+$costo;
}
    if($count>100){
        // exit;
    }
    
}

echo "total costo".$totcosto."<br>";


exit;
*/

$count=0;
foreach($array_articulos as $row){
	echo "<tr>";
	$count++;

	//$precio_costo=calcula_precio_costo( array_costo($row["id"]) );
	// $seg=seg_stock($row["id"], 33);
	$array_stock=stock_sucursal($row["id"],33);
	$array_costo=array_costo($row["id"]);
	// echo "<td>".print_r($array_costo,true)."</td>";

	if($array_stock["stock"]<0){
        $stock=0;
    }else{
        $stock=$array_stock["stock"];
	}

	if($array_costo["precio_costo"]>0 and $array_costo["iva"]>0 and $array_costo["margen"]>0){
		// echo "<td>if1</td>";
		$array_descuento=trae_descuento_franquicia($array_costo["margen"]);
		$costo_franquicia=calcula_precio_costo_franquicia( $array_costo, $array_descuento["descuento"] );
		if($stock>0){
			// echo "<td>if2</td>";
			$subtot=$costo_franquicia * $stock;
		}else{
			// echo "<td>if3</td>";
			$subtot=0;
		}
		
	}else{
		// echo "<td>if4</td>";
		$subtot=0;
	}



	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["codigo_interno"].'</td>';
	echo '<td>'.$row["marca"].'</td>';
	echo '<td>'.$row["descripcion"].'</td>';
	echo '<td>'.$row["color"].'</td>';
	echo '<td>'.$row["contenido"].'</td>';
	echo '<td>'.$row["presentacion"].'</td>';
	echo '<td>'.$row["clasificacion"].'</td>';
	echo '<td>'.$row["subclasificacion"].'</td>';
	echo '<td>'.$row["codigo_barra"].'</td>';
    echo '<td>'.$costo_franquicia.'</td>';
	echo '<td>'.$array_stock["stock"].'</td>';
	echo '<td>'.$subtot.'</td>';


	echo "</tr>".chr(13);
}



echo "</table>";
// echo '<input type="hidden" name="id_sucursal" value="'.$id_sucursal.'">';
// echo '<input type="hidden" name="query" value="'.base64_encode($query).'">';
// echo '<input type="submit" name="ACEPTAR" value="ACEPTAR">';
// echo "</form>";









#---------------------------------------------------------------------------------------------
function aa1($id_articulo, $id_sucursal){
	$q='select stock, maximo from stock where id_articulo="'.$id_articulo.'" and id_sucursal="'.$id_sucursal.'"';
	//echo $q."<br>";
	$r=mysql_query($q);
	$rows=mysql_num_rows($r);
	
	if($rows==1){
		$row=mysql_fetch_array($r);
		$reponer = ($row["maximo"] - $row["stock"]) ;
		if ($reponer<0){
			$reponer=0;
		}
		return $reponer;
		 
	}
}
#---------------------------------------------------------------------------------------------






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
		$array["id_sucursal"]=$id_sucursal;
		$array["rows"]=0;
		return $array;		
	}
}
#-----------------------------------------------------------------


#-----------------------------------------------------------------
function seg_stock($id_articulo, $id_sucursal){
	//$q='select id from seguimiento_stock where id_articulo="'.$id_articulo.'" and (origen="'.$id_sucursal.'" or destino="'.$id_sucursal.'")';
	$q='select * from seguimiento_stock where id_articulo="'.$id_articulo.'" and 	(
																																(	(origen="'.$id_sucursal.'" and tipo="EN") or  
																																	(destino="'.$id_sucursal.'" and tipo="RE") or
																																	(origen="'.$id_sucursal.'" and tipo="VE") or
																																	(origen="'.$id_sucursal.'" and tipo="MD")
																													 			)  
																													 		)   order by fecha, hora';

	$res=mysql_query($q);
	$rows=mysql_num_rows($res);
	return $rows;
}
#-----------------------------------------------------------------



?>
</center>
</body>
</html>
