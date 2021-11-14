<! #------------------------------------------------------------- >
tabla headers : usuarios

	<th>id</th>
	<th>nombre</th>
	<th>usuario</th>
	<th>contrasena</th>
	<th>permisos</th>
	<th>id_sucursal</th>
	<th>jerarquia</th>
	<th>fecha</th>
	<th>hora</th>
<! #------------------------------------------------------------- >
<! #------------------------------------------------------------- >
tabla: usuarios

	<td>id</td>
	<td>nombre</td>
	<td>usuario</td>
	<td>contrasena</td>
	<td>permisos</td>
	<td>id_sucursal</td>
	<td>jerarquia</td>
	<td>fecha</td>
	<td>hora</td>
<! #------------------------------------------------------------- >
<! #------------------------------------------------------------- >

<?php
#rows
	$row["id"]
	$row["nombre"]
	$row["usuario"]
	$row["contrasena"]
	$row["permisos"]
	$row["id_sucursal"]
	$row["jerarquia"]
	$row["fecha"]
	$row["hora"]

#--------------------------------------------------------
#rows table
	echo "<td>".$row["id"]."</td>"
	echo "<td>".$row["nombre"]."</td>"
	echo "<td>".$row["usuario"]."</td>"
	echo "<td>".$row["contrasena"]."</td>"
	echo "<td>".$row["permisos"]."</td>"
	echo "<td>".$row["id_sucursal"]."</td>"
	echo "<td>".$row["jerarquia"]."</td>"
	echo "<td>".$row["fecha"]."</td>"
	echo "<td>".$row["hora"]."</td>"
#--------------------------------------------------------

#--------------------------------------------------------
#rows table font
	echo '<tr>';
	echo "<td>".$row["id"]."</td>"
	echo "<td>".$row["nombre"]."</td>"
	echo "<td>".$row["usuario"]."</td>"
	echo "<td>".$row["contrasena"]."</td>"
	echo "<td>".$row["permisos"]."</td>"
	echo "<td>".$row["id_sucursal"]."</td>"
	echo "<td>".$row["jerarquia"]."</td>"
	echo "<td>".$row["fecha"]."</td>"
	echo "<td>".$row["hora"]."</td>"
	echo '</tr>'.chr(13);
#--------------------------------------------------------

#--------------------------------------------------------
#input
	echo '<td>id</td>';
	echo '<td><input type="text" name="id" value="" size="30" maxlength="80"></td>';
	echo '<td>nombre</td>';
	echo '<td><input type="text" name="nombre" value="" size="30" maxlength="80"></td>';
	echo '<td>usuario</td>';
	echo '<td><input type="text" name="usuario" value="" size="30" maxlength="80"></td>';
	echo '<td>contrasena</td>';
	echo '<td><input type="text" name="contrasena" value="" size="30" maxlength="80"></td>';
	echo '<td>permisos</td>';
	echo '<td><input type="text" name="permisos" value="" size="30" maxlength="80"></td>';
	echo '<td>id_sucursal</td>';
	echo '<td><input type="text" name="id_sucursal" value="" size="30" maxlength="80"></td>';
	echo '<td>jerarquia</td>';
	echo '<td><input type="text" name="jerarquia" value="" size="30" maxlength="80"></td>';
	echo '<td>fecha</td>';
	echo '<td><input type="text" name="fecha" value="" size="30" maxlength="80"></td>';
	echo '<td>hora</td>';
	echo '<td><input type="text" name="hora" value="" size="30" maxlength="80"></td>';
#--------------------------------------------------------

