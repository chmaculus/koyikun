<?php
include("./includes/connect.php");
$q='show tables';
$res=mysql_query($q);




echo 'echo "">tablas.sql'.chr(10);
while($row=mysql_fetch_array($res)){
	if($row[0]!="ventas"){
		echo 'mysqldump -u root -pmaculuss koyikun '.$row[0].'>>tablas.sql'.chr(10);
	}
	
	
}


?>