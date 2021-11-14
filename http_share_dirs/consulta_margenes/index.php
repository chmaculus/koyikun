<?php
include("./includes/cabecera_utf-8.inc.php");
?>

<link rel="stylesheet" href="style.css" type="text/css">
<center>
<p>Consulta de precio con diferentes margenes<br>
ingrese ID o codigo de barras<br></p>
<form action="<?php echo $_SERVER["SCRIPT_NAME"]; ?>" method="post">
<input type="text" name="busqueda" value="<?php if($_POST["busqueda"]){echo $_POST["busqueda"]; }?>"><br>
<input type="submit" name="ACEPTAR" value="ACEPTAR"><br>
</form>

<?php

if(!$_POST["busqueda"]){
	exit;
}

include("./includes/connect.php");

#----------------------------------------
#muestra registro ingresado
$query='select * from articulos where id="'.$_POST["busqueda"].'" or codigo_barra="'.$_POST["busqueda"].'"';
echo $query."<br>";
$res=mysql_query($query);
$rows=mysql_num_rows($res);
if($rows<1){echo "<p><br>No existe ningun articulo con la busqueda ingresada<br></p>";exit;}
$array_articulos=mysql_fetch_array($res);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
#----------------------------------------


#----------------------------------------
echo '<table class="t1">';
	echo '<tr>';
		echo '<th>id</th>';
		echo '<td>'.$array_articulos["id"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>codigo_interno</th>';
		echo '<td>'.$array_articulos["codigo_interno"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>marca</th>';
		echo '<td>'.$array_articulos["marca"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>descripcion</th>';
		echo '<td>'.$array_articulos["descripcion"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>color</th>';
		echo '<td>'.$array_articulos["color"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>contenido</th>';
		echo '<td>'.$array_articulos["contenido"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>presentacion</th>';
		echo '<td>'.$array_articulos["presentacion"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>codigo_barra</th>';
		echo '<td>'.$array_articulos["codigo_barra"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>clasificacion</th>';
		echo '<td>'.$array_articulos["clasificacion"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>subclasificacion</th>';
		echo '<td>'.$array_articulos["subclasificacion"].'</td>';
	echo '</tr>';
echo "</table><br>";
#----------------------------------------





#----------------------------------------
 #muestra registro ingresado
$query='select * from costos where id_articulos="'.$array_articulos["id"].'"';
$array_costos=mysql_fetch_array(mysql_query($query));
if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
#----------------------------------------



#----------------------------------------
echo '<table class="t1">';
	echo '<tr>';
		echo '<th>id_articulos</th>';
		echo '<td>'.$array_costos["id_articulos"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>precio_costo</th>';
		echo '<td>'.$array_costos["precio_costo"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>descuento1</th>';
		echo '<td>'.$array_costos["descuento1"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>descuento2</th>';
		echo '<td>'.$array_costos["descuento2"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>descuento3</th>';
		echo '<td>'.$array_costos["descuento3"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>descuento4</th>';
		echo '<td>'.$array_costos["descuento4"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>descuento5</th>';
		echo '<td>'.$array_costos["descuento5"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>descuento6</th>';
		echo '<td>'.$array_costos["descuento6"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>iva</th>';
		echo '<td>'.$array_costos["iva"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>margen</th>';
		echo '<td>'.$array_costos["margen"].'</td>';
	echo '</tr>';


	#---------------------
	echo '<tr>';
		echo '<th>Costo real</th>';
		$costo=calcula_precio_costo( $array_articulos["id"] );
		echo '<td>'.round($costo,2).'</td>';
	echo '</tr>';
	#---------------------


	#---------------------
	echo '<tr>';
		echo '<th>Precio Publico AF '.$array_costos["margen"].'%</th>';
		$precio_venta=calcula_precio_venta( $array_costos );
		echo '<td>'.round($precio_venta,2).'</td>';
	echo '</tr>';
	#---------------------

	#---------------------
	echo '<tr>';
		echo '<th>Precio venta margen 110%</th>';
		$precio_venta=calcula_precio_venta2( $array_costos,110 );
		echo '<td>'.round($precio_venta,2).'</td>';
	echo '</tr>';
	#---------------------

	#---------------------
	echo '<tr>';
		echo '<th>Precio venta margen 90%</th>';
		$precio_venta=calcula_precio_venta2( $array_costos,90 );
		echo '<td>'.round($precio_venta,2).'</td>';
	echo '</tr>';
	#---------------------

	#---------------------
	echo '<tr>';
		echo '<th>Precio venta margen 80%</th>';
		$precio_venta=calcula_precio_venta2( $array_costos,80 );
		echo '<td>'.round($precio_venta,2).'</td>';
	echo '</tr>';
	#---------------------

	#---------------------
	echo '<tr>';
		echo '<th>Precio venta margen 70%</th>';
		$precio_venta=calcula_precio_venta2( $array_costos,70 );
		echo '<td>'.round($precio_venta,2).'</td>';
	echo '</tr>';
	#---------------------

	#---------------------
	echo '<tr>';
		echo '<th>Precio venta margen 60%</th>';
		$precio_venta=calcula_precio_venta2( $array_costos,60 );
		echo '<td>'.round($precio_venta,2).'</td>';
	echo '</tr>';
	#---------------------

	#---------------------
	echo '<tr>';
		echo '<th>Precio venta margen 50%</th>';
		$precio_venta=calcula_precio_venta2( $array_costos,50 );
		echo '<td>'.round($precio_venta,2).'</td>';
	echo '</tr>';
	#---------------------


	echo '<tr>';
		echo '<th>fecha</th>';
		echo '<td>'.$array_costos["fecha"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>hora</th>';
		echo '<td>'.$array_costos["hora"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>fecha_gerencia</th>';
		echo '<td>'.$array_costos["fecha_gerencia"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>hora_gerencia</th>';
		echo '<td>'.$array_costos["hora_gerencia"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>porcentaje_tarjeta</th>';
		echo '<td>'.$array_costos["porcentaje_tarjeta"].'</td>';
	echo '</tr>';
echo "</table>";
#----------------------------------------




#---------------------------------------------------------------------------------------------
function array_costo($id_articulos){
        $query='select * from costos where id_articulos="'.$id_articulos.'"';
        $result=mysql_query($query);
        $rows=mysql_num_rows($result);
        if($rows=="1"){
                $array=mysql_fetch_array($result);
                return $array;
        }else{
                return "0";
        }
}
#---------------------------------------------------------------------------------------------



#---------------------------------------------------------------------------------------------
function calcula_precio_venta2( $array_costos, $margen ){
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
        $temp1=( ( $temp1 * $margen ) / 100 )+ $temp1;
        return round($temp1,6);
}
#---------------------------------------------------------------------------------------------


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
        return round($temp1,6);
}
#---------------------------------------------------------------------------------------------

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
        return round($temp1,6);
}
#---------------------------------------------------------------------------------------------

?>