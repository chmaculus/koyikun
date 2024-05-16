<?php

include_once("../../includes/connect.php");
include_once("cabecera.inc.php");

include_once("../../includes/funciones_varias.php");
include_once("../../includes/funciones_costos.php");
include_once("../../includes/funciones_precios.php");


?>

<script language="javascript" src="js/jquery-1.3.min.js"></script>
<script language="javascript" src="funciones.js"></script>


<body>



<center>
<titulo>Minimos y Maximos de stock</titulo>

<?php

$fecha=date("Y-n-d");


echo '<form action="'.$_SERVER["SCRIPT_NAME"].'" method="post" >';

echo '<table>';
echo '<tr>';



echo '<td>';
include("select.inc.php");
echo '</td>';


echo '</tr>';
echo '</table>';


echo "</form>";

if(!$_POST["id_sucursal"] or !$_POST["marca"]){
    exit;
}else{
    $id_sucursal=$_POST["id_sucursal"];
}

$fecha=date("Y-n-d");
$nombre_sucursal=nombre_sucursal($id_sucursal);


echo "Sucursal: $nombre_sucursal <br>";

#---------------------------------------------------------------
if($_POST["marca"]!="" AND $_POST["clasificacion"]=="" AND $_POST["subclasificacion"]=="" ){
	$query='select * from articulos where marca="'.$_POST["marca"].'" order by marca, clasificacion, subclasificacion, descripcion';
}

if($_POST["marca"]!="" AND $_POST["clasificacion"]!="" AND $_POST["subclasificacion"]=="" ){
	$query='select * from articulos where marca="'.$_POST["marca"].'" and clasificacion="'.$_POST["clasificacion"].'" order by marca, clasificacion, subclasificacion, descripcion';
}

if($_POST["marca"]!="" AND $_POST["clasificacion"]!="" AND $_POST["subclasificacion"]!="" ){
	$query='select * from articulos where marca="'.$_POST["marca"].'" and clasificacion="'.$_POST["clasificacion"].'" and subclasificacion="'.$_POST["subclasificacion"].'" order by marca, clasificacion, subclasificacion, descripcion';
}

$result=mysql_query($query)or die(mysql_error());
$numrows=mysql_num_rows($result);
#---------------------------------------------------------------

echo '<center>';
echo 'Sucursal: '.$nombre_sucursal.'<br>';

echo '<br>Cantidad de articulos: '.$numrows.'<br>';

?>

<table class="t1">
<tr>
	<th>ID</th>
	<th>Cod Int</th>
	<th>Descripcion</th>
	<th>Color</th>
	<th>Contenido</th>
	<th>Pesentacion</th>
	<th>Clasificacion</th>
	<th>Sub-clasificacion</th>
	<th>cod barra</th>
	<th>Acc.</th>
	<th>Ingresar</th>
	<th>Sugerido</th>
	<th>Minimo</th>
	<th>Maximo</th>
	<th>Fecha</th>
	<th>Hora</th>
</tr>
<form action="stock_update2.php" method="post" enctype="multipart/form-data">


<?php
while($row=mysql_fetch_array($result)){
	//$precio_costo=calcula_precio_costo( array_costo($row["id"]) );
	$seg=seg_stock($row["id"], $id_sucursal);
	$array_stock=stock_sucursal($row["id"],$id_sucursal);

	$fijo=($array_stock["maximo"] - $array_stock["stock"] );
	if($fijo<1){
		$fijo=0;
	}
	
	echo "<tr>";
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["codigo_interno"].'</td>';
	echo '<td>'.$row["descripcion"].'</td>';
	echo '<td>'.$row["color"].'</td>';
	echo '<td>'.$row["contenido"].'</td>';
	echo '<td>'.$row["presentacion"].'</td>';
	echo '<td>'.$row["clasificacion"].'</td>';
	echo '<td>'.$row["subclasificacion"].'</td>';
	echo '<td>'.$row["codigo_barra"].'</td>';
	// echo '<td><form action="stock_modifica.php" method="post" target="FrameMedio2"><input type="hidden" name="id_articulos" value="'.$row["id"].'" /> <input type="hidden" name="id_sucursal" value="'.$id_sucursal.'" /><input type="submit" name="stock" value="stock" /></form></td>';
	echo '<td>';if($seg>0){ echo '<form action="aa.php" method="post" target="FrameMedio2"><input type="hidden" name="id_articulos" value="'.$row["id"].'" /> <input type="hidden" name="id_sucursal" value="'.$id_sucursal.'" /><input type="submit" name="seguir" value="seguir '.$seg.'" /></form>';} echo '</td>';
	echo '<td>';
    include("select_cantidad.inc.php");
    echo '</td>';
	if($fijo>0){
		echo '<td><font color="#007603" size="10px">'.$fijo.'</font></td>'.chr(10);
	}else{
		echo '<td><font color="#000000">'.$fijo.'</font></td>'.chr(10);
	}
	
	echo '<td><input type="text" name="minimo'.$row["id"].'" value="'.$array_stock["minimo"].'" size="3"></td>';
	echo '<td><input type="text" name="maximo'.$row["id"].'" value="'.$array_stock["maximo"].'" size="3"></td>';
	echo '<td>';
	include("rotacion.inc.php");

	echo '</td>';
	// echo '<td>'.$array_stock["minimo"].'</td>';
	// echo '<td>'.$array_stock["maximo"].'</td>';
	echo '<td>'.$array_stock["fecha"].'</td>';
	echo '<td>'.$array_stock["hora"].'</td>';


	echo "</tr>".chr(13);
}



echo "</table>";
echo '<input type="hidden" name="id_sucursal" value="'.$id_sucursal.'">';
echo '<input type="hidden" name="query" value="'.base64_encode($query).'">';
echo '<input type="submit" name="ACEPTAR" value="ACEPTAR">';
echo "</form>";









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
