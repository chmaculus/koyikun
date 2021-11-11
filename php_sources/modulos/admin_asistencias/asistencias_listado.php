<?php
include_once("../../login/login_verifica.inc.php");
include_once("../../includes/connect.php");

$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a administrador
if($jerarquia!="0"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
}
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
	<SCRIPT TYPE="text/javascript">
<!--
function popup(mylink, windowname)
{
if (! window.focus)return true;
var href;
if (typeof(mylink) == 'string')
   href=mylink;
else
   href=mylink.href;
window.open(href, windowname, 'width=600,height=400,scrollbars=yes');
return false;
}
//-->
</SCRIPT>

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
$query='select * from asistencias where fecha="'.fecha_conv("/",$_POST["datepicker"]).'" and turno="'.$turno.'" order by id_sucursal, fecha, hora';
$result=mysql_query($query)or die(mysql_error());
?>

<center>
<table class="t1">
<tr>
	<th>Sucursal</th>
	<th>vendedor</th>
	<th>Nombre</th>
	<th>localidad</th>
	<th>fecha</th>
	<th>hora</th>
</tr>

<?php
$id_sucursal="";
$count=0;
while($row=mysql_fetch_array($result)){
	$q='select * from vendedores where numero="'.$row["vendedor"].'"';
	$array_vendedor=mysql_fetch_array(mysql_query($q));
	echo "<tr>";
	echo '<td>'.nombre_sucursal($row["id_sucursal"]).'</td>';
	echo '<td>'.$row["vendedor"].'</td>';
	echo '<td>'.$array_vendedor["apellido"]." ".$array_vendedor["nombres"].'</td>';
	echo '<td>'.$array_vendedor["localidad"].'</td>';
	echo '<td>'.fecha_conv("-",$row["fecha"]).'</td>';
	echo '<td>'.$row["hora"].'</td>';
 echo '<td><A HREF="vendedor_traslada.php?id_vendedor='.$array_vendedor["id"].'" onClick="return popup(this, \'notes\')"><button>Trasladar</button></A></td>';
  if(file_exists ( "./vendedores/".$array_vendedor["id"].".jpg" )==1){
		//echo '<td>'.$id_vendedor.'</td>';

		 echo '<td><img  src="./vendedores/'.$array_vendedor["id"].'.jpg" width="100" height="110"></td>';
		 
	}
	echo "</tr>";
	$count++;
}
?>
</center>
