<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="style2.css" type="text/css">
  <meta content="text/html; charset=UTF-8" http-equiv="content-type" />
  <title></title>
</head>


<center>
<?php
include("connect.php");

?>
<form action="<?php echo $_SERVER["SCRIPT_NAME"]; ?>" method="post">
<select name="marca">
<?php
include("marcas.inc.php");
?>
</select>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
<BR>




<?php

if(!$_POST["ACEPTAR"]){
	exit;
}


$query='select * from ventas_estadistica  where marca="'.$_POST["marca"].'" order by tres desc';
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<table border="1">';
echo "<tr>";
    echo "<th>id</th>";
    echo "<th>marca</th>";
    echo "<th>descripcion</th>";
    echo "<th>clasificacion</th>";
    echo "<th>subclasificacion</th>";
    echo "<th>contenido</th>";
    echo "<th>presentacion</th>";
    echo "<th>mes</th>";
    echo "<th>tres</th>";
    echo "<th>seis</th>";
    echo "<th>nueve</th>";
    echo "<th>doce</th>";
    echo "<th>Minimo</th>";
    echo "<th>Maximo</th>";
    echo "<th>stock</th>";
    echo "<th>Reponer</th>";
    echo "<th>costo</th>";
    echo "<th>Inmovilizado</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	$array_articulo=array_articulos($row["id_articulo"]);
	$stock=stock_sucursal($row["id_articulo"],1);
	$stock1=$stock[stock];
	$costo=calcula_precio_costo( $row["id_articulo"] );
	$ma=( $row["tres"] * 1.2 );
	$m=explode(".",$ma);
	$maximo=$m[0];
	$reposicion=( $maximo - $stock1);
	if($reposicion<0 ){
		$reposicion=0;
	} 
	
	$tot_reponer=$tot_reponer+($costo * $reposicion);
	$inmovilizado=($stock1 * $costo);
	$tot_inmovilizado=$tot_inmovilizado+$inmovilizado;
    echo "<tr>";
    
    echo '<td>'.$row["id_articulo"].'</td>';
    echo '<td>'.$row["marca"].'</td>';
    echo '<td>'.$array_articulo["descripcion"].'</td>';
    echo '<td>'.$array_articulo["clasificacion"].'</td>';
    echo '<td>'.$array_articulo["subclasificacion"].'</td>';
    echo '<td>'.$array_articulo["contenido"].'</td>';
    echo '<td>'.$array_articulo["presentacion"].'</td>';
    echo '<td>'.$row["mes"].'</td>';
    echo '<td>'.$row["tres"].'</td>';
    echo '<td>'.$row["seis"].'</td>';
    echo '<td>'.$row["nueve"].'</td>';
    echo '<td>'.$row["doce"].'</td>';
    echo '<td>'.$row["tres"].'</td>';
    echo '<td>'.$maximo.'</td>';
    echo '<td>'.$stock["stock"].'</td>';
    echo '<td>'.$reposicion.'</td>';
    echo '<td>$'.$costo.'</td>';
    echo '<td>$'.$inmovilizado.'</td>';
    echo "</tr>".chr(10);
}


echo "<font1>Total pedido a enviar: ".$tot_reponer."</font1><br>";
echo "<font1>Total inmovilizado: ".$tot_inmovilizado."</font1><br>";
echo '</table>';

#-----------------------------------------
function array_articulos($id_articulos){
    $query='select * from articulos where id="'.$id_articulos.'"';
    $res=mysql_query($query);
    if(mysql_error()){
         echo mysql_error()."<br>".chr(10);
         echo $query."<br>".chr(10);
         echo $_SERVER["SCRIPT_NAME"]."<br>".chr(10);
         return "Error mysql_query";
    }
    $rows=mysql_num_rows($res);
    if($rows==1){
        $array_articulos=mysql_fetch_array($res);
        return $array_articulos;        
    }else{
        return NULL;
    }
}
#-----------------------------------------

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




#---------------------------------------------------------------------------------------------
function calcula_precio_costo( $id_articulos ){

	$query='select * from costos where id_articulos="'.$id_articulos.'"';
	$result=mysql_query($query);
	$rows=mysql_num_rows($result);
	if($rows=="1"){
		$array_costos=mysql_fetch_array($result);
	}else{
		return "0";
	}

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
	$temp1=( ( $temp1 * ( $array_costos["iva"] ) ) / 100 )+ $temp1;
	return str_replace(".",",",round($temp1,2));
}
#---------------------------------------------------------------------------------------------




?>
</table></center>