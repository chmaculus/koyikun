<?php

//include_once("promociones_base.php");

include_once("../../includes/connect.php");


include("../../includes/funciones_precios.php");
include("../../includes/funciones_articulos.php");
include("../../includes/funciones_varias.php");

$id_articulos=$_POST["id_articulos"];


$fecha_inicio=fecha_conv( "/", $_POST["fecha_inicio"] );
$fecha_finaliza=fecha_conv( "/", $_POST["fecha_finaliza"] );


echo "Base: ".$base."<br><br>";

//$query='select * from sucursales';

echo '<table border="1">';
    echo '<tr>';
        echo '<th>id</th>';
        echo '<th>codigo_interno</th>';
        echo '<th>marca</th>';
        echo '<th>descripcion</th>';
        echo '<th>contenido</th>';
        echo '<th>presentacion</th>';
        echo '<th>codigo_barra</th>';
        echo '<th>fecha</th>';
        echo '<th>hora</th>';
        echo '<th>clasificacion</th>';
        echo '<th>subclasificacion</th>';
        echo '<th>precio</th>';
    echo '</tr>';


#------------------------------------------------
#crea array sucursales activas
$result0=mysql_query('select * from sucursales where suc_reales="1" order by sucursal');
while($rowss=mysql_fetch_array($result0)){
        $array_sucursales[]=$rowss;
}
#------------------------------------------------


$query1=base64_decode($_POST["query"]);
echo $query1;
$result1=mysql_query($query1)or die(mysql_error());
while($row1=mysql_fetch_array($result1)){

    echo '<tr>';
    echo '	<td>'.$row1["id"].'</td>';
    echo '	<td>'.$row1["codigo_interno"].'</td>';
    echo '	<td>'.$row1["marca"].'</td>';
    echo '	<td>'.$row1["descripcion"].'</td>';
    echo '	<td>'.$row1["contenido"].'</td>';
    echo '	<td>'.$row1["presentacion"].'</td>';
    echo '	<td>'.$row1["codigo_barra"].'</td>';
    echo '	<td>'.$row1["fecha"].'</td>';
    echo '	<td>'.$row1["hora"].'</td>';
    echo '	<td>'.$row1["clasificacion"].'</td>';
    echo '	<td>'.$row1["subclasificacion"].'</td>';
    echo '	<td>'.$array_precios["precio_base"].'</td>';
    echo '</tr>';


	echo 'Start sucursales: <br><br>';
 	foreach($array_sucursales as $value){
		/////foreach
		$verifica1=verifica_tabla_preciosn($row1["id"], $value["id"] );
		$array_precios=precio_sucursal( $row1["id"], 1 );
		$existe=verifica_promocion( $row1["id"], $value["id"] );

		echo '#start suc<br>';
		if($_POST["id_sucursal".$value["id"]]==1){
			echo 'Sucursal habilitada<br>';
			include("query_habilitada.inc.php");
		}else{
			echo 'Sucursal NO habilitada<br>';
			include("query_nohabilitada.inc.php");
		}
		echo '#fin suc<br><br>';
		

		if( $_POST["precio_promocion".$row["id"]] == $array_precios["precio_base"] ){
			/* no es promocion */
		}
	}/////end foreach
	echo 'FIN sucursales: <br><br><br>';

}
echo "</table>";



#---------------------------------------------------------------------------------------------
function verifica_promocion($id_articulos, $id_sucursal){
        $query='select * from promociones where id_articulos="'.$id_articulos.'" and id_sucursal="'.$id_sucursal.'"';
        $result=mysql_query($query);
        $rows=mysql_num_rows($result);

        if($rows>1 ){
                $q='delete from promociones where id_articulos="'.$id_articulos.'" and id_sucursal="'.$id_sucursal.'"';
                mysql_query($q);
        }
        if($rows<1 ){
                $q='insert into promociones set id_articulos="'.$id_articulos.'", id_sucursal="'.$id_sucursal.'"';
                mysql_query($q);
        }
        echo 'verif: '.$query." rows: ".$rows."<br>";
}
#---------------------------------------------------------------------------------------------


