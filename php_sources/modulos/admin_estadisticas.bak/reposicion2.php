<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="style2.css" type="text/css">
  <meta content="text/html; charset=UTF-8" http-equiv="content-type" />
  <title></title>
  <script language="javascript" src="funciones.js"></script>
</head>
<script language="javascript" src="funciones.js"></script>


<center>
<?php
include("../../../php_sources/includes/connect.php");

?>
<titulo>Pedidos por rotacion</titulo><br><br>
<font1>Seleccione proveedor</font1>

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

$fecha=date("d/n/Y");


echo "Fecha: ".$fecha."<br>";




$query='select * from ventas_estadistica  where marca="'.$_POST["marca"].'" order by tres desc, clasificacion, subclasificacion';
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}



function trae_ultima_compra($id_articulo){
    $q='select * from seguimiento_stock where id_articulo="'.$id_articulo.'" and tipo="INGRESO POR COMPRA" order by fecha desc, hora desc limit 0,1';
    $r=mysql_query($q);
    $rows=mysql_num_rows($r);
    if($rows>0){
        $array=mysql_fetch_array($r);
	return $array;
    }else{
	return NULL;
    }
}





echo '<table class="t1">';
echo "<tr>";
    echo "<th>id</th>";
    echo "<th>marca</th>";
    echo "<th>descripcion</th>";
    echo "<th>clasificacion</th>";
    echo "<th>subclasificacion</th>";
    echo "<th>contenido</th>";
    echo "<th>presentacion</th>";
    echo "<th>Stock</th>";
    echo "<th>Imagen</th>";
    echo "<th>Reponer</th>";
    echo "<th>Reponer docena</th>";
    echo "<th>det</th>";
    echo "<th>web</th>";
    echo "<th>Ultimo ingreso</th>";
    echo "<th></th>";
    echo "<th>costo</th>";
    echo "<th>Total $ pedir</th>";
    echo "<th>Inmovilizado</th>";
echo "</tr>";

echo '<form action="listado_reposicion2.php" method="post">';

