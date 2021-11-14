<?php
include("../includes/connect.php");





$qa='select distinct cajon from pedidos where estado="Transito"';
echo $qa.chr(10);

$resb=mysql_query($qa);
if(mysql_error()){echo mysql_error()." ".$qa."<br>";}
while($rowss=mysql_fetch_array($resb)){
        $array_cajones[]=$rowss[0];
}

var_export($array_cajones);


/*
foreach($array_cajones as $value){
    echo '<th>'.$value["cajon"].'</th>'.chr(10);
}
*/


/*
for($i=1;$i<=50;$i++){
	echo "i:".$i." ";
	if (in_array($i,$array_cajones)){
		echo "1".chr(10);
	}else{
		echo "0".chr(10);
		
	}
}
*/

for($i=1;$i<=50;$i++){
//	echo "i:".$i." ";
	$indice=array_search($i,$array_cajones,false);
	if($indice!=0){
		//echo "1".chr(10);
	}else{
	echo "i:".$i." ";
		echo "0".chr(10);
		
	}
	echo $indice.chr(10);
	
}


/*
for($i=1;$i<=50;$i++){
	echo "i:".$i." ";
	$a=array_search($i, $array_cajones);
	echo "a: ".$a.chr(10);
}
*/



?>