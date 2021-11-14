<?php

include_once("../includes/connect.php");
include_once("../includes/cabecera_utf-8.inc.php");
echo "<center>";


#---------------------------------------------------------------------------------
		$id_articulos=$_POST["id_articulos"];
		
		$query='update articulos set
		id_web="'.$_POST["id_web"].'",
		discontinuo="'.$_POST["discontinuo"].'"
				where id="'.$id_articulos.'"
			';
	echo $query."<br><br>";
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}

#---------------------------------------------------------------------------------

if(!mysql_error()){
	echo '<td><font1>Los datos se actualizaron correctamente</font1></td>';
}


$q2='update articulos set zona="'.$_POST["zona"].'" where id="'.$id_articulos.'"';
mysql_query($q2);
if(!mysql_error()){
	echo '<td><font1>Los datos se actualizaron correctamente</font1></td>';
	echo $q2."<br>";
}




?>
</center>
</body>
</html>