#--------------------------------------------------------
#modify
	echo '<tr><td>id</td>';
	echo '<td><input type="text" name="id" value="'.$array_usuarios["id"].'" size="30" maxlength="80"></td></tr>';
	echo '<tr><td>nombre</td>';
	echo '<td><input type="text" name="nombre" value="'.$array_usuarios["nombre"].'" size="30" maxlength="80"></td></tr>';
	echo '<tr><td>usuario</td>';
	echo '<td><input type="text" name="usuario" value="'.$array_usuarios["usuario"].'" size="30" maxlength="80"></td></tr>';
	echo '<tr><td>contrasena</td>';
	echo '<td><input type="text" name="contrasena" value="'.$array_usuarios["contrasena"].'" size="30" maxlength="80"></td></tr>';
	echo '<tr><td>permisos</td>';
	echo '<td><input type="text" name="permisos" value="'.$array_usuarios["permisos"].'" size="30" maxlength="80"></td></tr>';
	echo '<tr><td>id_sucursal</td>';
	echo '<td><input type="text" name="id_sucursal" value="'.$array_usuarios["id_sucursal"].'" size="30" maxlength="80"></td></tr>';
	echo '<tr><td>jerarquia</td>';
	echo '<td><input type="text" name="jerarquia" value="'.$array_usuarios["jerarquia"].'" size="30" maxlength="80"></td></tr>';
	echo '<tr><td>fecha</td>';
	echo '<td><input type="text" name="fecha" value="'.$array_usuarios["fecha"].'" size="30" maxlength="80"></td></tr>';
	echo '<tr><td>hora</td>';
	echo '<td><input type="text" name="hora" value="'.$array_usuarios["hora"].'" size="30" maxlength="80"></td></tr>';
#--------------------------------------------------------

?>
<! #------------------------------------------------------------- >
#modify2
	<tr><td>id</td>
	<td><input type="text" name="id" value="<?php echo $array_usuarios["id"]; ?>" size="30" maxlength="80"></td></tr>
	<tr><td>nombre</td>
	<td><input type="text" name="nombre" value="<?php echo $array_usuarios["nombre"]; ?>" size="30" maxlength="80"></td></tr>
	<tr><td>usuario</td>
	<td><input type="text" name="usuario" value="<?php echo $array_usuarios["usuario"]; ?>" size="30" maxlength="80"></td></tr>
	<tr><td>contrasena</td>
	<td><input type="text" name="contrasena" value="<?php echo $array_usuarios["contrasena"]; ?>" size="30" maxlength="80"></td></tr>
	<tr><td>permisos</td>
	<td><input type="text" name="permisos" value="<?php echo $array_usuarios["permisos"]; ?>" size="30" maxlength="80"></td></tr>
	<tr><td>id_sucursal</td>
	<td><input type="text" name="id_sucursal" value="<?php echo $array_usuarios["id_sucursal"]; ?>" size="30" maxlength="80"></td></tr>
	<tr><td>jerarquia</td>
	<td><input type="text" name="jerarquia" value="<?php echo $array_usuarios["jerarquia"]; ?>" size="30" maxlength="80"></td></tr>
	<tr><td>fecha</td>
	<td><input type="text" name="fecha" value="<?php echo $array_usuarios["fecha"]; ?>" size="30" maxlength="80"></td></tr>
	<tr><td>hora</td>
	<td><input type="text" name="hora" value="<?php echo $array_usuarios["hora"]; ?>" size="30" maxlength="80"></td></tr>
<! #------------------------------------------------------------- >
<?php

#----------------------------------------------------------------------------------
#muestra
	echo '<tr><td>id</td>';
	echo '<td>'.$array_usuarios["id"].'</td></tr>';
	echo '<tr><td>nombre</td>';
	echo '<td>'.$array_usuarios["nombre"].'</td></tr>';
	echo '<tr><td>usuario</td>';
	echo '<td>'.$array_usuarios["usuario"].'</td></tr>';
	echo '<tr><td>contrasena</td>';
	echo '<td>'.$array_usuarios["contrasena"].'</td></tr>';
	echo '<tr><td>permisos</td>';
	echo '<td>'.$array_usuarios["permisos"].'</td></tr>';
	echo '<tr><td>id_sucursal</td>';
	echo '<td>'.$array_usuarios["id_sucursal"].'</td></tr>';
	echo '<tr><td>jerarquia</td>';
	echo '<td>'.$array_usuarios["jerarquia"].'</td></tr>';
	echo '<tr><td>fecha</td>';
	echo '<td>'.$array_usuarios["fecha"].'</td></tr>';
	echo '<tr><td>hora</td>';
	echo '<td>'.$array_usuarios["hora"].'</td></tr>';
#----------------------------------------------------------------------------------


