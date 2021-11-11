<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link type="text/css" href="style.css" rel="stylesheet" />

	<link type="text/css" href="js/themes/base/ui.all.css" rel="stylesheet" />
	<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
	<script type="text/javascript" src="js/ui/ui.core.js"></script>
	<script type="text/javascript" src="js/ui/ui.datepicker.js"></script>
	<script type="text/javascript" src="js/ui/i18n/ui.datepicker-es.js"></script>
<!--  
	<link type="text/css" href="../demos.css" rel="stylesheet" />
-->
<meta content="text/html; charset=UTF-8" http-equiv="content-type" />
	<script type="text/javascript">
	$(function() {
		$('#desde').datepicker({
			changeMonth: true,
			changeYear: true
		});
		$('#hasta').datepicker({
			changeMonth: true,
			changeYear: true
		});
	});
	</script>

<title>Tablabla ventas By Christian Máculus</title>
</head>

<center>

<?php
#$fecha=date("d/n/Y");

if(!$_POST["ACEPTAR"]){
	$fecha_desde='01'.date("/n/Y");
	$fecha_hasta='31'.date("/n/Y");
}

?>
<form method="POST" action="<?php echo $SCRIPT_NAME ?>">

<p>Desde: <input type="text" name="desde" id="desde" value="<?php if($_POST["desde"]){echo $_POST["desde"];}else{ echo $fecha_desde;} ?>"> Hasta: <input type="text" name="hasta" id="hasta" value="<?php if ($_POST["hasta"]){ echo $_POST["hasta"]; }else{ echo $fecha_hasta; }?>"></p>
<input type="submit" name="ACEPTAR" value="ACEPTAR" />

</form>
<?php

if(!$_POST["ACEPTAR"]){
		exit;
}

include_once("../../includes/connect.php");
include_once("../../includes/funciones_varias.php");

$fecha_desde=fecha_conv("/", $_POST["desde"]);
$fecha_hasta=fecha_conv("/", $_POST["hasta"]);

echo "desde: ".$fecha_desde."<br>";
echo "hasta: ".$fecha_hasta."<br>";


?>