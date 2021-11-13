
<center>
<form action="aaa" method="post">
<input type="text" name="fecha" value="a"><br>
<input type="submit" name="ACEPTAR" value="ACEPTAR">

</form>


<?php

if(!$_POST["fecha"]){
	//exit;
}

include("includes/connect.php");

$dias=cal_days_in_month(CAL_GREGORIAN, 11, 2021);





$q='select * from sucursales where suc_reales=1 order by sucursal';
$res=mysql_query($q);
while($row=mysql_fetch_array($res)){
	$array[]=$row;
}


echo '<table border="1">';

foreach($array as $sucursal){
	echo $sucursal[1]."<br>";
}






?>



<table border="1">
<tr>
	<td></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td></td>
</tr>
</table>








</center>




