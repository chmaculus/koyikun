<?php
include("clientes_base.php");
include("connect.php");
$query="select * from clientes limit 0,10000";
$result=mysql_query($query)or die(mysql_error());
?>

<center>
<table border="1" class="t1">
<tr>
	<th>ID</th>
	<th>apellido / razon social</th>
	<th>Nombre</th>
	<th>Cond I.V.A.</th>
	<th>Cuit / DNI</th>
	<th>Tipo Cliente</th>
	<th>Carnet</th>
	<th>Direcc</th>
	<th>Cdad</th>
	<th>Provincia</th>
	<th>Pais</th>
	<th>C.P.</th>
	<th>E-mail</th>
	<th>Pagina web</th>
	<th>Facebook</th>
	<th>Telefonos</th>
	<th>Fax</th>
	<th>Informacion contacto</th>
	<th>Observaciones</th>
	<th>Accion</font1></th>
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
	echo '<td>'.$row["facebook"].'</td>';
	echo '<td>'.$row["telefonos"].'</td>';
	echo '<td>'.$row["fax"].'</td>';
	echo '<td>'.$row["informacion_contacto"].'</td>';
	echo '<td>'.$row["observaciones"].'</td>';
	echo '<td><A HREF="clientes_ingreso.php?id_clientes='.$row["id"].'"><button>Modificar</button></A></td>';
	echo '<td><A HREF="clientes_eliminar.php?id_clientes='.$row["id"].'"><button>Eliminar</button></A></td>';
	echo "</tr>";
}
?>
</center>
