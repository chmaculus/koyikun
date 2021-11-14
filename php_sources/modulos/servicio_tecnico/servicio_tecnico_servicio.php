<?php
include_once("servicio_tecnico_base2.php");

if($_GET["id_servicio"]){
    include_once("../includes/connect.php");
    $query='select * from servicio_tecnico where id="'.$_GET["id_servicio"].'"';
    $array_servicio_tecnico=mysql_fetch_array(mysql_query($query));
    if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
}
/*
if($_GET["uuid_servicio_tecnico"]){
    include_once("connect.php");
    $query='select * from servicio_tecnico where uuid="'.$_GET["uuid_servicio_tecnico"].'"';
    $array_servicio_tecnico=mysql_fetch_array(mysql_query($query));
}
*/
?>
<form method="post" action="servicio_tecnico_update2.php" name="form_servicio_tecnico">

<center>
<table class="t1" border="1">

	<tr>
		<th>apellido</th>
		<td><?php if($array_servicio_tecnico["apellido"]){echo $array_servicio_tecnico["apellido"];}?></td>
	</tr>
	<tr>
		<th>nombres</th>
		<td><?php if($array_servicio_tecnico["nombres"]){echo $array_servicio_tecnico["nombres"];}?></td>
	</tr>
	<tr>
		<th>direccion</th>
		<td><?php if($array_servicio_tecnico["direccion"]){echo $array_servicio_tecnico["direccion"];}?></td>
	</tr>
	<tr>
		<th>celular</th>
		<td><?php if($array_servicio_tecnico["celular"]){echo $array_servicio_tecnico["celular"];}?></td>
	</tr>
	<tr>
		<th>marca</th>
		<td><?php if($array_servicio_tecnico["marca"]){echo $array_servicio_tecnico["marca"];}?></td>
	</tr>
	<tr>
		<th>codigo_servicio</th>
		<td><?php if($array_servicio_tecnico["codigo_servicio"]){echo $array_servicio_tecnico["codigo_servicio"];}?></td>
	</tr>
	<tr>
		<th>modelo</th>
		<td><?php if($array_servicio_tecnico["modelo"]){echo $array_servicio_tecnico["modelo"];}?></td>
	</tr>
	<tr>
		<th>n_de_serie</th>
		<td><?php if($array_servicio_tecnico["n_de_serie"]){echo $array_servicio_tecnico["n_de_serie"];}?></td>
	</tr>
	<tr>
		<th>falla_declarada</th>
			<td><br><?php if($array_servicio_tecnico["falla_declarada"]){echo $array_servicio_tecnico["falla_declarada"];}?><br></td>	
	</tr>
	<tr>
		<th>Fecha ingreso</th>
		<td><?php if($array_servicio_tecnico["fecha_ingreso"]){echo $array_servicio_tecnico["fecha_ingreso"];}?></td>
	</tr>
	<tr>
		<th>Hora ingreso</th>
		<td><?php if($array_servicio_tecnico["hora_ingreso"]){echo $array_servicio_tecnico["hora_ingreso"];}?></td>
	</tr>
	<tr>
		<th>Falla encontrada</th>
			<td><textarea name="falla_encontrada" id="falla_encontrada" rows="5" cols="33"><?php if($array_servicio_tecnico["falla_encontrada"]){echo $array_servicio_tecnico["falla_encontrada"];}?></textarea></td>
	</tr>
	<tr>
		<th>Presupuesto</th>
			<td><?php if($array_servicio_tecnico["presupuesto"]){echo $array_servicio_tecnico["presupuesto"];}?></td>	</tr>
	</tr>
	<tr>
		<th>Servicio realizado</th>
			<td><textarea name="servicio_realizado" id="servicio_realizado" rows="5" cols="33"><?php if($array_servicio_tecnico["servicio_realizado"]){echo $array_servicio_tecnico["servicio_realizado"];}?></textarea></td>	
	</tr>
	<tr>
		<th>Resparacion</th>
			<td>
			<select name="estado_reparacion">
			<option value="Seleccione" selected >Seleccione</option>
			<option value="Reparado">Reparado</option>
			<option value="Sin reparar">Sin reparar</option>
			</select>
			</td>
	</tr>
	<tr>
		<th>Repuestos</th>
			<td><textarea name="repuestos" id="repuestos" rows="5" cols="33"><?php if($array_servicio_tecnico["repuestos"]){echo $array_servicio_tecnico["repuestos"];}?></textarea></td>	</tr>
	</tr>
		<th>sucursal</th>
		<td><?php if($array_servicio_tecnico["sucursal"]){echo $array_servicio_tecnico["sucursal"];}?></td>
	</tr>
	<tr>
		<th>Vendedor</th>
		<td><?php if($array_servicio_tecnico["vendedor"]){echo $array_servicio_tecnico["vendedor"];}?></td>
	</tr>
	<tr>
		<th>Estado</th>
		<td><?php if($array_servicio_tecnico["estado"]){echo $array_servicio_tecnico["estado"];}?></td>
	</tr>
	<tr>
		<th>total</th>
		<td><input type="text" name="total" id="total" value="<?php if($array_servicio_tecnico["total"]){echo $array_servicio_tecnico["total"];}?>" size="10"></td>
	</tr>
</table>

<?php 
echo '<br><br>';
echo '<table class="t1">';
echo "<tr>";
	echo "<th>id</th>";
	echo "<th>id_servicio</th>";
	echo "<th>estado_servicio</th>";
	echo "<th>estado_reparacion</th>";
	echo "<th>fecha</th>";
	echo "<th>hora</th>";
echo "</tr>";

$query='select * from servicio_tecnico_seguimiento where id_servicio="'.$array_servicio_tecnico["id"].'" order by id_servicio';
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}

while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["id_servicio"].'</td>';
	echo '<td>'.$row["estado_servicio"].'</td>';
	echo '<td>'.$row["estado_reparacion"].'</td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["hora"].'</td>';
	echo "</tr>".chr(10);
}
?>
</table>
<br><br>






<?php
if($_GET["id_servicio_tecnico"] OR $array_servicio_tecnico["id"]){
    echo '<input type="hidden" name="accion" value="modificacion3">';
    echo '<input type="hidden" name="id_servicio_tecnico" value="'.$array_servicio_tecnico["id"].'">';
    echo '<input type="hidden" name="uuid_servicio_tecnico" value="'.$array_servicio_tecnico["uuid"].'">';
}else{
    echo '<input type="hidden" name="accion" value="ingreso">';
}
?>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>
