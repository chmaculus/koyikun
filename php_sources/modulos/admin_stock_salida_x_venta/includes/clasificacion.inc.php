<?php
echo "clasificacion<br>";
$qc='select distinct subclasificacion from ventas where 
							marca="'.$rowa["marca"].'" 
							and clasificacion="'.$rowb["clasificacion"].'" 
							and fecha>="'.fecha_conv("/", $_POST["desde"]).'" 
							and fecha<="'.fecha_conv("/", $_POST["hasta"]).'" 
								order by subclasificacion';
$rc=mysql_query($qc);
		
		
if(mysql_error()){
	echo mysql_error()."<br>";
}

while($rowc=mysql_fetch_array($rc)){
	include("includes/subclasificacion.inc.php");
}
?>