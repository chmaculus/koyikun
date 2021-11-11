<?php
include("index.php");

echo "<center>";

if($_GET["id_caja_saldos"]){
    include_once("../includes/connect.php");
    $query='select * from caja_saldos where id="'.$_GET["id_caja_saldos"].'"';
    $array_caja_saldos=mysql_fetch_array(mysql_query($query));
    if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
}
if($_GET["uuid_caja_saldos"]){
    include_once("../includes/connect.php");
    $query='select * from caja_saldos where uuid="'.$_GET["uuid_caja_saldos"].'"';
    $array_caja_saldos=mysql_fetch_array(mysql_query($query));
}

$fecha=date("Y-n-d");
$hora=date("H:i:s");

$codigo=date("YndHis");

include_once("../includes/connect.php");

if(!$_GET["codigo"]){
	echo "Debe seleccionar un codigo desde el Listado";
	exit;
}



#---------------------------------------------------------------
$query='select * from caja_saldos where codigo="'.$_GET["codigo"].'" order by fecha,hora limit 0,1000';
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}

echo '<table class="t1">';
echo "<tr>";
	echo "<th>id</th>";
	echo "<th>codigo</th>";
	echo "<th>entrega_recibe</th>";
	echo "<th>detalle</th>";
	echo "<th>Entregado</th>";
	echo "<th>Rendido</th>";
	echo "<th>Adeuda</th>";
	echo "<th>fecha</th>";
	echo "<th>hora</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["codigo"].'</td>';
	echo '<td>'.$row["entrega_recibe"].'</td>';
	echo '<td>'.$row["detalle"].'</td>';
	echo '<td>'.$row["debe"].'</td>';
	echo '<td>'.$row["haber"].'</td>';
	echo '<td>'.$row["saldo"].'</td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["hora"].'</td>';
	echo "</tr>".chr(10);
}

#---------------------------------------------------------------








?>


<form method="post" action="caja_saldos_update.php" name="form_caja_saldos">

<center>
<table class="t1" border="1">

	<tr>
		<th>codigo</th>
		<td><input type="text" name="codigo" id="codigo" value="<?php echo $_GET["codigo"]?>" size="10"></td>
	</tr>
	<tr>
		<th>Entrega</th>
		<td>
			<?php include("deudores.inc.php");?>
		</td>
	</tr>
	<tr>
		<th>detalle</th>
			<td><textarea name="detalle" id="detalle" rows="10" cols="33"><?php if($array_caja_saldos["detalle"]){echo $array_caja_saldos["detalle"];}?></textarea></td>	</tr>
	<tr>
		<th>Cantidad Rinde</th>
		<td>$<input type="text" name="haber" id="haber" value="<?php if($array_caja_saldos["haber"]){echo $array_caja_saldos["haber"];}?>" size="5"></td>
	</tr>
	<tr>
		<th>fecha</th>
		<td><input type="text" name="fecha" id="fecha" value="<?php if($array_caja_saldos["fecha"]){echo $array_caja_saldos["fecha"];}else{echo $fecha;}?>" size="10"></td>
	</tr>
	<tr>
		<th>hora</th>
		<td><input type="text" name="hora" id="hora" value="<?php if($array_caja_saldos["hora"]){echo $array_caja_saldos["hora"];}else{echo $hora;}?>" size="10"></td>
	</tr>

</table>


<?php
if($_GET["id_caja_saldos"] OR $array_caja_saldos["id"]){
    echo '<input type="hidden" name="accion" value="modificacion">';
    echo '<input type="hidden" name="id_caja_saldos" value="'.$array_caja_saldos["id"].'">';
    echo '<input type="hidden" name="uuid_caja_saldos" value="'.$array_caja_saldos["uuid"].'">';
}else{
    echo '<input type="hidden" name="accion" value="ingreso">';
}
?>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>
