<?php 
include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");

include("seguridad.inc.php");
include("funciones.php");
include("cabecera.inc.php");
?>


<center>
<form action="liquidacion.php" method="post">
Vendedor: <input type="text" name="vendedor" value="<?php echo $_POST["vendedor"]; ?>"><br>
<input type="submit" name="ACEPTAR" value="ACEPTAR"><br>
</form>
<?php
if(!$_POST["vendedor"]){
	exit;
}
$fecha=date("Y-n-d");
$vendedor=$_POST["vendedor"];

$query='select distinct fecha from comisiones_vendedores where vendedor="'.$vendedor.'" order by fecha';
$result=mysql_query($query)or die(mysql_error());
$rows=mysql_num_rows($result);
if($rows<1){
	echo "Sin resultados<br>";
	exit;
}
?>

<table border="1">
</tr>
<?php
$mes_anio2='';
while($row=mysql_fetch_array($result)){
	$array=explode("-" , $row["fecha"]);
	$mes_anio=$array[0]."-".$array[1];

	if( $mes_anio != $mes_anio2 ){
		echo "<tr>";
		$mes_anio2 = $mes_anio;
		$total_mes=calcula_total_mes($vendedor, $mes_anio );
		echo "<td>Mes</td><td>".$mes_anio."</td><td>".str_replace('.' , ',' , $total_mes)."</td>".chr(13);
		lineas_vendedor($vendedor, $mes_anio );
		echo "</tr>";
	}	
}
?>
</table>
</center>

