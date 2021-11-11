<?php




include_once("../../includes/connect.php");
include_once("../../includes/funciones_varias.php");
include_once("../../includes/funciones_articulos.php");
include_once("../../login/login_verifica.inc.php");

#jrarquia 0 coresponde a administrador

/*
if($jerarquia!="1"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 
*/


include("cabecera.inc.php");


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







?>
<script language="javascript" src="funciones.js"></script>

<center>
Pedido Actual<BR>
<?php
include("../../includes/connect.php");
include("pedidos_base.php");

if($_GET["numero_pedido"]){
	$query='select * from pedidos where numero_pedido="'.$_GET["numero_pedido"].'" 
															and sucursal="'.$_GET["sucursal"].'" 
															order by marca,
															clasificacion,
															subclasificacion,
															contenido,
															presentacion,
															descripcion,
															codigo_af limit 0,100';
	$q1='select * from pedidos where numero_pedido="'.$_GET["numero_pedido"].'" and sucursal="'.$_GET["sucursal"].'" limit 0,1';
	echo $query."<br>".$q1."<br>";
}else{
	echo "jejejje";
	exit;
}


$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


$r0=mysql_query($q1);
$arr0=mysql_fetch_array($r0);


$q1='';


$time_stamp=time($fecha);

$fecha1=$arr0["fecha"];
$f2=strtotime($fecha1);
$retraso=($time_stamp - $f2);
$dias=($retraso / 60 / 60 / 24);
$aa=explode(".",$dias);

echo '<P ALIGN=left>';
echo '<font color="#0000000" size="15">';
echo nombre_sucursal($_GET["sucursal"])."</font>";
echo '</p>';
#echo '<font style="{ font-family: Verdana, Geneva, sans-serif; font-size: 20px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 5.5px; background-color:#000000;} ">';






echo '<P ALIGN=center>';

$tipo=trae_tipo($_GET["numero_pedido"],$_GET["sucursal"]);


    #------------------------------------------------------
                if($tipo=="Humano"){
                        echo '<img  align="center" src="./imagenes/ped1/humano.jpg" width="100" height="100"><br>';
                }
                if($tipo=="Virtual"){
                        echo '<img  align="center" src="./imagenes/ped1/virtual.jpg" width="100" height="100"><br>';
                }

echo '</p>';

















echo nombre_sucursal($_GET["sucursal"])."</font>";
echo "<br>";
echo '<table border="1">';

echo "<tr>";
echo "<td>Numero</td><td>".$_GET["numero_pedido"]."</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Fecha</td><td>".$fecha1."</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Hora</td><td>".$arr0["hora"]."</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Dias de retraso</td><td>".$aa[0]."</td>";
echo "</tr>";

echo "</table>";
echo "</font>";
echo "</P>";





echo '<P ALIGN=left>';
echo '<font color="#000000" size="5">';
echo "Detalle del pedido<br>";
echo "</font>";
echo "</P>";



echo '<center>';
echo '<form action="pedidos_update.php" method="post">';
echo '<table class="t1">';
echo "<tr>";
    echo "<th></th>";
    echo "<th></th>";
    echo "<th></th>";
    echo "<th>barras</th>";
    echo "<th>EPMR</th>";
//    echo "<th>Imagen</th>";
    echo "<th>Estadist.</th>";
    echo "<th></th>";
    echo "<th>Cant.Env</th>";
    echo "<th></th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	$array_stock=array_stock($row["id_articulo"],$id_sucursal);
	$array_articulo=array_articulos($row["id_articulo"]);
	if($row["color"]==""){
	    $color=$array_articulo["color"];
	}else{
	    $color=$row["color"];
	}
	
	
	
    echo "<tr>";

    echo '<td>';
    echo '<table>';
    echo '<tr>';
    echo '<td>ID</td>';
    echo '<td>'.$row["id_articulo"].'</td>';
		echo "</tr>";    
		echo "<tr>";    
    echo '<td>Cod Int</td>';
    echo '<td>'.$array_articulo["codigo_interno"].'</td>';

		echo "</tr>";    

    echo '</table>'.chr(10);
    echo '</td>';

	echo "<td>";
	echo "<table>".chr(10);
		echo "<tr>";    
//    echo '<td>CDO</td>';
    $q='select codigo_af from articulos where id="'.$row["id_articulo"].'"';
    $cdo=mysql_result(mysql_query($q),0,0);
    echo '<td><font size="4px" color="#000000">'.$cdo.'</font></td>';
		echo "</tr>";    
