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

$query='select * from articulos order by marca, 
                clasificacion, 
                subclasificacion, 
                descripcion';

$result=mysql_query($query)or die(mysql_error());
$numrows=mysql_num_rows($result);
#---------------------------------------------------------------

echo '<center>';

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
	<th>Stock</th>
	<th>Sugerido</th>
	<th>Minimo</th>
	<th>Maximo</th>
	<th>Mes</th>
	<th>Tres</th>
	<th>Seis</th>
	<th>Nueve</th>
	<th>Doce</th>
</tr>
<form action="stock_update2.php" method="post" enctype="multipart/form-data">


<?php
$count=0;
while($row=mysql_fetch_array($result)){

	//$precio_costo=calcula_precio_costo( array_costo($row["id"]) );
	// $seg=seg_stock($row["id"], 33);
	$array_stock=stock_sucursal($row["id"],33);

	$fijo=($array_stock["maximo"] - $array_stock["stock"] );
	if($fijo<1){
		$fijo=0;
	}

    if($array_stock["stock"]<0){
        $stock=0;
    }else{
        $stock=$array_stock["stock"];
    }
    $sugerido=($array_stock["maximo"] - $stock);
    if($sugerido<0){
        $sugerido=0;
    }

    if($sugerido>0){
        $count++;
        echo "<tr>";
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
        echo '<td>'.$array_stock["stock"].'</td>';
        echo '<td>'.$sugerido.'</td>';
        echo '<td>'.$array_stock["minimo"].'</td>';
        echo '<td>'.$array_stock["maximo"].'</td>';
        include("rotacion_export.inc.php");
        echo "</tr>".chr(13);
    }
}



echo "</table>";

echo "total: ".$count."<br>";









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
