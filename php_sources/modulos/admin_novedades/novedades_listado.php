<?php
include("novedades_base.php");
include("connect.php");
include("../../includes/funciones_varias.php");

$query="select * from novedades order by fecha desc, hora desc limit 0,300";
$result=mysql_query($query)or die(mysql_error());
?>

<center>
<table class="t1">
<tr>
	<th>Sucursal</th>
	<th>Motivo</th>
	<th>vigencia_inicio</th>
	<th>vigencia_finaliza</th>
	<th>fecha</th>
	<th>hora</th>
	<th>Accion</th>
	<th>Accion</th>
</tr>

<?php
while($row=mysql_fetch_array($result)){

	if($id_sucursal=="T"){
		$sucursal="TODAS";
	}else{
		$sucursal=nombre_sucursal($row["id_sucursal"]);
	}
	

	echo "<tr>";
	echo '<td>'.$sucursal.'</td>';
	echo '<td>'.$row["motivo"].'</td>';
	echo '<td>'.$row["vigencia_inicio"].'</td>';
	echo '<td>'.$row["vigencia_finaliza"].'</td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["hora"].'</td>';
	echo '<td><A HREF="novedades_ingreso.php?id_novedades='.$row["id"].'"><button>Modificar</button></A></td>';
	echo '<td><A HREF="novedades_eliminar.php?id_novedades='.$row["id"].'"><button>Eliminar</button></A></td>';
	echo "</tr>";
}
?>
</center>
