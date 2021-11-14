<?php
$conexion = mysql_connect("localhost", "root", "maculuss");
mysql_select_db("koyikun", $conexion);


mysql_query("truncate table articulos_export");



#----------------------------------------
$query='select * from articulos where marca="el gran bastardo"';
$res=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}


while($row=mysql_fetch_array($res)){
	$array_precios=array_precios( $row["id"], 1 );
	$query='insert into koyikun.articulos_export set 
		id="'.$row["id"].'",
		codigo_interno="'.$row["codigo_interno"].'",
		marca="'.$row["marca"].'",
		descripcion="'.$row["descripcion"].'",
		contenido="'.$row["contenido"].'",
		presentacion="'.$row["presentacion"].'",
		codigo_barra="'.$row["codigo_barra"].'",
		clasificacion="'.$row["clasificacion"].'",
		subclasificacion="'.$row["subclasificacion"].'",
		precio_base="'.$array_precios["precio_base"].'",
		tarjeta="'.($array_precios["precio_base"]*1.2).'",
		color="'.$row["color"].'"';
		mysql_query($query);
		if(mysql_error()){echo mysql_error().chr(10);}
}
#------------------------------------------------------------


include_once '../src/Cezpdf.php';
$pdf = new CezPDF('a4');

$pdf->selectFont('Helvetica');

$pdf->ezImage('../../af_ap.jpg', 0, 130, 'none', 'left');
$pdf->ezText("\n", 10);
$pdf->ezText("San Martin 1418 - Mendoza - Argentina", 10);
$pdf->ezText("ventas@almacendefragancias.com", 10);
$pdf->ezText("www.almacendefragancias.com", 10);
$pdf->ezText("Cel: +54 261 722 5115", 10);
$pdf->ezText("Rot: +54 261 420 1845", 10);



$queEmp = 'select distinct id, 
						marca, 
						descripcion, 
						color,
						contenido, 
						presentacion,
						precio_base,
						tarjeta
								from articulos_export order by descripcion';
										
										
$resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
$totEmp = mysql_num_rows($resEmp);

//$pdf->ezText($queEmp, 10);


$result_list = array();
while($row = mysql_fetch_assoc($resEmp)) {
   $data[] = $row;
   }
   

$cols = ['num' => 'No', 'type' => 'Type', 'name' => '<i>Alias</i>'];
$coloptions = ['num' => ['justification' => 'right'], 'name' => ['justification' => 'left'], 'type' => ['justification' => 'center']];

$pdf->ezTable($data);

if (isset($_GET['d']) && $_GET['d']) {
    echo $pdf->ezOutput(true);
} else {
    $pdf->ezStream();
}



















#---------------------------------------------------------------------------------------------
function array_precios( $id_articulo, $id_sucursal ){
        $query='select * from precios where id_articulo="'.$id_articulo.'" and id_sucursal="'.$id_sucursal.'"';
        $res=mysql_query($query) or die(mysql_error()." ".$SCRIPT_NAME);
        $rows=mysql_num_rows($res);
        if($rows==1){
                $array_precios=mysql_fetch_array($res);
                $array_precios["query"]=$query;
                $array_precios["rows"]=$rows;
                return $array_precios;
        }
        if($rows<1){
                $array_precios["precio_base"]="0";
                $array_precios["porcentaje_contado"]="0";
                $array_precios["porcentaje_tarjeta"]="0";
                $array_precios["rows"]=$rows;
                $array_precios["query"]=$query;
                return $array_precios;
        }
return $array_precios;
}
#---------------------------------------------------------------------------------------------










?>
