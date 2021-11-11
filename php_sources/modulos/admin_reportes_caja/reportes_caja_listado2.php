<?php
include_once("../../includes/connect.php");
include("../../login/login_verifica.inc.php");
$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a administrador
if($jerarquia!="0"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 
include("base.php");
echo "<center>";
include("../../includes/funciones_varias.php");
?>
<form action="<?php echo $_SERVER["SCRIPT_NAME"]; ?>" method="post">
<?php include("fecha_desde_hasta.inc.php"); ?>
<input type="submit" name="ACEPTAR" value="ACEPTAR" />
</form>
<?php
$query='select * from reportes_caja where fecha>= "'.fecha_conv("/",$_POST["fecha_desde"]).'" and 
												fecha <= "'.fecha_conv("/",$_POST["fecha_hasta"]).'" order by sucursal, fecha, hora';
$result=mysql_query($query)or die(mysql_error());
?>


<table class="t1">
<tr>
	<th>Sucursal</th>
	<th>Motivo</th>
	<th>Importe</th>
	<th>Codigo buzon</th>
	<th>fecha</th>
	<th>Check</th>
</tr>


<form action="reportes_caja_update2.php" method="post">

<?php
while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.nombre_sucursal($row["sucursal"]).'</td>';
	echo '<td>'.$row["motivo"].'</td>';
	echo '<td>'.$row["importe"].'</td>';
	echo '<td>'.$row["codigo_buzon"].'</td>';
	echo '<td>'.fecha_conv("-",$row["fecha"]).'</td>';
	if($row["verif"]=="S"){
		echo '<td><input type="checkbox" name="verif'.$row["id"].'" value="S" checked></td>';
	}else{
		echo '<td><input type="checkbox" name="verif'.$row["id"].'" value="S"></td>';
	}
	echo "</tr>";
}



echo '<input type="hidden" name="query" value="'.base64_encode($query).'">';

?>
</table>
<BR>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>

</center>
