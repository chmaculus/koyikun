<?php
echo "marca<br>";
	$qb='select distinct clasificacion from ventas 
										where marca="'.$rowa["marca"].'" 
										and fecha>="'.fecha_conv("/", $_POST["desde"]).'" 
										and fecha<="'.fecha_conv("/", $_POST["hasta"]).'" 
											order by clasificacion';
	$rb=mysql_query($qb);
	if(mysql_error()){
		echo mysql_error()."<br>";
		echo $qb."<br>";
	}
	while($rowb=mysql_fetch_array($rb)){
		include("includes/clasificacion.inc.php");
	}
?>