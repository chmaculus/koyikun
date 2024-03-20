
<?php
include_once("../../includes/connect.php");

include_once("../login/login_verifica.inc.php");
include_once("../seguridad.inc.php"); 

include_once("cabecera.inc.php");

?>


<body>
<center>
<titulo>Pedidos por rotación clasificado</titulo>

<?php


echo '<form action="'.$_SERVER["SCRIPT_NAME"].'" method="post">';
include("select.inc.php");
echo '<input type="submit" name="ACEPTAR" value="ACEPTAR"><br>';
echo "</form>";


#---------------------------------------------------------------
if($_POST["marca"]!="" AND $_POST["clasificacion"]=="" AND $_POST["subclasificacion"]=="" ){
	$query='select * from ventas_estadistica where marca="'.$_POST["marca"].'" order by clasificacion, subclasificacion';
}

if($_POST["marca"]!="" AND $_POST["clasificacion"]!="" AND $_POST["subclasificacion"]=="" ){
	$query='select * from ventas_estadistica where marca="'.$_POST["marca"].'" and clasificacion="'.$_POST["clasificacion"].'" order by clasificacion, subclasificacion';
}

if($_POST["marca"]!="" AND $_POST["clasificacion"]!="" AND $_POST["subclasificacion"]!="" ){
	$query='select * from ventas_estadistica where marca="'.$_POST["marca"].'" and clasificacion="'.$_POST["clasificacion"].'" and subclasificacion="'.$_POST["subclasificacion"].'" order by clasificacion, subclasificacion';
}

//echo "<br><p>q: ".$query."<br></p>";

$result=mysql_query($query)or die(mysql_error());
if(mysql_error()){
    echo mysql_error()."<br>".$query."<br>";
}
$numrows=mysql_num_rows($result);
#---------------------------------------------------------------


if(!$_POST["ACEPTAR"]){
	exit;
}

echo '<br><p>Cantidad de articulos: '.$numrows.'<br>';
$fecha=date("d/n/Y");
echo "Fecha: ".$fecha."</p><br>";




echo '<table class="t1">';
echo "<tr>";
    echo "<th>id</th>";
    echo "<th>Cdo</th>";
    echo "<th>C Int</th>";
    echo "<th>marca</th>";
    echo "<th>descripcion</th>";
    echo "<th>color</th>";
    echo "<th>clasificacion</th>";
    echo "<th>subclasificacion</th>";
    echo "<th>contenido</th>";
    echo "<th>presentacion</th>";
    echo "<th>Rotacion</th>";
echo "</tr>";

echo '<form action="listado_reposicion2.php" method="post">';

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

	if($stock["stock"] >0 AND $stock["stock"] < $row["mes"]){
    echo '<tr class="grave">';
	} 
	if( $stock["stock"] > $row["mes"] AND $stock["stock"] <= ($row["mes"]*1.5) ){
    echo '<tr class="precaucion">';
	}elseif( $stock["stock"] <=0 ){
    echo '<tr class="cero">';
	}elseif($stock["stock"]>0 AND $stock["stock"] >= ($row["mes"] * 1.5) ){
    echo '<tr class="normal">';
	} 

    
    echo '<td>'.$row["id_articulo"].'</td>';
    echo '<td>'.trae_codigoaf($row["id_articulo"]).'</td>';
    echo '<td>'.$array_articulo["codigo_interno"].'</td>';
    echo '<td>'.$row["marca"].'</td>';
    echo '<td>'.$array_articulo["descripcion"].'</td>';
    echo '<td>'.$array_articulo["color"].'</td>';
    echo '<td>'.$array_articulo["clasificacion"].'</td>';
    echo '<td>'.$array_articulo["subclasificacion"].'</td>';
    echo '<td>'.$array_articulo["contenido"].'</td>';
    echo '<td>'.$array_articulo["presentacion"].'</td>';


	if($array_articulo["discontinuo"]=="S"){
		$reposicion=0;
	}    
    


		echo "<td>";
		include("rotacion2.inc.php");
		echo "</td>";
    ///////////////////////////////////////////////////////////////////////////////////
    
    echo "</tr>".chr(10).chr(10);
}


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


function trae_codigoaf($id_articulo){
	$q='select codigo_af from articulos where id="'.$id_articulo.'"';
	$array=mysql_fetch_array(mysql_query($q));
	return $array[0];
}





?>
</table></center>