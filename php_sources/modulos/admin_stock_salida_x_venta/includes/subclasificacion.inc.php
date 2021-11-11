<?php
echo "subclasificacion<br>";

$qd='select distinct contenido from ventas 
								where marca="'.$rowa["marca"].'" 
								and clasificacion="'.$rowb["clasificacion"].'" 
								and subclasificacion="'.$rowc["subclasificacion"].'" 
								and fecha>="'.fecha_conv("/", $_POST["desde"]).'" 
								and fecha<="'.fecha_conv("/", $_POST["hasta"]).'" 
									order by contenido';
#$rd=mysql_query($qc);
echo $qd."<br><br>";
#falta agregar ejecuta query
$rd=mysql_query($qd);
		
		
if(mysql_error()){
	echo mysql_error()."<br>";
}

while($rowd=mysql_fetch_array($rd)){
	include("includes/contenido.inc.php");
}

?>