<?php
include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");
$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a administrador
if($jerarquia!="0"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 
include("base.php");

$fecha=date("Y-n-d");
$hora=date("H:i:s");
$codigo_buzon=date("nd His");


//echo $_POST["query"];
echo '<center>';

if(!$_POST["query"]){
	echo "salio aqui<br>";
	exit;
}

$query=base64_decode($_POST["query"]);


$res=mysql_query($query);
while($row=mysql_fetch_array($res)){
	$verif=$_POST["verif".$row[id]];
	$q='update reportes_caja set verif="'.$verif.'" where id="'.$row["id"].'"';
	mysql_query($q);
	if(mysql_error()){echo mysql_error()."<br>".$q."<br>";}
	//echo $q."<br>";

}


if(!mysql_error()){
		echo '<td>Los datos se ingresaron correctamente</td>';
}

echo "</center>";

 if($_POST["accion"]=="ELIMINAR"){
 	$query='delete from reportes_caja where id="'.$id_reportes_caja.'"';
 	mysql_query($query)or die(mysql_error());
 }

?>
</center>
