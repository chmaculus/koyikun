<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="style2.css" type="text/css">
  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type" />
  <title></title>
  <script language="javascript" src="funciones.js"></script>
</head>


<center>
<?php
include("../includes/connect.php");

?>



<?php

if(!$_POST["ACEPTAR"]){
	exit;
}

$fecha=date("d/n/Y");
$fecha2=date("Y-n-d");
$hora=date("H:i:s");

$query=base64_decode($_POST["query"]);
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}
$rows=mysql_num_rows($result);
if($rows<1){
    exit;
}




echo "Fecha: ".$fecha."<br>";

echo '<table class="t1">';
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
    echo "<th>Total $ pedir</th>";
echo "</tr>";

echo '<form action="listado_reposicion2.php" method="post">';

$numero_pedido=get_numero_pedido_proveedor();

while($row=mysql_fetch_array($result)){
	$array_articulo=array_articulos($row["id_articulo"]);
	$stock=stock_sucursal($row["id_articulo"],1);
	$stock1=$stock[stock];
	$costo=calcula_precio_costo( $row["id_articulo"] );

	$ma=( $row["tres"] * 1.2 );
	$m=explode(".",$ma);
	$maximo=$m[0];

	$reposicion=( $maximo - $stock1);

	if($reposicion<0 ){ $reposicion=0; } 
	$total_reponer=$total_reponer+$reposicion;
	
	$tot_reponer=$tot_reponer+($costo * $reposicion);
	$inmovilizado=($stock1 * $costo);
	$tot_inmovilizado=$tot_inmovilizado+$inmovilizado;
	
	
	$reponer=0;
	if($_POST["reponer".$row["id_articulo"]]>0 OR $_POST["reponerb".$row["id_articulo"]]>0){
			

			if($_POST["reponer".$row["id_articulo"]]>0){
				$reponer=$_POST["reponer".$row["id_articulo"]];
				//echo "aa: ".$reponer."<br>";
			}
			if($_POST["reponerb".$row["id_articulo"]]>0){
				$reponer=$_POST["reponerb".$row["id_articulo"]];    		
				//echo "bb: ".$reponer."<br>";
			}
			//echo "a:".$_POST["reponer".$row["id_articulo"]]."<br>";
			//echo "b:".$_POST["reponerb".$row["id_articulo"]]."<br>";
			//echo "<br>";
			//echo "["reponerb".$row["id_articulo"]]";
			echo "reponer: ".$reponer."<br>";
	
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
		echo '<td>'.$reponer.'</td>';
		echo '<td>'.$_POST["costo".$row["id_articulo"]].'</td>';
		echo '<td>'.$_POST["totalpedir".$row["id_articulo"]].'</td>';
		echo "</tr>".chr(10).chr(10);
		$total_pedir=$total_pedir +( $reponer * $costo);

			if($reponer>0){
				$query='insert into pedidos_proveedor set 
									id_articulo="'.$row["id_articulo"].'",
									numero_pedido="'.$numero_pedido.'",
									marca="'.addslashes($row["marca"]).'",
									descripcion="'.addslashes($array_articulo["descripcion"]).'",
									contenido="'.addslashes($array_articulo["contenido"]).'",
									presentacion="'.addslashes($array_articulo["presentacion"]).'",
									clasificacion="'.addslashes($array_articulo["clasificacion"]).'",
									subclasificacion="'.addslashes($array_articulo["subclasificacion"]).'",
									responsable="'.addslashes($_POST["responsable"]).'",
									cantidad_solicitada="'.$reponer.'",
									fecha="'.$fecha2.'",
									hora="'.$hora.'",
									finalizado="N",
									stock="'.$stock["stock"].'",
									costo="'.$_POST["costo".$row["id_articulo"]].'",
									total_pedir="'.$total_pedir.'"';
				echo $query."<br>";
				mysql_query($query);
				if(mysql_error()){
					echo mysql_error()."<br>";
					echo $query."<br><br>";
				}
				$empresa=addslashes($row["marca"]);
			}
    }
}


# $numero_pedido
$q22='insert into pedidos_control set 	numero_pedido="'.$numero_pedido.'", 
					empresa="'.$empresa.'",
					responsable_pedido="'.addslashes($_POST["responsable"]).'",
					importe_pedido="'.$total_pedir.'",
					fecha_genera="'.$fecha2.'",
					hora_genera="'.$hora.'"
					';

echo "tot: ".$total_pedir."<br>";

mysql_query($q22);
if(mysql_error()){
    echo mysql_error()."<br>";
    echo $q22;
}



incrementa_n_pedido_proveedor();



//echo "<font1>Total pedido a enviar: ".$tot_reponer."</font1><br>";
//echo "<font1>Total unidades reponer: ".$total_reponer."</font1><br>";

echo "<br><font1>Ud. ha generado un pedido por: $".$total_pedir."</font1><br>";
echo '</table>';

echo '<input type="hidden" name="query" value="'.base64_encode($query).'">';

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
	return str_replace(".",",",round($temp1,2));
}
#---------------------------------------------------------------------------------------------


#-----------------------------------------
function get_numero_pedido_proveedor(){
        $query='select * from pedidos_proveedor_numero limit 0,1';
        $result=mysql_query($query) or die(mysql_error());
        $rows=mysql_num_rows($result);
        if($rows<"1"){
                $numero_venta="1";
                $q1='insert into pedidos_proveedor_numero set numero="1"';
                mysql_query($q1)or die(mysql_error());
        }else{
                $array_nventa=mysql_fetch_array($result);
                $numero_venta=$array_nventa["numero"];
        }

return $numero_venta;
}
#-----------------------------------------


#-----------------------------------------
function incrementa_n_pedido_proveedor(){
        $query='select * from pedidos_proveedor_numero limit 0,1';
        $result=mysql_query($query) or die(mysql_error());
        $array_nventa=mysql_fetch_array($result);
        $numero_venta=$array_nventa["numero"];
        $q1='update pedidos_proveedor_numero set numero="'.( $numero_venta + 1 ).'" ';
        mysql_query($q1)or die(mysql_error());
}
#-----------------------------------------



?>
</table></center>