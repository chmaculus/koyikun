	<link type="text/css" href="fecha_includes/css/ui.all.css" rel="stylesheet" />
	<script type="text/javascript" src="fecha_includes/jquery-1.3.2.js"></script>
	<script type="text/javascript" src="fecha_includes/ui/ui.core.js"></script>
	<script type="text/javascript" src="fecha_includes/ui/ui.datepicker.js"></script>
	<script type="text/javascript" src="fecha_includes/ui/i18n/ui.datepicker-es.js"></script>
	<script type="text/javascript" src="fecha_includes/funciones.js"> </script>
	

<?php
	$fecha=date("d/n/Y");
?>

Desde: <input type="text" name="fecha_desde" id="fecha_desde" value="<?php echo $fecha;?>" /><br>
hasta: <input type="text" name="fecha_hasta" id="fecha_hasta" value="<?php echo $fecha;?>" /><br>

