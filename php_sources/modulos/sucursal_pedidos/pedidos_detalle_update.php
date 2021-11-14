<?php


include_once("../../includes/connect.php");
include_once("../../includes/funciones_varias.php");
include_once("../../includes/funciones_articulos.php");
include_once("cabecera.inc.php");
include_once("../../login/login_verifica.inc.php");

echo "jajajaja";


#jrarquia 0 coresponde a administrador
if($jerarquia!="2"){
        header('Location: ../../login/login_nologin.php?nologin=6');
        exit;
} 

$fecha=date("Y-n-d");
$hora=date("H:i:s");


$id_session=$_COOKIE["id_session"];
$id_sucursal=$_COOKIE["id_sucursal"];

//echo "q1:".$_POST["query"]."<br>";

//echo "query:".base64_decode($_POST["query"])."<br>";
$q=base64_decode($_POST["query"]);

echo "<br>";

$res=mysql_query($q);
echo "rows: ".mysql_num_rows($res)."<br>";

while($row=mysql_fetch_array($res)){
		//echo "id: ".$row["id"]." cant: ".$_POST["cantidad".$row["id"]]."<br>";
		$query='update pedidos set estado="Recibido", cantidad_recibida_real="'.$_POST["cantidad".$row["id"]].'", fecha_ped_rec="'.$fecha.'", hora_ped_rec="'.$hora.'"  where id="'.$row["id"].'"';
		mysql_query($query);
		//echo $query.";<br>";
}








?>
