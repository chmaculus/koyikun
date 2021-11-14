<?php

include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");
include_once("seguridad.inc.php");

include_once("../../includes/funciones_varias.php");
include("costos_detalle_base.php");
?>

<center>
<form action="<?php echo $_SERVER["SCRIPT_NAME"]; ?>" method="post">
<?php
include_once("../../includes/fecha_desde_hasta.inc.php");
?>
<input type="submit" name="ACEPTAR" value="ACEPTAR" />
</form>

<?php
if(!$_POST["fecha_desde"] AND !$_POST["fecha_hasta"]){
	exit;
}
$query='select * from costos_detalle where fecha>="'.fecha_conv("/",$_POST["fecha_desde"]).'" and fecha<="'.fecha_conv("/",$_POST["fecha_hasta"]).'"';
$result=mysql_query($query)or die(mysql_error());
?>
<table class="t1">
<tr>
	<th>Marca</th>
	<th>Detalle</th>
	<th>Fecha</th>
	<th>Hora</th>
	<th>Accion</th>
	<th>Accion</th>
</tr>

<?php
while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["marca"].'</td>';
	echo '<td>'.$row["detalle"].'</td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["hora"].'</td>';
	echo '<td><A href="costos_detalle_detalles.php?id_costos_detalle='.$row["id"].'"><button>Detalles</button></A></td>';
	echo '<td><A href="costos_detalle_ingreso.php?id_costos_detalle='.$row["id"].'"><button>Modificar</button></A></td>';
	echo '<td><A href="costos_detalle_eliminar.php?id_costos_detalle='.$row["id"].'"><button>Eliminar</button></A></td>';
	echo "</tr>";
}
?>
</center>
