<?php
include_once("../../includes/connect.php");
include_once("barcode.php");

include("../../login/login_verifica.inc.php");
$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a administrador
if($jerarquia!="0"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 

include_once("includes/cabecera.inc.php");?>

<script language="javascript" src="js/jquery-1.3.min.js"></script>
<script language="javascript" src="js/funciones.js"></script>


<body>

<center>
<titulo>Modificacion de costos</titulo>

<?php
include_once("../../includes/funciones_costos.php");
include_once("../../includes/funciones_precios.php");

$fecha=date("Y-n-d");


echo '<form action="'.$_SERVER["SCRIPT_NAME"].'" method="post">';
include("includes/select.inc.php");
echo '<input type="submit" name="ACEPTAR" value="ACEPTAR"><br>';
echo "</form>";

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

echo '<br>Cantidad de articulos: '.$numrows.'<br>';

?>
</center>
</body>
</html>
