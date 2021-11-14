show columns from koyikun.descuentos_autorizaciones


#-----------------------------------------
function array_descuentos_autorizaciones($id_descuentos_autorizaciones){
	$query='select * from descuentos_autorizaciones where id="'.$id_descuentos_autorizaciones.'"';
	$res=mysql_query($query);
	if(mysql_error()){
		 echo mysql_error()."<br>".chr(10);
		 echo $query."<br>".chr(10);
		 echo $_SERVER["SCRIPT_NAME"]."<br>".chr(10);
		 return "Error mysql_query";
	}
	$rows=mysql_num_rows($res);
	if($rows==1){
		$array_descuentos_autorizaciones=mysql_fetch_array($res);
		return $array_descuentos_autorizaciones;		
	}else{
		return NULL;
	}
}
#-----------------------------------------


#-----------------------------------------
$array_descuentos_autorizaciones=array_descuentos_autorizaciones($id_descuentos_autorizaciones);
#-----------------------------------------



#----------------------------------------
$array_descuentos_autorizaciones["id"]
$array_descuentos_autorizaciones["n_carnet"]
$array_descuentos_autorizaciones["nombre"]
$array_descuentos_autorizaciones["apellido"]
$array_descuentos_autorizaciones["id_sucursal"]
$array_descuentos_autorizaciones["codigo"]
#----------------------------------------

#----------------------------------------
echo $array_descuentos_autorizaciones["id"];
echo $array_descuentos_autorizaciones["n_carnet"];
echo $array_descuentos_autorizaciones["nombre"];
echo $array_descuentos_autorizaciones["apellido"];
echo $array_descuentos_autorizaciones["id_sucursal"];
echo $array_descuentos_autorizaciones["codigo"];
#----------------------------------------

#----------------------------------------
echo '<table border="1">';
echo "<td>".$array_descuentos_autorizaciones["id"]."<td>";
echo "<td>".$array_descuentos_autorizaciones["n_carnet"]."<td>";
echo "<td>".$array_descuentos_autorizaciones["nombre"]."<td>";
echo "<td>".$array_descuentos_autorizaciones["apellido"]."<td>";
echo "<td>".$array_descuentos_autorizaciones["id_sucursal"]."<td>";
echo "<td>".$array_descuentos_autorizaciones["codigo"]."<td>";
echo "</table>";
#----------------------------------------

#----------------------------------------
echo '<table border="1">';
echo "<td>".$_POST["id"]."<td>";
echo "<td>".$_POST["n_carnet"]."<td>";
echo "<td>".$_POST["nombre"]."<td>";
echo "<td>".$_POST["apellido"]."<td>";
echo "<td>".$_POST["id_sucursal"]."<td>";
echo "<td>".$_POST["codigo"]."<td>";
echo "</table>";
#----------------------------------------

#----------------------------------------
echo '<table border="1">';
echo "<td>".$_GET["id"]."<td>";
echo "<td>".$_GET["n_carnet"]."<td>";
echo "<td>".$_GET["nombre"]."<td>";
echo "<td>".$_GET["apellido"]."<td>";
echo "<td>".$_GET["id_sucursal"]."<td>";
echo "<td>".$_GET["codigo"]."<td>";
echo "</table>";
#----------------------------------------

#----------------------------------------
echo $_POST["id"];
echo $_POST["n_carnet"];
echo $_POST["nombre"];
echo $_POST["apellido"];
echo $_POST["id_sucursal"];
echo $_POST["codigo"];
#----------------------------------------

#----------------------------------------
echo $_GET["id"];
echo $_GET["n_carnet"];
echo $_GET["nombre"];
echo $_GET["apellido"];
echo $_GET["id_sucursal"];
echo $_GET["codigo"];
#----------------------------------------


#----------------------------------------
echo '<table border="1">';
	echo '<tr>';
		echo '<th>id</th>';
		echo '<td>'.$array_descuentos_autorizaciones["id"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>n_carnet</th>';
		echo '<td>'.$array_descuentos_autorizaciones["n_carnet"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>nombre</th>';
		echo '<td>'.$array_descuentos_autorizaciones["nombre"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>apellido</th>';
		echo '<td>'.$array_descuentos_autorizaciones["apellido"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>id_sucursal</th>';
		echo '<td>'.$array_descuentos_autorizaciones["id_sucursal"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>codigo</th>';
		echo '<td>'.$array_descuentos_autorizaciones["codigo"].'</td>';
	echo '</tr>';
echo "</table>";
#----------------------------------------

