<?php
include("cabecera2.inc.php");
include("./includes/funciones_varias.inc.php");
include_once("./includes/funciones_tabla_gastos.php");
include_once("./includes/funciones_vendedor.php");
include_once("./includes/funciones_sucursal.php");
include_once("./includes/funciones_calculo.php");
include("connect.php");


/*
$hora=time();

$ultimo_mes=$hora-(60 * 60 * 24 * 30);
$ultimo_tres=$hora-(60 * 60 * 24 * 30 * 3);
$ultimo_seis=$hora-(60 * 60 * 24 * 30 * 6);
$ultimo_nueve=$hora-(60 * 60 * 24 * 30 * 9 );
$ultimo_doce=$hora-(60 * 60 * 24 * 365);

$fecha=date("Y-n-d");

$u_mes=date("Y-n-d",$ultimo_mes);
$u_tres=date("Y-n-d",$ultimo_tres);
$u_seis=date("Y-n-d",$ultimo_seis);
$u_nueve=date("Y-n-d",$ultimo_nueve);
$u_doce=date("Y-n-d",$ultimo_doce);
*/




echo '<center>';

if($_POST["fecha"]){
	$fecha=fecha_conv( "/", $_POST["fecha"] );
}else{
	$fecha=date("Y-n-d");
}


$qqq='select sum(cantidad * precio_unitario) from ventas where fecha="'.$fecha.'"';
$total_dia=mysql_result(mysql_query($qqq),0,0);


$zzaa=explode("-",$fecha);
$mes=$zzaa[1];
$anio=$zzaa[0];

$fecha_desde=$anio."-".$mes."-01";
$fecha_hasta=$anio."-".$mes."-31";

echo '<table class="t1">';
echo '<tr>';
echo '<form method="POST" action="'.$_SERVER["SCRIPT_NAME"].'">';
echo '<td>Fecha: <input type="text" name="fecha" id="fecha" size="10" value="'.fecha_conv( "-", $fecha ).'">';
echo '<input type="submit" name="ACEPTAR" value="ACEPTAR"></td>';
echo '</form>';

echo '<td>TTT</td>';
echo '<td><font size="3px"> '.round($total_dia,2 ).'</font></td>';
echo "</tr>".chr(13);
echo "</table>";





$saldo=get_saldo();

/*
#---------------------------------------------------------------------	
#muestra total
	echo '<tr class="especial2" id="especial2">';
	echo "</tr>".chr(13);
#---------------------------------------------------------------------	
*/


?>
<table border="1">
<?php



//echo "<br>";

echo '<table class="t1" style="width: 100%; height: 100%;">';///1 ra
echo '<tr valign="top">';///1 ra


#---------------------------------------------------------------------	


#---------------------------------------------------------------------	
echo '<td width="33%" height="600px">';
//echo '<td>';
echo '<iframe width="100%" height="100%" src="slideshow_izquierda.php"></iframe>';
//echo '<iframe src="slideshow_izquierda.php">';
//include("comparativos.inc.php");
echo "</td>";
#---------------------------------------------------------------------	

//echo "<td>";
//include("ventas_hora_general.inc.php");
//echo "</td>";


#----------------------------------------
echo "<td>";
include("clientes_marcas.inc.php");
echo "</td>";
#----------------------------------------

#----------------------------------------
echo "<td>";
include("clientes_datos.inc.php");
echo "</td>";
#----------------------------------------


echo "</tr>";
echo "</table>";

// echo "</td>";

/*
/////pedidos
echo '<td style="height: 50%;">';
echo '<iframe src="./pedidos_listado.php" width="100%" height="100%"></iframe>';
echo "</td>";
*/

echo '<td width="33%" height="300px">';
//echo '<iframe width="100%" height="300px" src="slideshow_asistencias.php">';
echo '<iframe width="100%" height="300px" src="./pedidos_listado.php">';
echo '</td>';
echo "</tr>";

echo '</table>';


	
#------------------------------------------------
function acumulado_menos_un_anio( $fecha, $sucursal ){
        $epoch=strtotime($fecha);
        $nuevafecha = strtotime ( '-1 year' , strtotime ( $fecha ) ) ;

        $nuevafecha = date ( 'Y-m-j' , $nuevafecha );
        $aa=explode("-",$nuevafecha);

        $mes=$aa[1];
        if($mes>0 AND $mes< 10){
        //      $mes="0".$mes;
        }

        $bb=$aa[0]."-".( $mes);
        $q='select sum( cantidad * precio_unitario ) from ventas where fecha >= "'.$bb.'-01" and fecha <= "'.$bb.'-31" ';
        $result=mysql_query($q)or die(mysql_error());
        $total=mysql_result($result,0);
        //return $q;
        //echo "acumulado_menos_un_anio: ".$q." t:". $total."<br>";
return $total;
}
#------------------------------------------------


#------------------------------------------------
function acumulado_menos_mes_anio( $fecha, $sucursal ){
        $epoch=strtotime($fecha);
        $nf1 = strtotime ( '-1 year' , strtotime ( $fecha ) ) ;

        $nuevafecha = strtotime ( '-1 month' ,  $nf1  ) ;

        $nuevafecha2 = date ( 'Y-m-j' , $nuevafecha );
        $aa=explode("-",$nuevafecha2);

        $mes=$aa[1];
        if($mes>0 AND $mes< 10){
        //      $mes="0".$mes;
        }

        $bb=$aa[0]."-".( $mes);
        $q='select sum( cantidad * precio_unitario ) from ventas where fecha >= "'.$bb.'-01" and fecha <= "'.$bb.'-31" ';
        $result=mysql_query($q)or die(mysql_error());
        $total=mysql_result($result,0);
        //return $q;
        //echo "acumulado_menos_mes_anio: ".$q." t:". $total."<br>";
return $total;
}
#------------------------------------------------
	
	
	
?>