<?php
include("../includes/connect.php");


for($i=1;$i<=200;$i++){
	$q='insert into cajones set numero="'.$i.'"';
	echo $q.";".chr(10);
	mysql_query($q);
	if(mysql_error()){echo mysql_error().chr(10);}
	
}



?>