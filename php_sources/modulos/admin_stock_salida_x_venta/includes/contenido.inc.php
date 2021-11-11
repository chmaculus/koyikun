<?php
echo "contenido<br>";
$qe='select distinct presentacion from ventas 
		where marca="'.$rowa["marca"].'" 
		and clasificacion="'.$rowb["clasificacion"].'" 
		and subclasificacion="'.$rowc["subclasificacion"].'" 
		and contenido="'.$rowd["contenido"].'" 
		and fecha>="'.fecha_conv("/", $_POST["desde"]).'" 
		and fecha<="'.fecha_conv("/", $_POST["hasta"]).'" 
			order by contenido';
			
#$rd=mysql_query($qc);
echo $qe."<br><br>";
#falta agregar ejecuta query
$re=mysql_query($qe);
		
		
if(mysql_error()){
	echo mysql_error()."<br>";
}


while($rowe=mysql_fetch_array($re)){
	include("includes/presentacion.inc.php");
}

?>