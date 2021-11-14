<?php
	$query='select * from ventas_temp2 where id_session="'.$id_session.'"';
	$result=mysql_query($query) or die(mysql_error()." ".$query);

	$rows=mysql_num_rows($result);
	if($rows<1){ return; }

	while($row=mysql_fetch_array($result)){
		$cantidad=$_POST['cantidad'.$row["id"]];
		if($cantidad<"1"){
			$query2='delete from ventas_temp2 where id="'.$row["id"].'"';
		}
		if($cantidad>="1"){
			$query2='update ventas_temp2 set cantidad="'.$cantidad.'" where id="'.$row["id"].'"';
		}
		mysql_query($query2);
	}

?>