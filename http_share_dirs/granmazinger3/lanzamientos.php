<?php
include_once("cabecera.inc.php");
echo '<body style="background-color:#000000;">';
echo "<center>";

/*
if(!$_GET["id"]){
	echo "salio aqui";
	exit;
}
*/

include_once("connect.php");
$desde=($_GET["id"] * 6);
$q='select id from articulos_lanzamientos limit '.$desde.',6';
//echo "q: ".$q."<br>";
$res=mysql_query($q);
if(mysql_error()){echo mysql_error();}
echo '<table><tr>';
while($row=mysql_fetch_array($res)){
	if(file_exists ( "./lanzamientos/".$row["id"].".jpg" )==1){
   	 echo '<td><img  src="./lanzamientos/'.$row["id"].'".jpg" height="330" width="330"><br>'.$row["id"].'</td>';
     // width="150" height="100"
	//	echo $row["id"];
	}else{
		echo "<td>".$row["id"]."</td>";
	}
	$count++;if($count==3){echo '</tr><tr>';}
	
}

echo '</tr>';

?>