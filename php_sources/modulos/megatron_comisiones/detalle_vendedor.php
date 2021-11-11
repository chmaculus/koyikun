<?php include("../login/login_verifica.inc.php");

$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a Megatron
if($jerarquia!="5"){
	header('Location: ../login/login_nologin.php?nologin=6');
	exit;
} 


include_once("cabecera.inc.php");
include_once("connect.php");
include_once("funciones.php");

if( !$_GET["vendedor"] OR !$_GET["desde"] OR !$_GET["hasta"] ){
	exit;
}

echo "<font1>Vendedor: ".$_GET["vendedor"]."</font1><br>";
$query='select * from comisiones_vendedores where vendedor="'.$_GET["vendedor"].'" and fecha>="'.$_GET["desde"].'" and fecha<="'.$_GET["hasta"].'" order by vendedor';
$result=mysql_query($query)or die(mysql_error());
echo "<center>";

?>
<form action="detalle_vendedor_excel.php" method="post">
<input type="hidden" name="query" value="<?php echo base64_encode($query); ?>">
<input type="hidden" name="vendedor" value="<?php echo $_GET["vendedor"]; ?>">
<input type="hidden" name="desde" value="<?php echo $_GET["desde"]; ?>">
<input type="hidden" name="hasta" value="<?php echo $_GET["hasta"]; ?>">
<input type="submit" name="Eportar a Excel" value="Eportar a Excel">
</form>

<table class="t1">
<tr>
	<th>Fecha</th>
	<th>T.</th>
	<th>Vendedor</th>
	<th>Linea</th>
	<th>Total</th>
	<th>Fecha sistema</th>
	<th>Hora sistema</th>
</tr>

<?php
while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.fecha_conv( "-", $row["fecha"] ).'</td>';
	echo '<td>'.$row["turno"].'</td>';
	echo '<td>'.$row["vendedor"].'</td>';
	echo '<td>'.$row["linea"].'</td>';
	echo '<td>'.str_replace( '.' , ',' , $row["total"] ).'</td>';
	echo '<td>'.fecha_conv( "-", $row["fecha_sistema"] ).'</td>';
	echo '<td>'.$row["hora_sistema"].'</td>';
	echo "</tr>";
}

echo "</table>";
echo "<br>";

$q='select distinct linea from comisiones_vendedores where vendedor="'.$_GET["vendedor"].'" and fecha>="'.$_GET["desde"].'" and fecha<="'.$_GET["hasta"].'" order by linea';
$res=mysql_query($q)or die(mysql_error()." ".$q);

while($row=mysql_fetch_array($res)){
	$total_marca=calcula_total_marca_vendedor( $row["linea"], $_GET["vendedor"], $_GET["desde"], $_GET["hasta"] );
	echo "Total: ".$row["linea"].": ".$total_marca."<br>".chr(13); 
}
?>
</center>
