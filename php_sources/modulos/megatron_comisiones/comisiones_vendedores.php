<?php

include_once("index.php");
?>
<SCRIPT TYPE="text/javascript" src="funciones.js"> 
</SCRIPT>

<?php

include_once("connect.php");

$fecha=date("Y-n-d");
$mesanio=date("n/Y");
?>
<center>

<form action="<?php echo $_SERVER["SCRIPT_NAME"]; ?>" method="post">
<font1>Desde: </font1>
<input type="text" name="desde" value="<?php if(!$_POST["desde"]){echo "1/".$mesanio; }else{ echo $_POST["desde"]; } ?>" size="13">
<font1>Hasta: </font1>
<input type="text" name="hasta" value="<?php if(!$_POST["hasta"]){echo "31/".$mesanio; }else{ echo $_POST["hasta"]; } ?>" size="13">
<input type="submit" name="Aceptar" value="Aceptar">


</form>

<?php

if( !$_POST["desde"] OR !$_POST["hasta"] ){
	exit;
}

$desde=fecha_conv( "/", $_POST["desde"] );
$hasta=fecha_conv( "/", $_POST["hasta"] );

echo '<br><font1>Listado de comisiones desde fecha : '.$_POST["desde"].' hasta: '.$_POST["hasta"].'</font1><br><br>';
?>
<table class="t1">
<tr>
	<th>Vendedor</th>
	<th>Total</th>
	<th>Detalle</th>
</tr>
<?php

$q='select distinct vendedor from comisiones_vendedores where fecha_sistema>="'.$desde.'" and fecha_sistema<="'.$hasta.'" order by vendedor';
$res=mysql_query($q)or die(mysql_error()." ".$q);

while($row=mysql_fetch_array($res)){
	$total_vendedor=calcula_total_vendedor( $row["vendedor"], $desde, $hasta );
	echo "<tr>";
	echo '<td>'.$row["vendedor"].'</td>';
	echo '<td>'.$total_vendedor.'</td>';
	echo '<td><A HREF="detalle_vendedor.php?vendedor='.$row["vendedor"].'&desde='.$desde.'&hasta='.$hasta.'" onClick="return popup(this, \'notes\')"><button>Detalles</button></A></td>';
	echo "</tr>";
}
echo "</table>";
echo "<br>";
#---------------------------------------------------------------------------------------------
function calcula_total_vendedor( $vendedor, $desde, $hasta ){
	$query='select sum(total) from comisiones_vendedores where vendedor="'.$vendedor.'" and fecha>="'.$desde.'" and fecha<="'.$hasta.'"';
	$result=mysql_query($query)or die (mysql_error());
	return mysql_result($result,0);
}
#---------------------------------------------------------------------------------------------

#---------------------------------------------------------------------------------------------
function fecha_conv($separador, $fecha){
	$f=explode($separador, $fecha);

	if($separador=="/"){
		$fecha=$f[2]."-".$f[1]."-".$f[0];
	}

	if($separador=="-"){
		$fecha=$f[2]."/".$f[1]."/".$f[0];
	}
return $fecha;
}
#---------------------------------------------------------------------------------------------


?>
</center>
