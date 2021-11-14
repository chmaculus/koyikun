<?php
include("informe_clientes_sucursal_base.php");
include("../includes/connect.php"); 

?>

<center>
<BR>

<form action="<?php echo $_SERVER["SCRIPT_NAME"];?>" method="post">

<?php  
include("../includes/fecha_desde_hasta.inc.php"); 
include("./sucursal_select.inc.php");
?>

<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
<br>

<?php

if(!$_POST["fecha_desde"]){
	exit;
}
include("../includes/connect.php");
include("../includes/funciones_varias.php");

$fecha_desde=fecha_conv("/",$_POST["fecha_desde"]);
$fecha_hasta=fecha_conv("/",$_POST["fecha_hasta"]);


#-------------------------------------------------------------------------------------------------------------
if($_POST["id_sucursal"]!=""){
	$q='select fecha, sum(compra="s") as compra ,sum(compra="n") as nocompra from informe_clientes_sucursal 
												where fecha>="'.fecha_conv("/",$_POST["fecha_desde"]).'" and  
													fecha<="'.fecha_conv("/",$_POST["fecha_hasta"]).'" and
													id_sucursal="'.$_POST["id_sucursal"].'"
													group by fecha';

}else{
	$q='select fecha, sum(compra="s") as compra ,sum(compra="n") as nocompra from informe_clientes_sucursal 
												where fecha>="'.fecha_conv("/",$_POST["fecha_desde"]).'" and  
													fecha<="'.fecha_conv("/",$_POST["fecha_hasta"]).'"
													group by fecha';
}

$res=mysql_query($q);

echo '<table class="t1">';
echo "<tr>";
	echo "<th>Fecha</th>";
	echo "<th>Compra</th>";
	echo "<th>No compra</th>";
echo "</tr>";

while($row=mysql_fetch_array($res)){
	echo "<tr>";
		echo "<td>".$row[0]."</td>";
		echo "<td>".$row[1]."</td>";
		echo "<td>".$row[2]."</td>";
	echo "</tr>";
}
echo '</table><br>';
#-------------------------------------------------------------------------------------------------------------






if($_POST["id_sucursal"]!=""){
	$q='select count(*) from informe_clientes_sucursal where fecha>="'.fecha_conv("/",$_POST["fecha_desde"]).'" and 
													fecha<="'.fecha_conv("/",$_POST["fecha_hasta"]).'" and
													id_sucursal="'.$_POST["id_sucursal"].'"
													';
}else{
	$q='select count(*) from informe_clientes_sucursal where fecha>="'.fecha_conv("/",$_POST["fecha_desde"]).'" and 
													fecha<="'.fecha_conv("/",$_POST["fecha_hasta"]).'"
													';
}	
//echo $q."<br>";

$rows=mysql_result(mysql_query($q),0,0);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}
$rrrr=mysql_num_rows($res);







if($_POST["id_sucursal"]!=""){
	$query='select compra,count(compra) from informe_clientes_sucursal where fecha>="'.fecha_conv("/",$_POST["fecha_desde"]).'" and 
																	fecha<="'.fecha_conv("/",$_POST["fecha_hasta"]).'" and
																	id_sucursal="'.$_POST["id_sucursal"].'"
																		group by compra';
}else{
	$query='select compra,count(compra) from informe_clientes_sucursal where fecha>="'.fecha_conv("/",$_POST["fecha_desde"]).'" and 
																	fecha<="'.fecha_conv("/",$_POST["fecha_hasta"]).'"
																		group by compra';
}
	
//echo $query."<br>";

$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<table class="t1">';
echo "<tr>";
	echo "<th>Compro</th>";
	echo "<th>Cantidad</th>";
echo "</tr>";


while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row[0].'</td>';
	echo '<td>'.$row[1].'</td>';
	echo '<td>%'.round((100 / $rows)*$row[1],2).'</td>';

	if($row[0]=="N"){
		echo '<td>';
		trae_motivos($fecha_desde, $fecha_hasta, $_POST["id_sucursal"]);
		echo '</td>';

		echo '<td>';
		trae_marcas($fecha_desde, $fecha_hasta, $_POST["id_sucursal"]);
		echo '</td>';

		echo '<td>';
		trae_otro($fecha_desde, $fecha_hasta, $_POST["id_sucursal"]);
		echo '</td>';
	}else{
		echo '<td></td>';
		echo '<td></td>';
		echo '<td></td>';
	}



	echo "<tr>";
	
}
echo '</table>';


