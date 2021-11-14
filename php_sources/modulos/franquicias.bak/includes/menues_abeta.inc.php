<?php
include("includes/connect.php")

#-------------------------------------------------
echo '<!--';
echo 'var MenuPrincipal = [';
#-------------------------------------------------




$q1='select * from menues where jerarquia=1 and id_padre=0 order by orden';
$r1=mysql_query($q1);
if(mysql_error()){
		echo mysql_error()."<br>".$q1."<br>";
}
while($row1=mysql_fetch_array($r1)){
	echo '	[null,\'Inicio\',\'central2.php\',\'principal\',\'Inicio\',';
	$q2='select * from menues where jerarquia=1 and id_padre='.$row1["id_padre"].' order by orden';
	$r2=mysql_query($q2);
	if(mysql_error()){
			echo mysql_error()."<br>".$q2."<br>";
	}
	while($row2=mysql_fetch_array($r2)){
		echo '		[null,\''.$row2["menu"].'\',\''.$row2["url"].'\',\'principal\',\''.$row2["menu"].'\'],';
		
	}
	echo '	],';
}

echo '];';

?>