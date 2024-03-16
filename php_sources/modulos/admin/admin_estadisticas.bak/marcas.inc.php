<?php
$q='select distinct marca from ventas_estadistica order by marca';
$r=mysql_query($q);
while($row=mysql_fetch_array($r)){
	if($_POST["marca"]==$row["marca"]){
		echo '<option value="'.$row["marca"].'" selected >'.$row["marca"].'</option>';	
	}else{
		echo '<option value="'.$row["marca"].'">'.$row["marca"].'</option>';	
	}
}


?>