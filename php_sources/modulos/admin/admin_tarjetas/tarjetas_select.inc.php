<select name="tarjetas">
///////////////////////////////////////
<?php

$query='select * from tarjetas order by tarjeta';

echo $query;

$result=mysql_query($query);
if(mysql_error()){
	echo mysql_error();
}



if(!$_POST["tarjetas"] OR $_POST["tarjetas"]==""){
    echo '<OPTION selected value="">SELECCIONE TARJETA</OPTION>'.chr(10);
}else{
	echo '<OPTION value="">SELECCIONE TARJETA</OPTION>	'.chr(10);
}


while ($row=mysql_fetch_array($result)) {
	if( $_POST["tarjetas"]==$row["id"] ){
		echo '<OPTION  selected value="'.$row["id"].'">'.$row["tarjeta"].'</OPTION>  ';
	}else{
		echo '<OPTION value="'.$row["id"].'">'.$row["tarjeta"].'</OPTION>  ';
	}
	echo chr(10);
}
?>
///////////////////////////////////////
</select>