$query='select * from ventas_estadistica  where marca="'.$_POST["marca"].'" order by tres desc, clasificacion, subclasificacion';
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}

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
	$total_reponer=$total_reponer+$reposicion;
	
	$tot_reponer=$tot_reponer+($costo * $reposicion);
	$inmovilizado=($stock1 * $costo);
	$tot_inmovilizado=$tot_inmovilizado+$inmovilizado;
	$ultimo_ingreso=trae_ultima_compra($row["id_articulo"]);

	if($stock["stock"] >0 AND $stock["stock"] < $row["mes"]){
    echo '<tr class="grave">';
	} 
	if( $stock["stock"] > $row["mes"] AND $stock["stock"] <= ($row["mes"]*1.5) ){
    echo '<tr class="precaucion">';
	} 
	if( $stock["stock"] <=0 ){
    echo '<tr class="cero">';
	} 
	if($stock["stock"]>0 AND $stock["stock"] >= ($row["mes"] * 1.5) ){
    echo "<tr>";
	} 

    
    echo '<td>'.$row["id_articulo"].'</td>';
    echo '<td>'.$row["marca"].'</td>';
    echo '<td>'.$array_articulo["descripcion"].'</td>';
    echo '<td>'.$array_articulo["clasificacion"].'</td>';
    echo '<td>'.$array_articulo["subclasificacion"].'</td>';
    echo '<td>'.$array_articulo["contenido"].'</td>';
    echo '<td>'.$array_articulo["presentacion"].'</td>';

	if($stock["stock"] >0 AND $stock["stock"] < $row["mes"]){
    	echo '<td>Critico</td>';
	}elseif( $stock["stock"] > $row["mes"] AND $stock["stock"] <= ($row["mes"]*1.5) ){
    	echo '<td>Precaucion</td>';
	}elseif($stock["stock"]>0 AND $stock["stock"] >= ($row["mes"] * 1.5) ){
    	echo '<td>Normal</td>';
	} elseif( $stock["stock"] <=0 ){
	 	echo '<td>Sin Stock</td>';
	}else{
	 	echo '<td></td>';
	}

    
  	if(file_exists ( "./imagenes/miniaturas/".$row["id_articulo"].".jpg" )==1){
		echo '<td><A HREF="detalle.php?id_articulo='.$row["id_articulo"].'" onClick="return popup(this, \'notes\')">
		<img  src="./imagenes/miniaturas/'.$row["id_articulo"].'".jpg" width="150" height="100">
		</A></td>';
	}else{
		echo '<td></td>';
	}


    echo '<td>';
    echo '<select name="reponer'.$row["id_articulo"].'">';
    for($i=0;$i<=1000;$i++){
    	echo '<option value="'.$i.'">'.$i.'</option>';
    }
    echo '</select>';
    echo '</td>';

    echo '<td>';
    echo '<select name="reponerb'.$row["id_articulo"].'">';
    for($i=0;$i<=144;$i=$i+6){
    	echo '<option value="'.$i.'">'.$i.'</option>';
    }
    echo '</select>';
    //<input type="text" name="reponer'.$row["id_articulo"].'" id="reponer'.$row["id_articulo"].'"  onchange="cal2('.$row["id_articulo"].');" value="'.$reposicion.'" size="5">
    echo '</td>';

    echo '<td><A HREF="detalle_sucursal.php?id_articulo='.$array_articulo["id"].'" onClick="return popup(this, \'notes\')">DETALLE</A></td>';
    echo '<td><A HREF="../asignar_categoria_web.inc/index.php?id_articulo='.$array_articulo["id"].'" onClick="return popup(this, \'notes\')">WEB</A></td>';

    echo '<td>';
    //////////////////////////////////////////////////
    echo '<table class="t1">';

    echo "<tr>";
	echo "<td>IN</td>";

	echo "<td>";
		echo $ultimo_ingreso["fecha"];
	echo "</td>";

	echo "<td>";
		echo '<font size="4" style="font-weight: bold;">'.$ultimo_ingreso["cantidad"].'</font>';
	echo "</td>";
	echo "<td>";
		echo "0";
	echo "</td>";
    echo "</tr>";

    $qb='select * from ventas where id_articulos="'.$row["id_articulo"].'" order by id desc limit 0,1';
    $array_ult=mysql_fetch_array(mysql_query($qb));

    echo "<tr>";
	echo "<td>";
	    echo "VE";
	echo "</td>";

	echo "<td>";
	    echo $array_ult["fecha"];
	echo "</td>";

	echo "<td>";
	    echo $array_ult["sucursal"];
	echo "</td>";

	echo "<td>";
	    echo $array_ult["cantidad"];
	echo "</td>";

    echo "</tr>";
    echo "</table>";
    /////////////////////////////////////////////////////////
    echo '</td>';

	echo '<td><table class="t1">';
	echo "<tr><td>Mes</td>";
    echo '<td>'.$row["mes"].'</td>';
	echo "</tr>";
		    
	echo '<tr class="special1"><td>Tres</td>';
    echo '<td>'.$row["tres"].'</td>';
	echo "</tr>";

	echo "<tr><td>Seis</td>";
    echo '<td>'.$row["seis"].'</td>';
	echo "</tr>";

	echo "<tr><td>Nueve</td>";
    echo '<td>'.$row["nueve"].'</td>';
	echo "</tr>";

	echo "<tr><td>Doce</td>";
    echo '<td>'.$row["doce"].'</td>';
	echo "</tr>";

	echo "<tr><td>Min</td>";
    echo '<td>'.$row["tres"].'</td>';
	echo "</tr>";

	echo "<tr><td>Max</td>";
    echo '<td>'.$maximo.'</td>';
	echo "</tr>";

	echo '<tr class="special1"><td>Stk</td>';
    echo '<td>'.$stock["stock"].'</td>';
	echo "</tr>";
	echo '</table></td>';
	if($array_articulo["discontinuo"]=="S"){
		$reposicion=0;
	}    
    
    echo '<td><input type="text" name="costo'.$row["id_articulo"].'" id="costo'.$row["id_articulo"].'" onchange="cal2('.$row["id_articulo"].');" value="'.$costo.'" size="5"></td>';
    $pedir=($reposicion * $costo);
    echo '<td><input type="text" name="totalpedir'.$row["id_articulo"].'" id="totalpedir'.$row["id_articulo"].'" value="'.$pedir.'" size="5"></td>';
    echo '<td>$'.$inmovilizado.'</td>';
    echo "</tr>".chr(10).chr(10);
}
echo '</table>';

echo '<table class="t1">';
echo '<tr>';
echo "<td><font1>Total pedido a enviar:</td></font1><td><font1>".$tot_reponer."</td></font1>";
echo '</tr>';
echo '<tr>';
echo "<td><font1>Total unidades reponer:</td></font1><td><font1>".$total_reponer."</td></font1>";
echo '</tr>';
echo '<tr>';
echo "<td><font1>Total inmovilizado:</td></font1><td><font1> ".$tot_inmovilizado."</td></font1>";
echo '</tr>';
echo '</table>';




echo '<input type="hidden" name="query" value="'.base64_encode($query).'">';
echo '<br>Responsable <input type="text" name="responsable" value=""><br><br>';

echo '<input type="submit" name="ACEPTAR" value="ACEPTAR">';
echo '</form>';

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
	return round($temp1,2);
}
#---------------------------------------------------------------------------------------------




?>
</table></center>