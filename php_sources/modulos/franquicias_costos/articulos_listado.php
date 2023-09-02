<?php
?>




<center>
<?php
//include("connect.php");

//$query=base64_decode($_POST["query"]);

//echo $query."<br>";
//$query='select * from articulos order by marca, clasificacion, subclasificacion';
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<table border="1">';
echo "<tr>";
	echo "<th>id</th>";
	echo "<th>codigo_interno</th>";
	echo "<th>marca</th>";
	echo "<th>descripcion</th>";
	echo "<th>color</th>";
	echo "<th>contenido</th>";
	echo "<th>presentacion</th>";
	echo "<th>codigo_barra</th>";
	echo "<th>clasificacion</th>";
	echo "<th>subclasificacion</th>";
	
//	echo "<th>precio_costo</th>";
/*
	echo "<th>descuento1</th>";
	echo "<th>descuento2</th>";
	echo "<th>descuento3</th>";
	echo "<th>descuento4</th>";
	echo "<th>descuento5</th>";
	echo "<th>descuento6</th>";
	*/
//	echo "<th>iva</th>";
////	echo "<th>margen</th>";
	echo "<th>Descuento</th>";
	echo "<th>P/venta</th>";

//	echo "<th>Mes</th>";
//	echo "<th>Tres</th>";
//	echo "<th>Seis</th>";
	
//	echo "<th>Cantidad</th>";
//	echo "<th>Subtotal</th>";
//	echo "<th>Descuento</th>";
//	echo "<th>Total descuento</th>";
//	echo "<th>Total</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	$q='select * from costos where id_articulos="'.$row["id"].'"';
	//echo $q."<br>";
	$res=mysql_query($q);
	if(mysql_error()){echo mysql_error()."<br>";}
	$array_costo=mysql_fetch_array($res);
	$q2='select * from ventas_estadistica where id_articulo="'.$row["id"].'"';
	$res3=mysql_query($q2);
	$array_estadistica=mysql_fetch_array($res3);
	
	$q3='select descuento from margenes_descuentos where margen="'.$array_costo["margen"].'"';
	$array3=mysql_fetch_array(mysql_query($q3));	
	
	
	echo "<tr>";
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["codigo_interno"].'</td>';
	echo '<td>'.$row["marca"].'</td>';
	echo '<td>'.$row["descripcion"].'</td>';
	echo '<td>'.$row["color"].'</td>';
	echo '<td>'.$row["contenido"].'</td>';
	echo '<td>'.$row["presentacion"].'</td>';
	echo '<td>'.$row["codigo_barra"].'</td>';
	echo '<td>'.$row["clasificacion"].'</td>';
	echo '<td>'.$row["subclasificacion"].'</td>';

//	echo '<td>'.$array_costo["precio_costo"].'</td>';
	/*
	echo '<td>'.$array_costo["descuento1"].'</td>';
	echo '<td>'.$array_costo["descuento2"].'</td>';
	echo '<td>'.$array_costo["descuento3"].'</td>';
	echo '<td>'.$array_costo["descuento4"].'</td>';
	echo '<td>'.$array_costo["descuento5"].'</td>';
	echo '<td>'.$array_costo["descuento6"].'</td>';
	*/
	
//	echo '<td>'.$array_costo["iva"].'</td>';
//	echo '<td>'.$array_costo["margen"].'</td>';
	echo '<td>'.$array3["descuento"].'</td>';
	echo '<td>'.calcula_precio_venta($array_costo).'</td>';
//	echo '<td>'.$array_estadistica["mes"].'</td>';
//	echo '<td>'.$array_estadistica["tres"].'</td>';
//	echo '<td>'.$array_estadistica["seis"].'</td>';
	echo "</tr>".chr(10);
}




#---------------------------------------------------------------------------------------------
function calcula_precio_venta( $array_costos ){
        $temp1=( ( $array_costos["precio_costo"] * ( $array_costos["descuento1"] * -1 ) ) / 100 )+ $array_costos["precio_costo"];
        $temp1=( ( $temp1 * ( $array_costos["descuento2"] * -1 ) ) / 100 )+ $temp1;
        $temp1=( ( $temp1 * ( $array_costos["descuento3"] * -1 ) ) / 100 )+ $temp1;
        $temp1=( ( $temp1 * ( $array_costos["descuento4"] * -1 ) ) / 100 )+ $temp1;
        $temp1=( ( $temp1 * ( $array_costos["descuento5"] * -1 ) ) / 100 )+ $temp1;
        $temp1=( ( $temp1 * ( $array_costos["descuento6"] * -1 ) ) / 100 )+ $temp1;
        $temp1=( ( $temp1 * ( $array_costos["descuento7"] * -1 ) ) / 100 )+ $temp1;
        $temp1=( ( $temp1 * ( $array_costos["descuento8"] * -1 ) ) / 100 )+ $temp1;
        $temp1=( ( $temp1 * ( $array_costos["descuento9"] * -1 ) ) / 100 )+ $temp1;
        $temp1=( ( $temp1 * ( $array_costos["descuento10"] * -1 ) ) / 100 )+ $temp1;
        $temp1=( ( $temp1 * $array_costos["iva"] ) / 100 )+ $temp1;
        $temp1=( ( $temp1 * $array_costos["margen"] ) / 100 )+ $temp1;
        return round($temp1,2);
}
#---------------------------------------------------------------------------------------------












?>
</table></center>
