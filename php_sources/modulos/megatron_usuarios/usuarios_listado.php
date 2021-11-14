<?php
include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");
include_once("seguridad.inc.php");

include("usuarios_base.php");
$query="select * from usuarios order by jerarquia, usuario";
$result=mysql_query($query)or die(mysql_error());
?>

<center>
<table class="t1">
<tr>
	<th>Nombre</th>
	<th>Usuario</th>
	<th>Sucursal</th>
	<th>Jerarquia</th>
	<th>fecha</th>
	<th>hora</th>
	<th>Accion</th>
	<th>Accion</th>
</tr>

<?php
while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["nombre"].'</td>';
	echo '<td>'.$row["usuario"].'</td>';
	echo '<td>'.nombre_sucursal($row["id_sucursal"]).'</td>';
	echo '<td>'.$row["jerarquia"].'</td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["hora"].'</td>';
	echo '<td><A HREF="lineas_frame.php?id_usuarios='.$row["id"].'" target="centro"><button>Lineas</button></A></td>';
	echo '<td><A HREF="usuarios_ingreso.php?id_usuarios='.$row["id"].'"><button>Modificar</button></A></td>';
	echo '<td><A HREF="usuarios_eliminar.php?id_usuarios='.$row["id"].'"><button>Eliminar</button></A></td>';
	echo "</tr>";
}


#-----------------------------------------------------------------
function nombre_sucursal($id_sucursal){
	$query='select * from sucursales where id="'.$id_sucursal.'"';
	$array_suc=mysql_fetch_array(mysql_query($query));
return $array_suc["sucursal"];
}
#-----------------------------------------------------------------



?>

</center>
