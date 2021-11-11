<?php
include("usuarios_base.php");
?>
<body onLoad=document.aa.busqueda.focus()>

<center>
<titulo>Busqueda usuarios</titulo>
<?php
$limite=20;
$desde=$_POST["desde"];
$hasta=$_POST["hasta"];


include('connect.php');
?>

</body>
<form name="aa" action="<?php echo $_SERVER["SCRIPT_NAME"]; ?>" method="post">
<input type="text" name="busqueda" value="<?php echo $_POST["busqueda"]; ?>">
<input type="submit" name="buscar" value="Buscar">

<?php

#en caso de una nueva busqueda resetear las variables 
if($_POST["buscar"]=="Buscar"){
	$desde="";
	$hasta="";
}
#-------------------

if (!$_POST["busqueda"]) {
	echo '<br><font1>Busqueda vacia</font1>';
	exit;
}


$query='select * from usuarios where titulo like "%'.$_POST["busqueda"].'%" order by genero, titulo';

#total de los resultados
$total_rows=mysql_num_rows(mysql_query($query));
if(mysql_error()){
	echo mysql_error()." ".$SCRIPT_NAME;
}
#--------------------------------------------

// control paginas
#primera busqueda cuando no existen las variables
if(!$desde || $desde==0){
	$desde="0";
	$hasta = $limite;
}
#----------------------------------------------

if($_POST["control"]=="anteriores"){
	if($desde >= $limite){ //para que no reste en la primera busqueda
		$desde = $desde - $limite;
		$hasta = $desde + $limite;
	}
}
if($_POST["control"]=="siguientes"){
	if($hasta != $total_rows){ //para que llegado al final no siga sumando
		$desde = $desde + $limite;
		$hasta = $desde + $limite;
	}
	if ($hasta > $total_rows) { $hasta = $total_rows ; }
}

$query .= " limit $desde,$limite";// establece limite al query actual

# limita que hasta no sea mayor que el total de los resultados
if ($hasta > $total_rows) { $hasta = $total_rows ; }
#---------------------------------------------------
// fin control paginas

$result = mysql_query($query);
if(mysql_error()){
	echo mysql_error()." ".$SCRIPT_NAME;
}


#crea cabecera listado
echo '<br><font1>Mostrando Resultados desde: '.($desde+1).' Hasta: '.$hasta.' de: '.$total_rows.'</font1><br>';

echo '<table class="t1">';
echo '<tr>';
	echo '<th>id</th>';
	echo '<th>nombre</th>';
	echo '<th>usuario</th>';
	echo '<th>contrasena</th>';
	echo '<th>permisos</th>';
	echo '<th>id_sucursal</th>';
	echo '<th>jerarquia</th>';
	echo '<th>fecha</th>';
	echo '<th>hora</th>';
	echo "<td></td>";
	echo "<td></td>";
echo '</tr>';
#-------------------------------


#muestra resultados
while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["nombre"].'</td>';
	echo '<td>'.$row["usuario"].'</td>';
	echo '<td>'.$row["contrasena"].'</td>';
	echo '<td>'.$row["permisos"].'</td>';
	echo '<td>'.$row["id_sucursal"].'</td>';
	echo '<td>'.$row["jerarquia"].'</td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["hora"].'</td>';
	echo '<td><A HREF="usuarios_ingreso.php?id_usuarios='.$row["id"].'"><button>Modificar</button></A></td>';
	echo '<td><A HREF="usuarios_eliminar.php?id_usuarios='.$row["id"].'"><button>Eliminar</button></A></td>';
	echo "</tr>".chr(13);
}
echo "</table>";


echo '<br><font1>Mostrando Resultados desde: '.($desde+1).' Hasta: '.$hasta.' de: '.$total_rows.'</font1><br>';

#almacena variables
echo '<input type="hidden" name="desde" value="'.$desde.'">';
echo '<input type="hidden" name="hasta" value="'.$hasta.'">';
#-----------------------

#botones de control de pagina
echo '<input type="submit" name="control" value="anteriores">';
echo '<input type="submit" name="control" value="siguientes">';
#---------------------------

?>

</form>
</center>
</body>
</html>