#-----------------------------------------------------
function trae_motivos($fecha_desde, $fecha_hasta, $id_sucursal){
	if($id_sucursal==""){
		$q='select motivo_no,count(*) from informe_clientes_sucursal 
									where fecha>="'.fecha_conv("/",$_POST["fecha_desde"]).'" and 
										fecha<="'.fecha_conv("/",$_POST["fecha_hasta"]).'" and
										compra="N" group by motivo_no
		';
	}else{
		$q='select motivo_no,count(*) from informe_clientes_sucursal 
									where fecha>="'.fecha_conv("/",$_POST["fecha_desde"]).'" and 
										fecha<="'.fecha_conv("/",$_POST["fecha_hasta"]).'" and
										compra="N" and
										id_sucursal="'.$id_sucursal.'"  
										group by motivo_no
		';
	}


	//echo $q."<br>";
	$res=mysql_query($q);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}
	
	echo '<table class="t1">';
	echo '<tr>';
	echo "<th>Motivo</th>";
	echo "<th>Cantidad</th>";
	echo '</tr>';
	
	while($row=mysql_fetch_array($res)){
		echo '<tr>';
		echo '<td>'.$row[0].'</td>';
		echo '<td>'.$row[1].'</td>';
		echo '</tr>';
	}
	
	echo '</table>';
}

#-----------------------------------------------------


#-----------------------------------------------------
function trae_marcas($fecha_desde, $fecha_hasta, $id_sucursal){
	if($id_sucursal==""){
		$q='select marca_buscaba,count(*) from informe_clientes_sucursal 
									where fecha>="'.fecha_conv("/",$_POST["fecha_desde"]).'" and 
										fecha<="'.fecha_conv("/",$_POST["fecha_hasta"]).'" and
										(marca_buscaba!="" or
										marca_buscaba is not null) and
										compra="N"
											group by marca_buscaba
	';
	}else{
		$q='select marca_buscaba,count(*) from informe_clientes_sucursal 
									where fecha>="'.fecha_conv("/",$_POST["fecha_desde"]).'" and 
										fecha<="'.fecha_conv("/",$_POST["fecha_hasta"]).'" and
										(marca_buscaba!="" or
										marca_buscaba is not null) and
										compra="N" and
										id_sucursal="'.$id_sucursal.'"
											group by marca_buscaba
	';
	}
	//echo $q."<br>";
	$res=mysql_query($q);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}
	
	echo '<table class="t1">';
	echo '<tr>';
	echo "<th>Marca</th>";
	echo "<th>Cantidad</th>";
	echo '</tr>';
	
	while($row=mysql_fetch_array($res)){
		echo '<tr>';
		echo '<td>'.$row[0].'</td>';
		echo '<td>'.$row[1].'</td>';
		echo '</tr>';
	}
	
	echo '</table>';
}

#-----------------------------------------------------


#-----------------------------------------------------
function trae_otro($fecha_desde, $fecha_hasta, $id_sucursal){
	if($id_sucursal==""){
		$q='select otro_motivo from informe_clientes_sucursal 
									where fecha>="'.fecha_conv("/",$_POST["fecha_desde"]).'" and 
										fecha<="'.fecha_conv("/",$_POST["fecha_hasta"]).'" and
										otro_motivo is not null and
										compra="N" order by otro_motivo
	';
	}else{
		$q='select otro_motivo from informe_clientes_sucursal 
									where fecha>="'.fecha_conv("/",$_POST["fecha_desde"]).'" and 
										fecha<="'.fecha_conv("/",$_POST["fecha_hasta"]).'" and
										compra="N" and
										otro_motivo is not null and
										id_sucursal="'.$id_sucursal.'" order by otro_motivo
	';
	}
	//echo $q."<br>";
	$res=mysql_query($q);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}
	
	echo '<table class="t1">';
	echo '<tr>';
	echo "<th>Otro</th>";
	echo '</tr>';
	
	while($row=mysql_fetch_array($res)){
		echo '<tr>';
		echo '<td>'.$row[0].'</td>';
		echo '</tr>';
	}
	
	echo '</table>';
}

#-----------------------------------------------------









?>
