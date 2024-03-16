<?php include("../../login/login_verifica.inc.php");

include_once("../seguridad.inc.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
  <meta content="text/html; charset=UTF-8" http-equiv="content-type" />
  <title>Koyi Kun control administrativo</title>
</head>
<body>
<center>
<?php

$fecha=date("Y-n-d");
$hora=date("H:i:s");

include("../../includes/connect.php");
//include("../../includes/funciones.php");

if ($_POST["marca"]=="TODAS" or $_POST["marca"]==""){
	exit;
}



$result=mysql_query( base64_decode($_POST["query"]) )or die(mysql_error());
$rows=mysql_num_rows($result);
while($row=mysql_fetch_array($result)){

	$result2=mysql_query('select * from listas order by id');
	while($row2=mysql_fetch_array($result2)){
		lista_porcentaje($row["id"], $row2["id"], $_POST["porcentaje".$row2["id"]] );
	}

}


if(!mysql_error()){
	echo "<font1>Se actualizaron ".$rows." articulos correctamente!</font1>";
}

#---------------------------------------------------------------------
function lista_porcentaje($id_articulos, $id_lista, $porcentaje ){
	$query='select * from listas_porcentaje where id_articulos="'.$id_articulos.'" and 
																	id_lista="'.$id_lista.'"';
	$result=mysql_query($query);
	$rows=mysql_num_rows($result);

	if($rows<1){
		$q='insert into listas_porcentaje set id_articulos="'.$id_articulos.'", 
															id_lista="'.$id_lista.'", 
															porcentaje="'.$porcentaje.'" ';
	}
	if($rows==1){
		$q='update listas_porcentaje set porcentaje="'.$porcentaje.'" 
															where id_articulos="'.$id_articulos.'" and 
																id_lista="'.$id_lista.'"
																';
	}
	echo "q: ".$q."<br>".chr(13);
	mysql_query($q)or die(mysql_error());

}
#---------------------------------------------------------------------


?>
</center>

</body>
</html>