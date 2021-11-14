<?php
include_once("servicio_tecnico_base.php");
?>

<center>
<?php
include("../includes/connect.php");
$query='select * from servicio_tecnico where sucursal="'.$_COOKIE["id_sucursal"].'" and estado!="entregado"';
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<table class="t1">';
echo "<tr>";
	echo "<th>codigo servicio</th>";
	echo "<th>Apellido</th>";
	echo "<th>Nombres</th>";
	echo "<th>Marca</th>";
	echo "<th>Modelo</th>";
	echo "<th>N de serie</th>";
	echo "<th>falla</th>";
	echo "<th>estado</th>";
	echo "<th>total</th>";
	echo "<th>retirado</th>";
	echo "<th>Fecha ingreso</th>";
	echo "<th>Hora ingreso</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){

	if($row["estado"]=="aprobado"){echo '<tr>';}
        if($row["estado"]=="finalizado"){echo '<tr class="verde">';}
        if($row["estado"]=="entregado"){echo '<tr>';}
        if($row["estado"]=="rechazado"){echo '<tr class="azul">';}
        if($row["estado"]=="pendiente"){echo '<tr class="rojo">';}
        if($row["estado"]=="presupuestado"){echo '<tr class="amarillo">';}


	$codigo_serv=str_replace("-","",$row["fecha_ingreso"]).$row["id"];	
	echo '<td>'.$codigo_serv.'</td>';
	echo '<td>'.$row["apellido"].'</td>';
	echo '<td>'.$row["nombres"].'</td>';
	echo '<td>'.$row["marca"].'</td>';
	echo '<td>'.$row["modelo"].'</td>';
	echo '<td>'.$row["n_de_serie"].'</td>';
	echo '<td>'.$row["falla_declarada"].'</td>';
	echo '<td>'.$row["estado"].'</td>';
	echo '<td>'.$row["total"].'</td>';
	echo '<td>'.$row["retirado"].'</td>';
	echo '<td>'.$row["fecha_ingreso"].'</td>';
	echo '<td>'.$row["hora_ingreso"].'</td>';
	echo '<td><A HREF="servicio_tecnico_ver.php?id_servicio='.$row["id"].'" ><button>VER</button></A></td>';
	echo "</tr>".chr(10);
}
?>
</table></center>
