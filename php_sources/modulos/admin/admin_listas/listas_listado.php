<?php
include("listas_base.php");
include("connect.php");
$query="select * from listas limit 0,1000";
$result=mysql_query($query)or die(mysql_error());
?>

<center>
<table class="t1">
<tr>
	<th>Lista</th>
	<th>Porcentaje</th>
	<th>Accion</font1></th>
	<th>Accion</th>
</tr>

<?php
while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["nombre"].'</td>';
	echo '<td>'.$row["porcentaje"].'</td>';
	echo '<td><A HREF="listas_ingreso.php?id_listas='.$row["id"].'"><button>Modificar</button></A></td>';
	echo '<td><A HREF="listas_eliminar.php?id_listas='.$row["id"].'"><button>Eliminar</button></A></td>';
	echo "</tr>";
}
?>
</center>
