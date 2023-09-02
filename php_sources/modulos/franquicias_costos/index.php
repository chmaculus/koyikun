<?php
include_once('cabecera.inc.php');
include_once('../includes/connect.php');
?>

<script language="javascript" src="js/jquery-1.3.min.js"></script>
<script language="javascript" src="funciones.js"></script>

<?php
echo "<center>";

if(!$_POST["query"]){
	echo '<form action="'.$SCRIPT_NAME.'" method="post">';
	//echo '<form action="articulos_listado.php" method="post">';

	include("select.inc.php");

	echo '<input type="hidden" name="query" value="'.base64_encode($query).'">';

	echo '<input type="submit" name="ACEPTAR" value="ACEPTAR"><br>';
	echo "</form>";
}

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



if($query){
	include_once("articulos_listado.php");
}



?>
