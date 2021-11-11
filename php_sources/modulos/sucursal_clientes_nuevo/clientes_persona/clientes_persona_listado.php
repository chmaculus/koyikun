<?php
include("clientes_persona_base.php");
include("connect.php");
$query="select * from clientes_persona limit 0,100";
$result=mysql_query($query)or die(mysql_error());
?>

<center>
<table class="t1">
<tr>
	<th>id</th>
	<th>apellido</th>
	<th>nombres</th>
	<th>dni</th>
	<th>estado_civil</th>
	<th>telefono</th>
	<th>celular</th>
	<th>email</th>
	<th>profesion</th>
	<th>usa_tarjeta</th>
	<th>vendedor</th>
	<th>sucursal</th>
	<th>tel_comercial</th>
	<th>dom_comercial</th>
	<th>ciudad</th>
	<th>provincia</th>
	<th>carnet</th>
	<th>codigo_barras</th>
	<th>fecha_entrega</th>
	<th>radio</th>
	<th>canal</th>
	<th>programas</th>
	<th>fecha</th>
	<th>hora</th>
	<th>Accion</th>
	<th>Accion</th>
</tr>

<?php
while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["apellido"].'</td>';
	echo '<td>'.$row["nombres"].'</td>';
	echo '<td>'.$row["dni"].'</td>';
	echo '<td>'.$row["estado_civil"].'</td>';
	echo '<td>'.$row["telefono"].'</td>';
	echo '<td>'.$row["celular"].'</td>';
	echo '<td>'.$row["email"].'</td>';
	echo '<td>'.$row["profesion"].'</td>';
	echo '<td>'.$row["usa_tarjeta"].'</td>';
	echo '<td>'.$row["vendedor"].'</td>';
	echo '<td>'.$row["sucursal"].'</td>';
	echo '<td>'.$row["tel_comercial"].'</td>';
	echo '<td>'.$row["dom_comercial"].'</td>';
	echo '<td>'.$row["ciudad"].'</td>';
	echo '<td>'.$row["provincia"].'</td>';
	echo '<td>'.$row["carnet"].'</td>';
	echo '<td>'.$row["codigo_barras"].'</td>';
	echo '<td>'.$row["fecha_entrega"].'</td>';
	echo '<td>'.$row["radio"].'</td>';
	echo '<td>'.$row["canal"].'</td>';
	echo '<td>'.$row["programas"].'</td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["hora"].'</td>';
	echo '<td><A href="clientes_persona_ingreso.php?id_clientes_persona='.$row["id"].'"><button>Modificar</button></A></td>';
	echo '<td><A href="clientes_persona_eliminar.php?id_clientes_persona='.$row["id"].'"><button>Eliminar</button></A></td>';
	echo "</tr>";
}
?>
</center>