#-----------------------------------------------------------------
function verifica_tabla_preciosn($id_articulos, $id_sucursal ){

echo "fun verifica precio<br>id art: ".$id_articulos." id_suc: ".$id_sucursal."<br>"; 

		  #---------------------------------------------------------------------------------
		  #array costo
        $query='select * from costos where id_articulos="'.$id_articulos.'"';
        $result=mysql_query($query);
        $rows=mysql_num_rows($result);
        if($rows=="1"){
                $array_costos=mysql_fetch_array($result);
        }else{
                return "Sin costo cargado";
        }
		  #---------------------------------------------------------------------------------





		  #---------------------------------------------------------------------------------
		  #calcula precio de venta
        $temp1=( ( $array_costos["precio_costo"] * ( $array_costos["descuento1"] * -1 ) ) / 100 )+ $array_costos["precio_costo"];
        $temp1=( ( $temp1 * ( $array_costos["descuento2"] * -1 ) ) / 100 )+ $temp1;
        $temp1=( ( $temp1 * ( $array_costos["descuento3"] * -1 ) ) / 100 )+ $temp1;
        $temp1=( ( $temp1 * ( $array_costos["descuento4"] * -1 ) ) / 100 )+ $temp1;
        $temp1=( ( $temp1 * ( $array_costos["descuento5"] * -1 ) ) / 100 )+ $temp1;
        $temp1=( ( $temp1 * ( $array_costos["descuento6"] * -1 ) ) / 100 )+ $temp1;
        $temp1=( ( $temp1 * ( $array_costos["descuento7"] * -1 ) ) / 100 )+ $temp1;
        $temp1=( ( $temp1 * ( $array_costos["descuento8"] * -1 ) ) / 100 )+ $temp1;
        $temp1=( ( $temp1 * ( $array_costos["descuento9"] * -1 ) ) / 100 )+ $temp1;
        $temp1=( ( $temp1 * ( $array_costos["descuento10"] * -1 ) ) / 100 )+ $temp1;
        $temp1=( ( $temp1 * $array_costos["iva"] ) / 100 )+ $temp1;
        $temp1=( ( $temp1 * $array_costos["margen"] ) / 100 )+ $temp1;
        $precio_venta=round($temp1,2);
		  #---------------------------------------------------------------------------------






		  #---------------------------------------------------------------------------------
		  #verifica precio sucurssal 1 o principal
        $query='select * from precios where id_articulo="'.$id_articulos.'" and id_sucursal="1"';
        $rows=mysql_num_rows( mysql_query($query) );
        echo "query: $query<br>";
        echo 'rows: '.$rows."<br>";
	      if($rows < 1 ){
                $q='insert into precios set 	id_articulo="'.$id_articulos.'", 
                										id_sucursal="1", 
                										precio_base="'.$precio_venta.'", 
                										fecha="'.$array_costos["fecha"].'", 
                										hora="'.$array_costos["hora"].'"
                ';
                echo 'q fun verif1:'.$q."<br>";
                mysql_query($q);
                if(mysql_error()){echo mysql_error()."<br>q: ".$q."<br>";}
        }
        if(($rows > 1) ){
                $q='delete from precios where id_articulo="'.$id_articulos.'" and id_sucursal="1"';
                echo 'q fun verif2: '.$q."<br>";
                mysql_query($q);
                if(mysql_error()){echo mysql_error()."<br>q: ".$q."<br>";}

                $q='insert into precios set 	id_articulo="'.$id_articulos.'", 
                										id_sucursal="1", 
                										precio_base="'.$precio_venta.'", 
                										fecha="'.$array_costos["fecha"].'", 
                										hora="'.$array_costos["hora"].'"
                ';
                echo 'q fun verif3: '.$q."<br>";
                mysql_query($q);
                if(mysql_error()){echo mysql_error()."<br>q: ".$q."<br>";}
        }
		  #---------------------------------------------------------------------------------
        





		  #---------------------------------------------------------------------------------
		  #verifica precio sucursal
        $query='select * from precios where id_articulo="'.$id_articulos.'" and id_sucursal="'.$id_sucursal.'"';
        $rows=mysql_num_rows( mysql_query($query) );
        if($rows < 1 ){
                $q='insert into precios set 	id_articulo="'.$id_articulos.'", 
                										id_sucursal="'.$id_sucursal.'", 
                										precio_base="'.$precio_venta.'", 
                										fecha="'.$array_costos["fecha"].'", 
                										hora="'.$array_costos["hora"].'"
                ';
                echo 'q fun verif6:'.$q."<br>";
                mysql_query($q);
               if(mysql_error()){echo mysql_error()."<br>".$q."<br><br>";}
        }
                $q='delete from precios where id_articulo="'.$id_articulos.'", id_sucursal="'.$id_sucursal.'"';
        if($rows > 1 ){
                mysql_query($q);
                $q='insert into precios set 	id_articulo="'.$id_articulos.'", 
                										id_sucursal="'.$id_sucursal.'", 
                										precio_base="'.$precio_venta.'", 
                										fecha="'.$array_costos["fecha"].'", 
                										hora="'.$array_costos["hora"].'"
                ';
                mysql_query($q);
               if(mysql_error()){echo mysql_error()."<br>".$q."<br><br>";}
        }
        if($rows == 1 ){
                //return 1;
        }
		  #---------------------------------------------------------------------------------


		  #---------------------------------------------------------------------------------
        $query='select * from precios where id_articulo="'.$id_articulos.'" and id_sucursal="'.$id_sucursal.'"';
        $res=mysql_query($query) or die(mysql_error()." ".$SCRIPT_NAME);
        $rows=mysql_num_rows($res);
        echo "query precios: $query<br>";
        if(mysql_error()){echo mysql_error()."<br>".$query."<br><br>";}
        if($rows==1){
                $array_precios=mysql_fetch_array($res);
                $array_precios["query"]=$query;
                $array_precios["rows"]=$rows;
        }
		  #---------------------------------------------------------------------------------


		  #---------------------------------------------------------------------------------
			if($precio_venta!=$array_precios["precio_base"]){
				echo "precio venta: $precio_venta "." tbl precios".$array_precios["precio_base"]."<br>";
                $q='update precios set precio_base="'.$precio_venta.'", 
                								fecha="'.$array_costos["fecha"].'", 
                								hora="'.$array_costos["hora"].'"
                										where id_articulo="'.$id_articulos.'"and  
                											id_sucursal="'.$id_sucursal.'" 
                										
                ';
                echo 'q fun verif7:'.$q."<br>";
               mysql_query($q);
               if(mysql_error()){echo mysql_error()."<br>".$q."<br><br>";}
			}
		  #---------------------------------------------------------------------------------


echo "fin verifica precio<br>";
}
#-----------------------------------------------------------------







?>