<?php
include("clientes_base.php");
include("connect.php");
$query="select * from clientes limit 0,100";
$result=mysql_query($query)or die(mysql_error());
?>

<center>
<table class="t1">
<tr>
	<th>id</th>
	<th>razon_social</th>
	<th>nombres</th>
	<th>condicion_iva</th>
	<th>cuit</th>
	<th>tipo_cliente</th>
	<th>carnet</th>
	<th>direccion</th>
	<th>ciudad</th>
	<th>provincia</th>
	<th>pais</th>
	<th>codigo_postal</th>
	<th>email</th>
	<th>pagina_web</th>
	<th>telefonos</th>
	<th>fax</th>
	<th>vendedor</th>
	<th>informacion_contacto</th>
	<th>observaciones</th>
	<th>sucursal</th>
	<th>fecha</th>
	<th>hora</th>
	<th>Accion</th>
	<th>Accion</th>
</tr>

<?php
while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["razon_social"].'</td>';
	echo '<td>'.$row["nombres"].'</td>';
	echo '<td>'.$row["condicion_iva"].'</td>';
	echo '<td>'.$row["cuit"].'</td>';
	echo '<td>'.$row["tipo_cliente"].'</td>';
	echo '<td>'.$row["carnet"].'</td>';
	echo '<td>'.$row["direccion"].'</td>';
	echo '<td>'.$row["ciudad"].'</td>';
	echo '<td>'.$row["provincia"].'</td>';
	echo '<td>'.$row["pais"].'</td>';
	echo '<td>'.$row["codigo_postal"].'</td>';
	echo '<td>'.$row["email"].'</td>';
	echo '<td>'.$row["pagina_web"].'</td>';
	echo '<td>'.$row["telefonos"].'</td>';
	echo '<td>'.$row["fax"].'</td>';
	echo '<td>'.$row["vendedor"].'</td>';
	echo '<td>'.$row["informacion_contacto"].'</td>';
	echo '<td>'.$row["observaciones"].'</td>';
	echo '<td>'.$row["sucursal"].'</td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["hora"].'</td>';
	echo '<td><A HREF="clientes_ingreso.php?id_clientes='.$row["id"].'"><button>Modificar</button></A></td>';
	echo '<td><A HREF="clientes_eliminar.php?id_clientes='.$row["id"].'"><button>Eliminar</button></A></td>';
	echo "</tr>";
}
?>
</center>
