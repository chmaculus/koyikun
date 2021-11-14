<?php




include_once("../../includes/connect.php");
include_once("../../includes/funciones_costos.php");
include_once("../../includes/funciones_precios.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="css/estructura.css" type="text/css">
  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type" />
  <title>Xzone modificacion de descuentos</title>
</head>


<script language="javascript" src="js/jquery-1.3.min.js"></script>
<script language="javascript" src="funciones.js"></script>


<body>
<center>

<div class="divarriba" id="divarriba">
	Promociones X grupo
	
		<?php
		echo '<form method="post" action="stock_x_grupo.php" target="FrameCentralLeft">';
		include("select2.inc.php");
		echo '<input type="submit" name="ACEPTAR" value="ACEPTAR"><br>';
		echo "</form>";

		?>
</div>
</body>