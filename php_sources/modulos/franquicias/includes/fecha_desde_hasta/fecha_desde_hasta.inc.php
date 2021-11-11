	<link type="text/css" href="../includes/fecha_desde_hasta/js/css/ui.all.css" rel="stylesheet" />
	<script type="text/javascript" src="../includes/fecha_desde_hasta/js/jquery-1.3.2.js"></script>
	<script type="text/javascript" src="../includes/fecha_desde_hasta/js/ui/ui.core.js"></script>
	<script type="text/javascript" src="../includes/fecha_desde_hasta/js/ui/ui.datepicker.js"></script>
	<script type="text/javascript" src="../includes/fecha_desde_hasta/js/ui/i18n/ui.datepicker-es.js"></script>
	<script type="text/javascript" src="../includes/fecha_desde_hasta/js/funciones.js"> </script>
	

<?php
	$fecha=date("/n/Y");

if(!$_POST["fecha_desde"]){
    $fecha_desde="01".$fecha;
}else{
    $fecha_desde=$_POST["fecha_desde"];
}


if(!$_POST["fecha_hasta"]){
    $fecha_hasta="31".$fecha;
}else{
    $fecha_hasta=$_POST["fecha_hasta"];
}

?>

Desde: <input type="text" name="fecha_desde" id="fecha_desde" value="<?php echo $fecha_desde; ?>" /><br>
hasta: <input type="text" name="fecha_hasta" id="fecha_hasta" value="<?php echo $fecha_hasta;?>" /><br>