echo "</table>";
echo "</td>";




    echo '<td>';
    echo '<table>';
		echo "<tr>";    
    echo '<td>Marca</td>';
    echo '<td>'.$row["marca"].'</td>';
		echo "</tr>";    
		echo "<tr>";    
		echo "</tr>";    
		echo "<tr>";    
    echo '<td>Descripcion</td>';
    echo '<td>'.$row["descripcion"].'</td>';
		echo "</tr>";    
		echo "<tr>";    
    echo '<td>Color</td>';
    echo '<td>'.$color.'</td>';
		echo "</tr>";    
    echo '</table>';

	///////////////////////////////// imagen 
  	if(file_exists ( "./imagenes/miniaturas/".$row["id_articulo"].".jpg" )==1){
		echo '<td><A HREF="detalle.php?id_articulo='.$row["id_articulo"].'" onClick="return popup(this, \'notes\')">
		<img  src="./imagenes/miniaturas/'.$row["id_articulo"].'".jpg" width="100" height="100">
		</A></td>';
	}else{
		echo '<td></td>';
	}
	///////////////////////////////// imagen 
    echo '</td>';


    echo '<td>';
    echo '<table>';
		echo "<tr>";    
    echo '<td>Contenido</td>';
    echo '<td>'.$row["contenido"].'</td>';
		echo "</tr>";    
		echo "<tr>";    
    echo '<td>Presentacion</td>';
    echo '<td>'.$row["presentacion"].'</td>';
		echo "</tr>";    


		echo "<tr>";    
    echo '<td>Clasificacion</td>';
    echo '<td>'.$row["clasificacion"].'</td>';
		echo "</tr>";    
		echo "<tr>";    
    echo '<td>Subclasificacion</td>';
    echo '<td>'.$row["subclasificacion"].'</td>';
		echo "</tr>";    
		echo "<tr>";    
		echo "</tr>";    
    echo '</table>';
    echo '</td>';

    echo '<td>'.$array_articulo["codigo_barra"].'</td>';


	////////////////////////EPMR /*
	$qa='select * from stock_epmr where id_articulo="'.$row["id_articulo"].'"';
	$ra=mysql_query($qa);
	$rowa=mysql_num_rows($ra);
	if($rowa>0){
		$array_epmr=mysql_fetch_array($ra);
		
	}else{
		$array_epmr["estanteria"]="NO";
		$array_epmr["piso"]="NO";
		$array_epmr["modulo"]="NO";
		$array_epmr["reserva"]="NO";
	}
   echo '<td><A HREF="../admin_stock_epmr/stock_epmr_ingreso.php?id_articulo='.$row["id_articulo"].'" onClick="return popup(this, \'notes\')"><font3>';
   echo '<table border="1">';

   echo "<tr>";
   echo '<td>E</td>';
   echo '<td>'.$array_epmr["estanteria"].'</td>';
   echo "<tr>";

   echo "<tr>";
   echo '<td>P</td>';
   echo '<td>'.$array_epmr["piso"].'</td>';
   echo "<tr>";

   echo "<tr>";
   echo '<td>M</td>';
   echo '<td>'.$array_epmr["modulo"].'</td>';
   echo "<tr>";

   echo "<tr>";
   echo '<td>R</td>';
   echo '<td>'.$array_epmr["reserva"].'</td>';
   echo "<tr>";

   echo '</table>';
   echo '</font3></A></td>';
	////////////////////////////EPMR */



    ///////////////////////// tabla estadistica
    echo '<td>';
    echo '<table border="1">';
    echo "<tr>";
    echo 	"<td>Mes</td>";
    echo	'<td>'.estadistica_articulo_sucursal($row["id_articulo"],nombre_sucursal($_GET["sucursal"]),$u_mes).'</td>';
    echo "</tr>";
    echo "<tr>";
    echo 	"<td>Tres</td>";
    echo	'<td>'.estadistica_articulo_sucursal($row["id_articulo"],nombre_sucursal($_GET["sucursal"]),$u_tres).'</td>';
    echo "</tr>";
    echo "<tr>";
    echo 	"<td>Seis</td>";
    echo	'<td>'.estadistica_articulo_sucursal($row["id_articulo"],nombre_sucursal($_GET["sucursal"]),$u_seis).'</td>';
    echo "</tr>";
    echo "</tr>";
    echo "<tr>";
    echo 	"<td>Stk Suc</td>";
    $stk_suc=stock_sucursal($row["id_articulo"], $_GET["sucursal"]);
    echo	'<td>'.$stk_suc[2].'</td>';
    echo "</tr>";
    echo "</tr>";
    echo "<tr>";
    echo 	"<td>Stk Dep</td>";
    echo '<td>'.$array_stock["stock"].'</td>';
    echo "</tr>";
    echo "</table>";
    echo '</td>';
    ///////////////////////// fin tabla estadistica   
    
    echo '<td>';
    echo '<table border="1">';
    echo "<tr>";
    echo 	"<td>Cant Pedida</td>";
    echo '<td class="ROJA">'.$row["cantidad_solicitada"].'</td>';
    echo "</tr>";

    echo "<tr>";
    echo 	"<td>Cant Sugerida</td>";
    echo	'<td class="verde">'.estadistica_articulo_sucursal($row["id_articulo"],nombre_sucursal($_GET["sucursal"]),$u_mes).'</td>';
    echo "</tr>";

    if($row["finalizado"]=="N" or $row["finalizado"]==NULL){
    echo 	"<td>Cant enviar<br>";
		    include("select_cantidad.inc.php");
	    //echo '</td>';

    echo 	"Numero cajon<br>";
		    include("select_cajon.inc.php");
	    echo '</td>';

    }else{
        echo '<td>'.$row["cantidad_recibida"].'</td>';
	$finalizado=1;
    }



    echo "</table>";
    echo '</td>'.chr(10);


  
    echo '<td>';
    echo '<table border="1">';
    echo "<tr>";
    echo '<td>'.$row["fecha"].'</td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td>'.$row["hora"].'</td>';
    echo "</tr>";
    echo "</table>";
    echo '</td>';
}



