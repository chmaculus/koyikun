<?php
include("../../login/login_verifica.inc.php");
$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a administrador
if($jerarquia!="0"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 

include_once("../../includes/connect.php");
include_once("pedidos_control_base.php");

?>
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
window.open(href, windowname, 'width=750,height=350,scrollbars=yes');
return false;
}
//-->
</SCRIPT>
<center>
<?php
$query="select * from pedidos_control limit 0,1000";
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<br><table class="t1">';
echo "<tr>";
	echo "<th>Numero pedido</th>";
	echo "<th>Fecha Genera</th>";
	echo "<th>Hora Genera</th>";
	echo "<th>empresa</th>";
	echo "<th>Respos. pedido</th>";
	echo "<th>Respos. envio</th>";
	echo "<th>importe_pedido</th>";
	echo "<th>fecha_envio</th>";
	echo "<th>rceptor</th>";
	echo "<th>import_recibido_a</th>";
	echo "<th>import_recibido_b</th>";
	echo "<th>fecha_recepcion</th>";
	echo "<th>n_correo</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["numero_pedido"].'</td>';
	echo '<td>'.$row["fecha_genera"].'</td>';
	echo '<td>'.$row["hora_genera"].'</td>';
	echo '<td>'.$row["empresa"].'</td>';
	echo '<td>'.$row["responsable_pedido"].'</td>';
	echo '<td>'.$row["responsable_envio"].'</td>';
	echo '<td>'.$row["importe_pedido"].'</td>';
	echo '<td>'.$row["fecha_envio"].'</td>';
	echo '<td>'.$row["rceptor"].'</td>';
	echo '<td>'.$row["import_recibido_a"].'</td>';
	echo '<td>'.$row["import_recibido_b"].'</td>';
	echo '<td>'.$row["fecha_recepcion"].'</td>';
	echo '<td>'.$row["n_correo"].'</td>';
	echo '<td><A HREF="pedidos_proveedor_eliminar.php?numero_pedido='.$row["numero_pedido"].'" onClick="return popup(this, \'notes\')"><button>Eliminar</button></A></td>';
	echo '<td><A HREF="pedidos_proveedor_listado.php?numero_pedido='.$row["numero_pedido"].'" onClick="return popup(this, \'notes\')"><button>Ver pedido</button></A></td>';
	echo '<td><A HREF="pedidos_enviar.php?id_pedidos_control='.$row["id"].'&numero_pedido='.$row["numero_pedido"].'"><button>Enviar</button></A></td>';
	echo '<td><A HREF="pedidos_control_pagos_ingreso.php?id_pedidos_control='.$row["id"].'" onClick="return popup(this, \'notes\')"><button>Pagos</button></A></td>';
	echo "</tr>".chr(10);
}
echo '</table>';

?>


</center>
