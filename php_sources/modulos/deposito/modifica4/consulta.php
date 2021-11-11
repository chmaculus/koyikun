<?php
include_once("../includes/connect.php");

include_once("cabecera.inc.php");
include_once("../includes/funciones_varias.php");
include_once("../includes/funciones_stock.php");

if(!$_POST["id_sucursal"]){
		echo '<center>';
		echo '<form action="'.$_SERVER["SCRIPT_NAME"].'" method="post">';
		include("sucursales.inc.php");
		echo '<br><input type="submit" name="ACEPTAR" value="ACEPTAR" />';
		echo '</form>';
		exit;
}



?>

<body onLoad=document.aa.busqueda.focus()>
<center>

<titulo>CONSULTA DE STOCK X CODIGO BARRA / ID</titulo><br>
<font1><?php echo "Sucursal: ".nombre_sucursal($_POST["id_sucursal"]);?></font1><br>
<form name="aa" action="<?php $_SERVER["SCRIPT_NAME"]; ?>" method="post">

<input type="text" name="busqueda" <?php if($_POST["busqueda"]){echo $_POST["busqueda"];} ?>/>
<input type="hidden" name="id_sucursal" value="<?php echo $_POST["id_sucursal"];?>">
<input type="submit" name="ACEPTAR" value="ACEPTAR" />
</form>


<?php
if($_POST["busqueda"]){

	$query='select * from articulos where codigo_barra="'.$_POST["busqueda"].'" or id="'.$_POST["busqueda"].'"';

	$res=mysql_query($query);
	$rows=mysql_num_rows($res);
	if($rows>1){
		echo 'La busqueda devuelve mas de un resultado<br>';
	}else{
		$array_articulos=mysql_fetch_array($res);
		include("articulo_res.inc.php");
		$array_stock=stock_sucursal($array_articulos["id"],$_POST["id_sucursal"]);
		include("stock2.inc.php");
	}


}else{
 	exit;
}

?>