echo '<br><table class="t1">';

include("responsable.inc.php");




echo '<td>Bultos</td>';
echo '<td>';
echo '<select name="bultos">';
echo '<option value="" label="Seleccione" selected>Seleccione</option>';

for($i=1;$i<=100;$i++){
	echo '<option value="'.$i.'" label="'.$i.'">'.$i.'</option>';
}

echo '</select>';
echo'</td>';
echo '</tr>';

echo '</table>';


echo '<input type="hidden" name="query" value="'.base64_encode($query).'">';





#-----------------------------------------------------------------
function array_stock($id_articulo,$id_sucursal){
	$query='select * from stock where id_articulo="'.$id_articulo.'" and id_sucursal="'.$id_sucursal.'"';
	$res=mysql_query($query);
	if(mysql_error()){
		$array_stock["error"]=mysql_error();
		$array_stock["query"]=$query;
		return $array_stock;
	}
	$rows=mysql_num_rows($res);

	if($rows==1){
		$array_stock=mysql_fetch_array($res);
		$array_stock["rows"]=$rows;
		$array_stock["query"]=$query;
		return $array_stock;		
	}

	if($rows<1){
		$array_stock["stock"]=0;
		$array_stock["rows"]=$rows;
		$array_stock["query"]=$query;
		return $array_stock;
	}
}
#-----------------------------------------------------------------


echo '</table>';
//if($finalizado!=1){
    echo '<button><input type="submit" name="ACEPTAR" value="ACEPTAR"></button>';
//}
echo '</form>';











#-----------------------------------------------------------------
function estadistica_articulo_sucursal($id_articulo,$id_sucursal,$fecha){
        $q='select sum(cantidad)
                            from ventas
                                where id_articulos="'.$id_articulo.'" and sucursal="'.$id_sucursal.'" and fecha>="'.$fecha.'"';
//        echo "aa:".$q.chr(10);

        $res=mysql_query($q);
        if(mysql_error()){echo mysql_error().chr(10);}
        $tot=mysql_fetch_array($res);
        return $tot[0];
}
#-----------------------------------------------------------------




#-----------------------------------------------------------------
function stock_sucursal($id_articulo,$id_sucursal){
	$query='select * from stock where 	id_articulo="'.$id_articulo.'" and id_sucursal="'.$id_sucursal.'"';
	$res=mysql_query($query) or die(mysql_error()." ".$SCRIPT_NAME);
	$rows=mysql_num_rows($res);
	if($rows==1){
		$array=mysql_fetch_array($res);
		$array["rows"]=$rows;
		return $array;		
	}
	if($rows<1){
		$array["stock"]="0";
		$array["maximo"]="0";
		$array["minimo"]="0";
		$array["fijo"]="0";
		$array["id_sucursal"]=$id_sucursal;
		$array["rows"]=0;
		return $array;		
	}
}
#-----------------------------------------------------------------



?>


</center>
