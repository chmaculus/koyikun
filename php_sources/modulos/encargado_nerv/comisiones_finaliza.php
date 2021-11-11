<?php

include_once("index.php");
include_once("cabecera.inc.php");
include_once("connect.php");
include_once("funciones.php");

if($_POST["Finalizar"]){
	finalizar($id_session);
	echo "<font1>Se finalizo el ingreso de comisiones</font1>";
	exit;
}

#----------------
$query='select * from datos_caja where id_session="'.$id_session.'" limit 0,1';

$result=mysql_query($query)or die(mysql_error());
$rows=mysql_num_rows($result);

if($rows<1){
	header('Location: datos_caja_ingreso.php?falta=1');
	exit;
}

$array_datos_caja=mysql_fetch_array($result);

$result=mysql_query($query)or die(mysql_error());
?>

<center>
<titulo>Comisiones finaliza</titulo>
<table class="t1">
<tr>
	<th>N</th>
	<th>F</th>
	<th>Te</th>
	<th>Tt</th>
	<th>Tc</th>
	<th>Sc</th>
	<th>T</th>
</tr>

<?php
while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["numero_suc"].'</td>';
	echo '<td>'.fecha_conv( "-", $row["fecha"] ).'</td>';
	echo '<td>'.$row["total_efectivo"].'</td>';
	echo '<td>'.$row["total_tarjeta"].'</td>';
	echo '<td>'.( $row["total_tarjeta"] + $row["total_efectivo"] ).'</td>';
	echo '<td>'.$row["sin_comision"].'</td>';
	echo '<td>'.$row["turno"].'</td>';
	echo "</tr>";
}

?>
</table>
</center>

<center>
<br><table class="t1">
<tr>
	<th>Fecha</th>
	<th>Turno</th>
	<th>Vendedor</th>
	<th>Linea</th>
	<th>Total</th>
</tr>


<?php

$query='select * from comisiones_vendedores where id_session="'.$id_session.'" order by vendedor';
$result=mysql_query($query)or die(mysql_error());

while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.fecha_conv( "-", $row["fecha"] ).'</td>';
	echo '<td>'.$row["turno"].'</td>';
	echo '<td>'.$row["vendedor"].'</td>';
	echo '<td>'.$row["linea"].'</td>';
	echo '<td>'.$row["total"].'</td>';
	echo "</tr>";
}

echo "</table>";
echo "<br>";

$q='select distinct vendedor from comisiones_vendedores where id_session="'.$id_session.'" order by vendedor';
$res=mysql_query($q);

while($row=mysql_fetch_array($res)){
	$total_vendedor=calcula_total_vendedor($id_session, $row["vendedor"]);
	echo '<font1>Total vendedor '.$row["vendedor"].': $'.$total_vendedor.'.-</font1><br>';
}
echo "<br>";

#---------------------------------------------------
function finalizar($id_session){
	$q1='update datos_caja set id_session="" where id_session="'.$id_session.'"';
	mysql_query($q1);
	$q2='update comisiones_vendedores set id_session="" where id_session="'.$id_session.'"';
	mysql_query($q2);
}
#---------------------------------------------------

?>

<form action="<?php echo $_SERVER["SCRIPT_NAME"]; ?>" method="post">
<input type="submit" name="Finalizar" value="Finalizar">
</form>