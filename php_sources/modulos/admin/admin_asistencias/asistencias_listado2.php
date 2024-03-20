<?php
include_once("../login/login_verifica.inc.php");
include_once("../../includes/connect.php");

include_once("../seguridad.inc.php");
if($_POST["turno"]=="M"){
	$selected_m="selected";
	$selected_t="";
	$turno=$_POST["turno"];
}

if($_POST["turno"]=="T"){
	$selected_m="";
	$selected_t="selected";
	$turno=$_POST["turno"];
}
if(!$_POST["turno"]){
	$selected_m="selected";
	$selected_t="";
	$turno="M";
}

?>
<!doctype html>
<html lang="es">
<head>
	<link type="text/css" href="../../jquery-1.3.2/themes/base/ui.all.css" rel="stylesheet" />
	<link type="text/css" href="style.css" rel="stylesheet" />
	<script type="text/javascript" src="../../jquery-1.3.2/jquery-1.3.2.js"></script>
	<script type="text/javascript" src="../../jquery-1.3.2/ui/ui.core.js"></script>
	<script type="text/javascript" src="../../jquery-1.3.2/ui/ui.datepicker.js"></script>
	<script type="text/javascript" src="../../jquery-1.3.2/ui/i18n/ui.datepicker-es.js"></script>
	<script type="text/javascript">
	$(function() {
		$('#datepicker').datepicker({
			changeMonth: true,
			changeYear: true
		});
	});
	</script>
</head>
<body>

<div class="demo">
<center>
<form action="<?php echo $_SERVER["SCRIPT_NAME"]; ?>" method="post">

<p>Fecha: <input type="text" id="datepicker" name="datepicker" value="<?php if(!$_POST["datepicker"]){echo date("d/n/Y");}else{echo $_POST["datepicker"];} ?>">
<select name="turno" size="0">
<option value="M" label="M" <?php echo $selected_m; ?>>M</option>
<option value="T" label="T" <?php echo $selected_t; ?>>T</option>
</select>

<input type="submit" name="ACEPTAR" value="ACEPTAR">
</p>
</form>
</div><!-- End demo -->

</body>
</html>

<?php
if(!$_POST["datepicker"]){
	exit;
}



include("../../includes/connect.php");
include("../../includes/funciones_varias.php");
$query='select distinct id_sucursal from asistencias where fecha="'.fecha_conv("/",$_POST["datepicker"]).'" and turno="'.$turno.'" order by id_sucursal, fecha, hora';
$result=mysql_query($query)or die(mysql_error());
?>

<center>
<table class="t1">

<?php
$id_sucursal="";
$col=3;
$count=0;
while($row=mysql_fetch_array($result)){
	if($col==1){
		echo '<tr>';
	}
	
	echo '<td>nom '.nombre_sucursal($row["id_sucursal"]).'</td>';
	
	echo '		<table class="t1">';
	$res=mysql_query('select * from asistencias where id_sucursal="'.$row["id_sucursal"].'" and fecha="'.fecha_conv("/",$_POST["datepicker"]).'"  and turno="'.$turno.'" ');
	while($row2=mysql_fetch_array($res)) {
		echo '		<tr><td>'.$row2["vendedor"].'</td></tr>';
		echo '		<tr><td>'.$row2["hora"].'</td></tr>'.chr(10);
		
			echo '<td>'."./vendedores/".$row2["vendedor"].".jpg".'</td>';
		if(file_exists ( "./vendedores/".$row2["vendedor"].".jpg" )==1){
            echo '<img  src="./vendedores/'.$row2["vendedor"].'.jpg" width="280" height="177">';
      }else{
            echo '<img  src="./vendedores/notfound.png" width="280" height="177">';
      }



	}
	$count++;
	echo '		</table>'.chr(10);
	if($count==3){
		echo '</tr>';
		$count=0;
	}
}
?>
</center>
