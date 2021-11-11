<?php
include_once("../../includes/connect.php");
include("../../login/login_verifica.inc.php");
$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a administrador
if($jerarquia!="0"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 
include("base.php");
echo "<center>";
include("../../includes/funciones_varias.php");
?>
<form action="<?php echo $_SERVER["SCRIPT_NAME"]; ?>" method="post">
<?php include("fecha_desde_hasta.inc.php"); ?>
<input type="submit" name="ACEPTAR" value="ACEPTAR" />
</form>
<?php
$query='select * from reportes_caja where fecha>= "'.fecha_conv("/",$_POST["fecha_desde"]).'" and 
												fecha <= "'.fecha_conv("/",$_POST["fecha_hasta"]).'" order by sucursal, fecha, hora';
$result=mysql_query($query)or die(mysql_error());
?>


<table class="t1">
<tr>
	<th>Sucursal</th>
	<th>Motivo</th>
	<th>Importe</th>
	<th>Vendedor</th>
	<th>Codigo buzon</th>
	<th>fecha</th>
	<th>hora</th>
	<th>accion</th>
</tr>

<?php
while($row=mysql_fetch_array($result)){
	if($sucursal!=$row["sucursal"]){
		#------------------------------------------------
		$sucursal=$row["sucursal"];
		$aaa=mysql_fetch_array(mysql_query('select sum(importe) from reportes_caja where sucursal="'.$row["sucursal"].'" and fecha="'.$row["fecha"].'"'));
		echo "<tr>";
		echo '<td>TB '.nombre_sucursal($row["sucursal"]).'</td>';
		echo '<td>'.$aaa[0].'</td>';
		//echo '<td>Suc:'.nombre_sucursal($row["sucursal"]).' q: '.$q.'</td>';
		echo "</tr>";
		#------------------------------------------------

		#------------------------------------------------
		$q='select sum( cantidad * precio_unitario )	from ventas where fecha="'.$row["fecha"].'" and sucursal="'.nombre_sucursal($row["sucursal"]).'" and tipo_pago="CO"';
		$total=mysql_fetch_array(mysql_query($q));
		if(mysql_error()){
			echo '<td>'.mysql_error().'</td>';
		}
		
		echo "<tr>";
		echo '<td>ES '.nombre_sucursal($row["sucursal"]).'</td>';
		echo '<td>'.$total[0].'</td>';
		//echo '<td>'.$q.'</td>';
		echo "</tr>";
		#------------------------------------------------

		#------------------------------------------------
		$q='select sum( cantidad * precio_unitario )	from ventas where fecha="'.$row["fecha"].'" and sucursal="'.nombre_sucursal($row["sucursal"]).'" and (tipo_pago="TA" or  tipo_pago="DE")';
		$total=mysql_fetch_array(mysql_query($q));
		if(mysql_error()){
			echo '<td>'.mysql_error().'</td>';
		}
		echo "<tr>";
		echo '<td>TS '.nombre_sucursal($row["sucursal"]).'</td>';
		echo '<td>'.$total[0].'</td>';
		//echo '<td>'.$q.'</td>';
		echo "</tr>";
		#------------------------------------------------

		#------------------------------------------------
		$q='select sum( cantidad * precio_unitario )	from ventas where fecha="'.$row["fecha"].'" and sucursal="'.nombre_sucursal($row["sucursal"]).'"';
		$total=mysql_fetch_array(mysql_query($q));
		if(mysql_error()){
			echo '<td>'.mysql_error().'</td>';
		}
		echo "<tr>";
		echo '<td>TTS '.nombre_sucursal($row["sucursal"]).'</td>';
		echo '<td>'.$total[0].'</td>';
		//echo '<td>'.$q.'</td>';
		echo "</tr>";
		#------------------------------------------------

		#------------------------------------------------
		echo "<tr>";
		echo '<td>Dif '.nombre_sucursal($row["sucursal"]).'</td>';
		echo '<td>'.($aaa[0] - $total[0] ).'</td>';
		//echo '<td>'.$q.'</td>';
		echo "</tr>";
		#------------------------------------------------

	}
	echo "<tr>";
	echo '<td>'.nombre_sucursal($row["sucursal"]).'</td>';
	echo '<td>'.$row["motivo"].'</td>';
	echo '<td>'.$row["importe"].'</td>';
	echo '<td>'.$row["vendedor"].'</td>';
	echo '<td>'.$row["codigo_buzon"].'</td>';
	echo '<td>'.fecha_conv("-",$row["fecha"]).'</td>';
	echo '<td>'.$row["hora"].'</td>';
	echo '<td><a href="reportes_caja_eliminar.php?id_reportes_caja='.$row["id"].'"><button>Eliminar</button></a></td>';
	echo "</tr>";
}





?>
</center>
