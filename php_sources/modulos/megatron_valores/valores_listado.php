<?php
include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");
include_once("../../includes/cabecera_utf-8.inc.php");

$query="select * from valores order by id";
$result=mysql_query($query)or die(mysql_error());
?>

<center>
<table class="t1">
<tr>
	<th>descripcion</th>
	<th>valor</th>
	<th>Accion</th>
</tr>

<?php
while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["descripcion"].'</td>';
	echo '<td>'.$row["valor"].'</td>';
	echo '<td><A href="valores_ingreso.php?id_valores='.$row["id"].'"><button>Modificar</button></A></td>';
	echo "</tr>";
}
?>
</center>
