<?php
include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");
include_once("seguridad.inc.php");
include("../../includes/funciones_varias.php");
include_once("cabecera.inc.php");
$query="select * from sessiones_activas order by finaliza desc, jerarquia, usuario";
$result=mysql_query($query)or die(mysql_error());
$time=time();
?>

<center>
<table class="t1">
<tr>
	<th>id_session</th>
	<th>usuario</th>
	<th>id_sucursal</th>
	<th>jerarquia</th>
	<th>inicio</th>
	<th>finaliza</th>
	<th>ip</th>
	<th>navegador</th>
	<th>Accion</th>
</tr>

<?php
while($row=mysql_fetch_array($result)){
	if($row["finaliza"]<=$time){
		echo '<tr class="special">';
	}else{
		echo "<tr>";
	}
	
	echo '<td>'.$row["id_session"].'</td>';
	echo '<td>'.$row["usuario"].'</td>';
	echo '<td>'.nombre_sucursal($row["id_sucursal"]).'</td>';
	echo '<td>'.$row["jerarquia"].'</td>';
	echo '<td>'.date("Y-n-d H:i:s",$row["inicio"]).'</td>';
	echo '<td>'.date("Y-n-d H:i:s",$row["finaliza"]).'</td>';
	echo '<td>'.$row["ip"].'</td>';
	echo '<td>'.$row["navegador"].'</td>';
	echo '<td><A href="sessiones_activas_eliminar.php?id_sessiones_activas='.$row["id_session"].'"><button>Eliminar</button></A></td>';
	echo "</tr>";
}
?>
</center>
