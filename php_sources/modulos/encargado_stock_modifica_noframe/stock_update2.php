<?php
include_once("../../includes/connect.php");
include_once("../includes/funciones_varias.php");
include_once("../includes/funciones_stock.php");
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


$query=base64_decode($_POST["query"]);
$result=mysql_query($query);
//echo "query: ".$query."<br>".chr(13);

#while---------
while($row=mysql_fetch_array($result)){

    /*
    verifica tabla stock
    trae stock anterior
    update
    seguimiento stock
    */
    $stock_anterior=stock_sucursal($row["id"],$id_sucursal);
    verifica_tabla_stock( $row["id"], $id_sucursal );
    $query='update stock set
    stock="'.verifica_vacio($_POST["stock".$row["id"]]).'",
    maximo="'.verifica_vacio($_POST["maximo".$row["id"]]).'",
    minimo="'.verifica_vacio($_POST["minimo".$row["id"]]).'",
    fijo="'.verifica_vacio($_POST["fijo".$row["id"]]).'",
    fecha="'.$fecha.'",
    hora="'.$hora.'"
        where id_articulo="'.$row["id"].'" and 
            id_sucursal="'.$id_sucursal.'"
    ';
    // echo $query."<br>";
    mysql_query($query);
    if(mysql_error()){
        echo $query."<br>";
        echo mysql_error()."<br>";
    }
}// end while

    // echo $row["id"]."<br>";

if(!mysql_error()){
    echo "Los datos se actualizaron correctamente";
}


exit;


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
							id_articulo="'.verifica_vacio($_POST["id_articulos"]).'",
							stock="'.verifica_vacio($_POST["stock"]).'",
							maximo="'.verifica_vacio($_POST["maximo"]).'",
							minimo="'.verifica_vacio($_POST["minimo"]).'",
							fijo="'.verifica_vacio($_POST["fijo"]).'",
							id_sucursal="'.verifica_vacio($_POST["id_sucursal"]).'",
							fecha="'.$fecha.'",
							hora="'.$hora.'"';
}

if($rows==1){
	$query='update stock set
							stock="'.verifica_vacio($_POST["stock"]).'",
							maximo="'.verifica_vacio($_POST["maximo"]).'",
							minimo="'.verifica_vacio($_POST["minimo"]).'",
							fijo="'.verifica_vacio($_POST["fijo"]).'",
							fecha="'.$fecha.'",
							hora="'.$hora.'"
								where id_articulo="'.verifica_vacio($_POST["id_articulos"]).'" and 
									id_sucursal="'.verifica_vacio($_POST["id_sucursal"]).'"
							';
}

if($rows>1){
	$q1='delete from stock where id_articulo="'.$_POST["id_articulos"].'" and id_sucursal="'.$_POST["id_sucursal"].'"';
	mysql_query($q1);
	$query='insert into stock set
							id_articulo="'.verifica_vacio($_POST["id_articulos"]).'",
							stock="'.verifica_vacio($_POST["stock"]).'",
							maximo="'.verifica_vacio($_POST["maximo"]).'",
							minimo="'.verifica_vacio($_POST["minimo"]).'",
							fijo="'.verifica_vacio($_POST["fijo"]).'",
							id_sucursal="'.verifica_vacio($_POST["id_sucursal"]).'",
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
    id_articulo="'.verifica_vacio($_POST["id_articulos"]).'",
    stock_anterior="'.verifica_vacio($stock_anterior).'",
    stock_nuevo="'.verifica_vacio($_POST["stock"]).'",
    tipo="Mod dep frame",
    origen="'.verifica_vacio($id_sucursal).'",
    destino="'.verifica_vacio($id_sucursal).'",
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
















?>