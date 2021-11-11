<?php
include_once("servicio_tecnico_base2.php");
include_once("../includes/funciones_varias.php");
?>
<center>
<?php

include("../includes/connect.php");
echo '<form action="'.$_SERVER["SCRIPT_NAME"].'" method="post">';
include("../includes/fecha_desde_hasta/fecha_desde_hasta.inc.php");

?>

<select name="estado">
<option value="todos" <?php if($_POST["estado"]=="todos"){echo "selected";} ?> >Todos</option>
<option value="pendiente" <?php if($_POST["estado"]=="pendiente"){echo "selected";} ?> >Pendiente</option>
<option value="presupuestado" <?php if($_POST["estado"]=="presupuestado"){echo "selected";} ?> >Presupuestado</option>
<option value="entregado" <?php if($_POST["estado"]=="entregado"){echo "selected";} ?> >Entregado</option>
<option value="finalizado" <?php if($_POST["estado"]=="finalizado"){echo "selected";} ?> >Finalizado</option>
<option value="aprobado" <?php if($_POST["estado"]=="aprobado"){echo "selected";} ?> >Aprobado</option>
<option value="rechazado" <?php if($_POST["estado"]=="rechazado"){echo "selected";} ?> >Rechazado</option>
</select>

<?php
echo '<input type="submit" name="ACEPTAR" value="ACEPTAR">';
echo '</form>';


if(!$_POST["fecha_desde"]){
    exit;
}

if($_POST["estado"]!="todos"){
    $query='select * from servicio_tecnico where fecha_ingreso>="'.fecha_conv("/",$_POST["fecha_desde"]).'" and 
    fecha_ingreso<="'.fecha_conv("/",$_POST["fecha_hasta"]).'" and estado="'.$_POST["estado"].'" order by fecha_ingreso';
}else{
    $query='select * from servicio_tecnico where fecha_ingreso>="'.fecha_conv("/",$_POST["fecha_desde"]).'" and 
    fecha_ingreso<="'.fecha_conv("/",$_POST["fecha_hasta"]).'" order by fecha_ingreso';
}




$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}

#echo "<br>".$query."<br>";

echo '<table class="t1">';
echo "<tr>";
	echo "<th>codigo servicio</th>";
	echo "<th>Apellido</th>";
	echo "<th>Nombres</th>";
	echo "<th>sucursal</th>";
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
	echo '<td>'.nombre_sucursal($row["sucursal"]).'</td>';
	echo '<td>'.$row["marca"].'</td>';
	echo '<td>'.$row["modelo"].'</td>';
	echo '<td>'.$row["n_de_serie"].'</td>';
	echo '<td>'.$row["falla_declarada"].'</td>';
	echo '<td>'.$row["estado"].'</td>';
	echo '<td>'.$row["total"].'</td>';
	echo '<td>'.$row["retirado"].'</td>';
	echo '<td>'.$row["fecha_ingreso"].'</td>';
	echo '<td>'.$row["hora_ingreso"].'</td>';
	echo '<td><A HREF="servicio_tecnico_presupuestar.php?id_servicio='.$row["id"].'" ><button>Presupuesto</button></A></td>';
	echo '<td><A HREF="servicio_tecnico_servicio.php?id_servicio='.$row["id"].'" ><button>Servicio</button></A></td>';
	//echo '<td><A HREF="stock_sucursales.php?id_articulo='.$id_articulo.'" onClick="return popup(this, \'notes\')"><button>stock</button></A></td>';
	echo "</tr>".chr(10);
}
?>
</table></center>
