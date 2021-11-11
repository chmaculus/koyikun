<?php
include("includes/connect.php");

$q='select * from seguimiento_stock where tipo="RE"';
//echo $q;
$result=mysql_query($q);
if(mysql_error()){echo mysql_error()."<br>".$q."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}

while($row=mysql_fetch_array($result)){
	$q2='update seguimiento_stock set origen="'.$row["destino"].'", destino="'.$row["origen"].'" where id="'.$row["id"].'";';
//	mysql_query($q);
//	if(mysql_error()){echo mysql_error()."<br>".$q."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
	echo $q2.chr(10);
}

?>