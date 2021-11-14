<?php
include_once("servicio_tecnico_base.php");
include_once("../includes/connect.php");



if($_GET["id_servicio"]){
	$id_servicio_tecnico=$_GET["id_servicio"];
}else {
	echo 'salio aqui';
	exit;
}

#----------------------------------------
#muestra registro ingresado
$query='select * from servicio_tecnico where id="'.$id_servicio_tecnico.'" and sucursal="'.$_COOKIE["id_sucursal"].'"';
$array_servicio_tecnico=mysql_fetch_array(mysql_query($query));
if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
#----------------------------------------

#----------------------------------------
echo '<table border="1">';
	echo '<tr>';
		echo '<th>apellido</th>';
		echo '<td>'.$array_servicio_tecnico["apellido"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>nombres</th>';
		echo '<td>'.$array_servicio_tecnico["nombres"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>direccion</th>';
		echo '<td>'.$array_servicio_tecnico["direccion"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>celular</th>';
		echo '<td>'.$array_servicio_tecnico["celular"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>marca</th>';
		echo '<td>'.$array_servicio_tecnico["marca"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>codigo_servicio</th>';
		echo '<td>'.$array_servicio_tecnico["codigo_servicio"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>modelo</th>';
		echo '<td>'.$array_servicio_tecnico["modelo"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>n_de_serie</th>';
		echo '<td>'.$array_servicio_tecnico["n_de_serie"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>Falla</th>';
		echo '<td>'.$array_servicio_tecnico["falla_declarada"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>Falla encontrada</th>';
		echo '<td>'.$array_servicio_tecnico["falla_encontrada"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>servicio_realizado</th>';
		echo '<td>'.$array_servicio_tecnico["servicio_realizado"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>vendedor</th>';
		echo '<td>'.$array_servicio_tecnico["vendedor"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>estado</th>';
		echo '<td>'.$array_servicio_tecnico["estado"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>mano_de_obra</th>';
		echo '<td>'.$array_servicio_tecnico["mano_de_obra"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>repuestos</th>';
		echo '<td>'.$array_servicio_tecnico["repuestos"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>total</th>';
		echo '<td>'.$array_servicio_tecnico["total"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>retirado</th>';
		echo '<td>'.$array_servicio_tecnico["retirado"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>presupuesto</th>';
		echo '<td>'.$array_servicio_tecnico["presupuesto"].'</td>';
	echo '</tr>';
echo "</table>";
#----------------------------------------



echo '<br><br>';


$query='select * from servicio_tecnico_seguimiento where id_servicio="'.$array_servicio_tecnico["id"].'"';
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<table class="t1">';
echo "<tr>";
	echo "<th>id</th>";
	echo "<th>id_servicio</th>";
	echo "<th>estado_servicio</th>";
	echo "<th>estado_reparacion</th>";
	echo "<th>fecha</th>";
	echo "<th>hora</th>";
echo "</tr>";

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
echo '</table>';

echo '<br><br>';

echo '<form action="servicio_tecnico_update3.php" method="post">';

echo '<input type="hidden" name="id_servicio_tecnico" value="'.$array_servicio_tecnico["id"].'">';

if($array_servicio_tecnico["estado"]=="presupuestado"){
	echo '<input type="submit" name="accion" value="APROBAR PRESUPUESTO"><br><br>';
	echo '<input type="submit" name="accion" value="RECHAZAR PRESUPUESTO"><br>';
}

if($array_servicio_tecnico["estado"]=="finalizado"){
	echo '<input type="submit" name="accion" value="ENTREGAR">';
}
echo '</form>';

/*
presupuestado
*/

?>


