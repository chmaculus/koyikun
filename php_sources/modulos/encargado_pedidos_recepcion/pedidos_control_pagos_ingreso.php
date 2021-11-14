<?php
include("../../login/login_verifica.inc.php");
$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a administrador
if($jerarquia!="1"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 
$fecha=date("Y-n-d");
include_once("cabecera.inc.php");

if($_GET["id_pedidos_control_pagos"]){
    include_once("connect.php");
    $query='select * from pedidos_control_pagos where id="'.$_GET["id_pedidos_control_pagos"].'"';
    $array_pedidos_control_pagos=mysql_fetch_array(mysql_query($query));
    if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
}
if($_GET["uuid_pedidos_control_pagos"]){
    include_once("connect.php");
    $query='select * from pedidos_control_pagos where uuid="'.$_GET["uuid_pedidos_control_pagos"].'"';
    $array_pedidos_control_pagos=mysql_fetch_array(mysql_query($query));
}



$query2='select * from pedidos_control_pagos where id_pedidos_control="'.$_GET["id_pedidos_control"].'" limit 0,1000';
$result2=mysql_query($query2);
if(mysql_error()){echo mysql_error()."<br>".$query2."<br>";}


echo '<table class="t1">';
echo "<tr>";
	echo "<th>id</th>";
	echo "<th>id_pedidos_control</th>";
	echo "<th>tipo_pago</th>";
	echo "<th>tipo_cuenta</th>";
	echo "<th>empresa</th>";
	echo "<th>n_cheque_cuenta</th>";
	echo "<th>banco</th>";
	echo "<th>importe</th>";
	echo "<th>fecha_emision</th>";
	echo "<th>fecha_vencimiento</th>";
echo "</tr>";

while($row=mysql_fetch_array($result2)){
	echo "<tr>";
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["id_pedidos_control"].'</td>';
	echo '<td>'.$row["tipo_pago"].'</td>';
	echo '<td>'.$row["tipo_cuenta"].'</td>';
	echo '<td>'.$row["empresa"].'</td>';
	echo '<td>'.$row["n_cheque_cuenta"].'</td>';
	echo '<td>'.$row["banco"].'</td>';
	echo '<td>'.$row["importe"].'</td>';
	echo '<td>'.$row["fecha_emision"].'</td>';
	echo '<td>'.$row["fecha_vencimiento"].'</td>';
	echo "</tr>".chr(10);
}
?>
</table>




<form method="post" action="pedidos_control_pagos_update.php" name="form_pedidos_control_pagos">

<center>
<table class="t1" border="1">
	<tr>
		<th>id_pedidos_control</th>
		<td><input type="text" name="id_pedidos_control" id="id_pedidos_control" value="<?php echo $_GET["id_pedidos_control"]; ?>" size="10" readonly="readonly"></td>
	</tr>
	<tr>
		<th>Tipo pago</th>
		<td>
		 <select name="tipo_pago">
			<option value="">Seleccione</option>
			<option value="deposito">Deposito</option>
			<option value="Cheque">Cheque</option>
			<option value="efectivo">Efectivo</option>
		</select> 
		</td>
	</tr>
	<tr>
		<th>tipo_cuenta</th>
		<td>
		 <select name="tipo_cuenta">
			<option value="">Seleccione</option>
			<option value="caja de ahorro">Caja de ahorro</option>
			<option value="cuenta corriente">Cuenta corriente</option>
		</select> 
<br>Solo si es deposito		
		</td>
	</tr>
	<tr>
		<th>Empresa</th>
		<td><input type="text" name="empresa" id="empresa" value="<?php if($array_pedidos_control_pagos["empresa"]){echo $array_pedidos_control_pagos["empresa"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>N de cheque o N de cuenta <br>en el caso de deposito</th>
		<td><input type="text" name="n_cheque_cuenta" id="n_cheque_cuenta" value="<?php if($array_pedidos_control_pagos["n_cheque_cuenta"]){echo $array_pedidos_control_pagos["n_cheque_cuenta"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>banco</th>
		<td><input type="text" name="banco" id="banco" value="<?php if($array_pedidos_control_pagos["banco"]){echo $array_pedidos_control_pagos["banco"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>importe</th>
		<td><input type="text" name="importe" id="importe" value="<?php if($array_pedidos_control_pagos["importe"]){echo $array_pedidos_control_pagos["importe"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>Fecha emision <br>Cheques o deposito</th>
		<td><input type="text" name="fecha_emision" id="fecha_emision" value="<?php if($array_pedidos_control_pagos["fecha_emision"]){echo $array_pedidos_control_pagos["fecha_emision"];}else{echo $fecha;} ?>" size="10"></td>
	</tr>
	<tr>
		<th>Fecha de vencimiento<br> solo en cheques</th>
		<td><input type="text" name="fecha_vencimiento" id="fecha_vencimiento" value="<?php if($array_pedidos_control_pagos["fecha_vencimiento"]){echo $array_pedidos_control_pagos["fecha_vencimiento"];}else{echo $fecha;}?>" size="10"></td>
	</tr>

</table>

<?php
if($_GET["id_pedidos_control_pagos"] OR $array_pedidos_control_pagos["id"]){
    echo '<input type="hidden" name="accion" value="modificacion">';
    echo '<input type="hidden" name="id_pedidos_control_pagos" value="'.$array_pedidos_control_pagos["id"].'">';
    echo '<input type="hidden" name="id_pedidos_control" value="'.$_GET["id_pedidos_control"].'">';
    echo '<input type="hidden" name="uuid_pedidos_control_pagos" value="'.$array_pedidos_control_pagos["uuid"].'">';
}else{
    echo '<input type="hidden" name="accion" value="ingreso">';
}
?>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>
