<SCRIPT TYPE="text/javascript">
<!--
function popup(mylink, windowname)
{
if (! window.focus)return true;
var href;
if (typeof(mylink) == 'string')
   href=mylink;
else
   href=mylink.href;
window.open(href, windowname, 'width=600,height=400,scrollbars=yes');
return false;
}
//-->
</SCRIPT>

<?php
include_once("index.php");
include_once("connect.php");
$query="select * from datos_caja order by numero_suc, fecha";
$result=mysql_query($query)or die(mysql_error());
?>

<center>
<table class="t1">
<tr>
	<th>Sucursal</th>
	<th>Fecha</th>
	<th>Tot ef.</th>
	<th>Tot tarj</th>
	<th>S/C</th>
	<th>T.</th>
	<th>Fecha sistema</th>
	<th>Hora sistema</th>
	<th>Accion</th>
</tr>

<?php
while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["numero_suc"].'</td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["total_efectivo"].'</td>';
	echo '<td>'.$row["total_tarjeta"].'</td>';
	echo '<td>'.$row["sin_comision"].'</td>';
	echo '<td>'.$row["turno"].'</td>';
	echo '<td>'.$row["fecha_sistema"].'</td>';
	echo '<td>'.$row["hora_sistema"].'</td>';
	echo '<td><A HREF="detalle_caja.php?id_datos_caja='.$row["id"].'" onClick="return popup(this, \'notes\')"><button>Detalles</button></A></td>';
	echo '<td><A HREF="datos_caja_eliminar.php?id_datos_caja='.$row["id"].'"><button>Eliminar</button></A></td>';
	echo "</tr>";
}
?>
</center>
