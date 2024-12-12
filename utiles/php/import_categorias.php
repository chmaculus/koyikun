<?php

include("./includes/connect.php");


$file="/logs/categorias.csv";
$handle = fopen($file, "r");

if ($handle) {
	$count=0;
	while (($line = fgets($handle)) !== false) {
		$count++;
		$array=explode("|",$line);
		// echo $line;
		
		if($array[7]!=""){
			echo "id: ".$array[0]." cat: ".$array[7]." sub: ".$array[8]."\n";
			$q='select * from categorias_web where categoria="'.$array[7].'" and subcategoria="'.$array[8].'"';
			$res=mysql_query($q);
			$rows=mysql_num_rows($res);
			if($rows<1){
				$q2='insert into categorias_web set categoria="'.$array[7].'", subcategoria="'.$array[8].'"';
				mysql_query($q2);
				$id_categoria = mysql_insert_id();
				echo $q2."\n";
				$q3='update articulos set id_web='.$id_categoria.' where id='.$array[0];
				mysql_query($q3);
				if(mysql_error()){
					echo $q3.";\n";
					echo mysql_error()."\n";
				}
				// echo "q3 ".$q3."\n";
			}else{
				$array2=mysql_fetch_array($res);
				$q3='update articulos set id_web='.$array2["id"].' where id='.$array[0];
				mysql_query($q3);
				if(mysql_error()){
					echo $q3.";\n";
					echo mysql_error()."\n";
				}
				// echo "qq3 ".$q3."\n";

			}
		}
		if($count>10){
			// exit;
		}


	}
}








?>