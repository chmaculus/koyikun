<head>
	<link type="text/css" href="style.css" rel="stylesheet" />
</head>
<body>


<?php
include_once("../../login/login_verifica.inc.php");
include_once("../../includes/connect.php");

$fecha=date("Y-n-d");
$hora=date("H:i:s");

if($hora>"00:00:00" AND $hora <"13:00:00"){
        $turno="M";
        //$h_entrada=get_valor(4);
}
if($hora>"13:00:01" AND $hora <"21:00:00"){
        $turno="T";
        //$h_entrada=get_valor(4);
}


$query='update asistencias set id_sucursal="'.$_POST["id_sucursal"].'" where fecha="'.$fecha.'" and turno="'.$turno.'" and vendedor="'.$_POST["vendedor"].'"';
echo $query;

mysql_query($query);
if(!mysql_error()){
	echo mysql_error()."<br>";
	echo $query."<br>";
}

?>

