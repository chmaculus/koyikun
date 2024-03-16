<?php
echo "presentacion<br>";
$qf='select distinct descripcion from ventas 
		where marca="'.$rowa["marca"].'" 
		and clasificacion="'.$rowb["clasificacion"].'" 
		and subclasificacion="'.$rowc["subclasificacion"].'" 
		and contenido="'.$rowd["contenido"].'" 
		and presentacion="'.$rowe["presentacion"].'" 
		and fecha>="'.fecha_conv("/", $_POST["desde"]).'" 
		and fecha<="'.fecha_conv("/", $_POST["hasta"]).'" 
			order by descripcion';
			
#$rd=mysql_query($qc);
echo $qf."<br><br>";
#falta agregar ejecuta query
$re=mysql_query($qf);
		
		
if(mysql_error()){
	echo mysql_error()."<br>";
}


while($rowf=mysql_fetch_array($rf)){
	#include("includes/descripcion.inc.php");
}

?>