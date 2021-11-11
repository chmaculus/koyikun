<?php
include_once("../../includes/connect.php");
include("../../login/login_verifica2.inc.php");
include("seguridad.inc.php");
include_once("cabecera.inc.php");

$id_sucursal=$_COOKIE["id_sucursal"];

echo "<center>";
/*
if($_POST["id_articulos"] AND $_POST["id_sucursal"]){
	// AND $_POST["id_sucursal"]
	echo "id_a:".$_POST["id_articulos"]." id_s:".$id_sucursal."<br>";
	
}
*/
include_once("../../includes/funciones_costos.php");

$fecha=date("Y-n-d");
$hora=date("H:i:s");






#----------------------------------------
$q='select * from stock where id_articulo="'.$_POST["id_articulos"].'" and id_sucursal="'.$id_sucursal.'"';
$result=mysql_query($q);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
$rows=mysql_num_rows($result);

$array_stock=mysql_fetch_array($result);
$stock_anterior=$array_stock["stock"];

//echo "rows: ".$rows."<br>";

#----------------------------------------
if($rows<1){
	$query='insert into stock set
							id_articulo="'.$_POST["id_articulos"].'",
							stock="'.$_POST["stock"].'",
							maximo="'.$_POST["maximo"].'",
							minimo="'.$_POST["minimo"].'",
							fijo="'.$_POST["fijo"].'",
							id_sucursal="'.$_POST["id_sucursal"].'",
							fecha="'.$fecha.'",
							hora="'.$hora.'"';
}

if($rows==1){
	$query='update stock set
							stock="'.$_POST["stock"].'",
							maximo="'.$_POST["maximo"].'",
							minimo="'.$_POST["minimo"].'",
							fijo="'.$_POST["fijo"].'",
							fecha="'.$fecha.'",
							hora="'.$hora.'"
								where id_articulo="'.$_POST["id_articulos"].'" and 
									id_sucursal="'.$_POST["id_sucursal"].'"
							';
}

if($rows>1){
	$q1='delete from stock where id_articulo="'.$_POST["id_articulos"].'" and id_sucursal="'.$_POST["id_sucursal"].'"';
	mysql_query($q1);
	$query='insert into stock set
							id_articulo="'.$_POST["id_articulos"].'",
							stock="'.$_POST["stock"].'",
							maximo="'.$_POST["maximo"].'",
							minimo="'.$_POST["minimo"].'",
							fijo="'.$_POST["fijo"].'",
							id_sucursal="'.$_POST["id_sucursal"].'",
							fecha="'.$fecha.'",
							hora="'.$hora.'"';
}




mysql_query($query);
//echo "q: ".$query."<br>";
	if(mysql_error()){	
   	 echo $query."<br>";
    	echo mysql_error()."<br>";
    	echo $_SERVER["SCRIPT_NAME"]."<br>";
	}

#----------------------------------------





#----------------------------------------
#seguimiento stock
#----------------------------------------

if($_POST["stock"]!=$stock_anterior){
    $query='insert into seguimiento_stock  set
    id_articulo="'.$_POST["id_articulos"].'",
    stock_anterior="'.$stock_anterior.'",
    stock_nuevo="'.$_POST["stock"].'",
    tipo="Mod dep frame",
    origen="'.$id_sucursal.'",
    destino="'.$id_sucursal.'",
    fecha="'.$fecha.'",
    hora="'.$hora.'"';

    mysql_query($query);
    //echo "q: ".$query."<br>";

    if(mysql_error()){
	echo $query."<br>";
        echo mysql_error()."<br>";
	echo $_SERVER["SCRIPT_NAME"]."<br>";
    }
}
#----------------------------------------















#----------------------------------------
#muestra registro ingresado
$query='select * from articulos where id="'.$_POST["id_articulos"].'"';
$array_articulos=mysql_fetch_array(mysql_query($query));
if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}

echo "Ultimo Ingresado<br>";
echo '<table border="1">';
    echo '<tr>';
        echo '<th>Id</th>';
        echo '<th>codigo_interno</th>';
        echo '<th>marca</th>';
        echo '<th>descripcion</th>';
        echo '<th>Color</th>';
        echo '<th>contenido</th>';
        echo '<th>presentacion</th>';
        echo '<th>codigo_barra</th>';
        echo '<th>clasificacion</th>';
        echo '<th>subclasificacion</th>';
    echo '</tr>';
    echo '<tr>';
        echo '<td>'.$array_articulos["id"].'</td>';
        echo '<td>'.$array_articulos["codigo_interno"].'</td>';
        echo '<td>'.$array_articulos["marca"].'</td>';
        echo '<td>'.$array_articulos["descripcion"].'</td>';
        echo '<td>'.$array_articulos["color"].'</td>';
        echo '<td>'.$array_articulos["contenido"].'</td>';
        echo '<td>'.$array_articulos["presentacion"].'</td>';
        echo '<td>'.$array_articulos["codigo_barra"].'</td>';
        echo '<td>'.$array_articulos["clasificacion"].'</td>';
        echo '<td>'.$array_articulos["subclasificacion"].'</td>';
    echo '</tr>';
echo "</table>";
#----------------------------------------

echo 'Los cambios se veran aplicados cuando actualice desde el formulario de consuta (arriba)<br>';

?>