#----------------------------------------------------------------------------------
#array post
	$array_usuarios["id"]=$_POST["id"];
	$array_usuarios["nombre"]=$_POST["nombre"];
	$array_usuarios["usuario"]=$_POST["usuario"];
	$array_usuarios["contrasena"]=$_POST["contrasena"];
	$array_usuarios["permisos"]=$_POST["permisos"];
	$array_usuarios["id_sucursal"]=$_POST["id_sucursal"];
	$array_usuarios["jerarquia"]=$_POST["jerarquia"];
	$array_usuarios["fecha"]=$_POST["fecha"];
	$array_usuarios["hora"]=$_POST["hora"];
#----------------------------------------------------------------------------------


#----------------------------------------------------------------------------------
#array get
	$array_usuarios["id"]=$_GET["id"];
	$array_usuarios["nombre"]=$_GET["nombre"];
	$array_usuarios["usuario"]=$_GET["usuario"];
	$array_usuarios["contrasena"]=$_GET["contrasena"];
	$array_usuarios["permisos"]=$_GET["permisos"];
	$array_usuarios["id_sucursal"]=$_GET["id_sucursal"];
	$array_usuarios["jerarquia"]=$_GET["jerarquia"];
	$array_usuarios["fecha"]=$_GET["fecha"];
	$array_usuarios["hora"]=$_GET["hora"];
#----------------------------------------------------------------------------------


#----------------------------------------------------------------------------------
#rows2
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["nombre"].'</td>';
	echo '<td>'.$row["usuario"].'</td>';
	echo '<td>'.$row["contrasena"].'</td>';
	echo '<td>'.$row["permisos"].'</td>';
	echo '<td>'.$row["id_sucursal"].'</td>';
	echo '<td>'.$row["jerarquia"].'</td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["hora"].'</td>';
#----------------------------------------------------------------------------------


#----------------------------------------------------------------------------------
#rows3
	echo $row["id"].'<br>'.chr(13);
	echo $row["nombre"].'<br>'.chr(13);
	echo $row["usuario"].'<br>'.chr(13);
	echo $row["contrasena"].'<br>'.chr(13);
	echo $row["permisos"].'<br>'.chr(13);
	echo $row["id_sucursal"].'<br>'.chr(13);
	echo $row["jerarquia"].'<br>'.chr(13);
	echo $row["fecha"].'<br>'.chr(13);
	echo $row["hora"].'<br>'.chr(13);
#----------------------------------------------------------------------------------


#estructura tabla
#--------------------------------------
# 0 id
# 1 nombre
# 2 usuario
# 3 contrasena
# 4 permisos
# 5 id_sucursal
# 6 jerarquia
# 7 fecha
# 8 hora
#--------------------------------------

#--------------------------------------
$query='select * from usuarios';
$result=mysql_query($query)or die(mysql_error() ." ".$_SERVER["script_name"]." ".$query);
while($row=mysql_fetch_array($result)){
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["nombre"].'</td>';
	echo '<td>'.$row["usuario"].'</td>';
	echo '<td>'.$row["contrasena"].'</td>';
	echo '<td>'.$row["permisos"].'</td>';
	echo '<td>'.$row["id_sucursal"].'</td>';
	echo '<td>'.$row["jerarquia"].'</td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["hora"].'</td>';
}
#--------------------------------------


#--------------------------------------
	echo '<td><input type="text" name="id'.$row["id"].'" id="id'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["id"].'"></td>';
	echo '<td><input type="text" name="nombre'.$row["id"].'" id="nombre'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["nombre"].'"></td>';
	echo '<td><input type="text" name="usuario'.$row["id"].'" id="usuario'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["usuario"].'"></td>';
	echo '<td><input type="text" name="contrasena'.$row["id"].'" id="contrasena'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["contrasena"].'"></td>';
	echo '<td><input type="text" name="permisos'.$row["id"].'" id="permisos'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["permisos"].'"></td>';
	echo '<td><input type="text" name="id_sucursal'.$row["id"].'" id="id_sucursal'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["id_sucursal"].'"></td>';
	echo '<td><input type="text" name="jerarquia'.$row["id"].'" id="jerarquia'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["jerarquia"].'"></td>';
	echo '<td><input type="text" name="fecha'.$row["id"].'" id="fecha'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["fecha"].'"></td>';
	echo '<td><input type="text" name="hora'.$row["id"].'" id="hora'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["hora"].'"></td>';
#--------------------------------------

?>




